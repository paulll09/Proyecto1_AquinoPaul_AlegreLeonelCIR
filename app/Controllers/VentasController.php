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

        // Obtener todas las ventas
        $ventas = $ventaModel->findAll();

        // Para cada venta, obtener sus detalles y el nombre del cliente
        foreach ($ventas as &$venta) {
            $detalles = $detalleVentaModel
                ->where('venta_id', $venta['id_venta'])
                ->findAll();
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
}
