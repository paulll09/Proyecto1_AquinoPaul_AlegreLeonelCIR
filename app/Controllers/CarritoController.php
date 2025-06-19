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
        $data = array(
            'id' => $request->getPost('id_producto'),
            'name' => $request->getPost('nombre'),
            'qty' => 1, // Cantidad por defecto
            'price' => $request->getPost('precio'),
        );
        $cart->insert($data);
        return redirect()->to(base_url('ver_carrito'))->with('mensaje', 'Producto agregado al carrito');
    }

    public function eliminar_item($id)
    {
        $cart = \Config\Services::cart();
        $cart->remove($id);
        return redirect()->to(base_url('ver_carrito'))->with('mensaje', 'Producto eliminado del carrito');
    }

    public function vaciar_carrito()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('ver_carrito'))->with('mensaje', 'Carrito vaciado');
    }

    public function guardar_venta()
    {

        $cart = \Config\Services::cart();
        $venta = new VentaModel();
        $detalle = new DetalleVentaModel();
        $productos = new ProductoModel();

        $cart1 = $cart->contents();

        foreach ($cart1 as $item) {
            $producto = $productos->where('id_producto', $item['id'])->first();
            if ($producto['stock'] < $item['qty']) {
                return redirect()->to(base_url('ver_carrito'))->with('mensaje', 'No hay suficiente stock para el producto: ' . $item['name']);
            }
        }

        $data = array(
            'id_cliente' => session('id'),
            'venta_fecha' => date('Y-m-d H:i:s'),
        );
        


        $venta_id = $venta->insert($data);

        $cart1 = $cart->contents();
        foreach ($cart1 as $item) {
            $detalle_venta = array(
                'venta_id' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
            );

           
            $producto = $productos->where('id_producto', $item['id'])->first();
            $data = ['stock' => $producto['stock'] - $item['qty']];

            // Actualizar el stock del producto
            $productos->update($item['id'], $data);

            // Insertar el detalle de la venta
            $detalle->insert($detalle_venta);
        }

        // Vaciar el carrito después de guardar la venta
         $cart->destroy();
        return redirect()->to(base_url('ver_carrito'))->with('mensaje', 'Venta realizada con éxito');
      
    }
}
