<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\Categoria_Model;
use App\Models\VentaModel;
use App\Models\DetalleVentaModel;

class CarritoController extends BaseController
{

    public function ver_carrito()
    {
        $cart = \Config\Services::cart();
        $data = ['titulo' => 'Carrito de compras'];
        return view('Views/backend/carrito/carrito_view', $data);
    }

    public function agregar_carrito()
    {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $productos = new ProductoModel();
        
        $id_producto = $request->getPost('id_producto');
        $nombre = $request->getPost('nombre');
        $precio = $request->getPost('precio');
        
        // Verificar que el producto existe y tiene stock
        $producto = $productos->where('id_producto', $id_producto)->first();
        
        if (!$producto) {
            session()->setFlashdata('mensaje_error', 'Producto no encontrado');
            return redirect()->back();
        }
        
        if ($producto['stock'] < 1) {
            session()->setFlashdata('mensaje_error', 'No hay stock disponible para: ' . $nombre);
            return redirect()->back();
        }
        
        // Verificar si ya existe en el carrito
        $existe_en_carrito = false;
        $cantidad_en_carrito = 0;
        
        foreach ($cart->contents() as $item) {
            if ($item['id'] == $id_producto) {
                $existe_en_carrito = true;
                $cantidad_en_carrito = $item['qty'];
                break;
            }
        }
        
        // Si ya existe, verificar que no exceda el stock
        if ($existe_en_carrito) {
            if (($cantidad_en_carrito + 1) > $producto['stock']) {
                session()->setFlashdata('mensaje_error', 'No hay suficiente stock. Disponible: ' . $producto['stock']);
                return redirect()->to(base_url('ver_carrito'));
            }
        }
        
        $data = array(
            'id' => $id_producto,
            'name' => $nombre,
            'qty' => 1,
            'price' => $precio,
        );
        
        $cart->insert($data);
        
        // Advertencia si queda poco stock
        if ($producto['stock'] <= 5) {
            session()->setFlashdata('mensaje_warning', 'Producto agregado. ¡Quedan pocas unidades! Stock: ' . $producto['stock']);
        } else {
            session()->setFlashdata('mensaje_exito', 'Producto agregado al carrito correctamente');
        }
        
        return redirect()->to(base_url('ver_carrito'));
    }

    public function eliminar_item($id)
    {
        $cart = \Config\Services::cart();
        
        // Obtener nombre del producto antes de eliminarlo
        $nombre_producto = '';
        foreach ($cart->contents() as $item) {
            if ($item['rowid'] === $id) {
                $nombre_producto = $item['name'];
                break;
            }
        }
        
        $cart->remove($id);
        session()->setFlashdata('mensaje_exito', 'Producto "' . $nombre_producto . '" eliminado del carrito');
        
        return redirect()->to(base_url('ver_carrito'));
    }

    public function vaciar_carrito()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        session()->setFlashdata('mensaje_exito', 'Carrito vaciado correctamente');
        
        return redirect()->to(base_url('ver_carrito'));
    }

    public function guardar_venta()
    {
        $cart = \Config\Services::cart();
        $venta = new VentaModel();
        $detalle = new DetalleVentaModel();
        $productos = new ProductoModel();

        $cart1 = $cart->contents();
        
        // Verificar que el carrito no esté vacío
        if (empty($cart1)) {
            session()->setFlashdata('mensaje_error', 'El carrito está vacío');
            return redirect()->to(base_url('ver_carrito'));
        }

        // Verificar stock de todos los productos
        $productos_sin_stock = [];
        foreach ($cart1 as $item) {
            $producto = $productos->where('id_producto', $item['id'])->first();
            if ($producto['stock'] < $item['qty']) {
                $productos_sin_stock[] = [
                    'nombre' => $item['name'],
                    'stock_disponible' => $producto['stock']
                ];
            }
        }

        // Si hay productos sin stock suficiente
        if (!empty($productos_sin_stock)) {
            session()->setFlashdata('stock_insuficiente', true);
            session()->setFlashdata('productos_sin_stock', $productos_sin_stock);
            return redirect()->to(base_url('ver_carrito'));
        }

        // Procesar la venta
        $data = array(
            'id_cliente' => session('id'),
            'venta_fecha' => date('Y-m-d H:i:s'),
        );

        $venta_id = $venta->insert($data);

        if (!$venta_id) {
            session()->setFlashdata('mensaje_error', 'Error al procesar la venta');
            return redirect()->to(base_url('ver_carrito'));
        }

        // Procesar cada item del carrito
        foreach ($cart1 as $item) {
            $detalle_venta = array(
                'venta_id' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
            );

            $producto = $productos->where('id_producto', $item['id'])->first();
            $data_stock = ['stock' => $producto['stock'] - $item['qty']];

            // Actualizar el stock del producto
            $productos->update($item['id'], $data_stock);

            // Insertar el detalle de la venta
            $detalle->insert($detalle_venta);
        }

        // Vaciar el carrito después de guardar la venta
        $cart->destroy();
        
        // Generar número de pedido para mostrar
        $numero_pedido = str_pad($venta_id, 6, '0', STR_PAD_LEFT);
        
        // Mensaje de compra exitosa
        session()->setFlashdata('compra_exitosa', true);
        session()->setFlashdata('numero_pedido', $numero_pedido);
        
        return redirect()->to(base_url('ver_carrito'));
    }

    public function actualizar_item()
    {
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $productos = new ProductoModel();

        $rowid = $request->getPost('rowid');
        $qty = (int) $request->getPost('qty');

        // Validar cantidad mínima
        if ($qty < 1) {
            session()->setFlashdata('mensaje_error', 'La cantidad debe ser mayor a cero');
            return redirect()->to(base_url('ver_carrito'));
        }

        // Obtener el item actual del carrito
        $item = null;
        foreach ($cart->contents() as $producto) {
            if ($producto['rowid'] === $rowid) {
                $item = $producto;
                break;
            }
        }

        if (!$item) {
            session()->setFlashdata('mensaje_error', 'Producto no encontrado en el carrito');
            return redirect()->to(base_url('ver_carrito'));
        }

        // Obtener el stock del producto desde la base de datos
        $productoDB = $productos->where('id_producto', $item['id'])->first();

        if (!$productoDB) {
            session()->setFlashdata('mensaje_error', 'Producto no encontrado en inventario');
            return redirect()->to(base_url('ver_carrito'));
        }

        // Verificar stock disponible
        if ($qty > $productoDB['stock']) {
            // Ajustar cantidad por disponibilidad si hay algo de stock
            if ($productoDB['stock'] > 0) {
                $cart->update([
                    'rowid' => $rowid,
                    'qty'   => $productoDB['stock']
                ]);
                
                session()->setFlashdata('mensaje_warning', 
                    'Cantidad ajustada por disponibilidad. Solo quedan ' . $productoDB['stock'] . ' unidades de ' . $item['name']);
            } else {
                session()->setFlashdata('mensaje_error', 
                    'No hay stock disponible para ' . $item['name']);
            }
            
            return redirect()->to(base_url('ver_carrito'));
        }

        // Actualizar cantidad si es válida
        $cart->update([
            'rowid' => $rowid,
            'qty'   => $qty
        ]);

        session()->setFlashdata('mensaje_exito', 'Cantidad actualizada correctamente');
        return redirect()->to(base_url('ver_carrito'));
    }
}
