<?php

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductoModel;
use App\Models\Categoria_Model;
use App\Models\UsuariosModel;

class VentasController extends BaseController
{


    public function listar_ventas()
    {
        $ventaModel = new \App\Models\VentaModel();
        $detalleVentaModel = new \App\Models\DetalleVentaModel();
        $usuarioModel = new \App\Models\UsuariosModel();
        $productoModel = new \App\Models\ProductoModel();

        // Obtener todas las ventas
        $ventas = $ventaModel->findAll();

        // Para cada venta, obtener sus detalles y el nombre del cliente
        foreach ($ventas as &$venta) {
            $detalles = $detalleVentaModel
                ->where('venta_id', $venta['id_venta'])
                ->findAll();

            foreach ($detalles as &$detalle) {
                $producto = $productoModel->find($detalle['id_producto']);
                $detalle['nombre'] = $producto ? $producto['nombre'] : 'Producto desconocido';
            }
            unset($detalle); // buena práctica

            $venta['detalles'] = $detalles;

            // Obtener el cliente
            $cliente = $usuarioModel->find($venta['id_cliente']);
            $venta['cliente_nombre'] = $cliente
                ? $cliente['persona_nombre'] . ' ' . $cliente['persona_apellido']
                : 'Desconocido';
        }

        // Calcular el total de ventas
        $totalVentas = 0;
        foreach ($ventas as $venta) {
            foreach ($venta['detalles'] as $detalle) {
                $totalVentas += $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
            }
        }

        $data = [
            'ventas' => $ventas,
            'totalVentas' => $totalVentas,
            'titulo' => 'Listado de Ventas'
        ];

        return view('backend/ventas/listar_ventas_view', $data);
    }


    public function mis_compras()
    {
        $session = session();
        if (!$session->get('login')) {
            return redirect()->to('login')->with('mensaje_error', 'Debe iniciar sesión para ver sus compras.');
        }
        
    
        $idCliente = $session->get('id');
        $ventaModel = new VentaModel();
        $detalleVentaModel = new DetalleVentaModel();
        $productoModel = new ProductoModel();
    
        $ventas = $ventaModel->where('id_cliente', $idCliente)->findAll();
    
        $compras = [];
        foreach ($ventas as $venta) {
            $detalles = $detalleVentaModel
                ->where('venta_id', $venta['id_venta'])
                ->findAll();
    
            $total = 0;
            foreach ($detalles as &$detalle) {
                $producto = $productoModel->find($detalle['id_producto']);
                $detalle['nombre'] = $producto ? $producto['nombre'] : 'Producto desconocido';
                $total += $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
            }
            unset($detalle);
    
            // Aquí agregamos la clave 'fecha' usando el campo de la base de datos
            $compras[] = [
                'id_venta' => $venta['id_venta'],
                'fecha' => $venta['venta_fecha'], // <-- asegúrate que este campo exista en tu tabla
                'total' => $total,
                'detalles' => $detalles,
            ];
        }
    
        $data = [
            'compras' => $compras,
            'titulo' => 'Mis Compras',
        ];
    
        return view('backend/ventas/listar_compras_view', $data);
    }
}
