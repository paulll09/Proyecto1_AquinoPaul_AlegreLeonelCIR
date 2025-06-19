<?php 

namespace App\Controllers;

use App\Models\VentaModel;
use App\Models\DetalleVentaModel;
use App\Models\ProductoModel;
use App\Models\Categoria_Model;

class VentasController extends BaseController{

public function listar_ventas()
{
    $venta = new VentaModel();
    $detalleVenta = new DetalleVentaModel();

    // Obtener todas las ventas
    $ventas = $venta->findAll();

    // Para cada venta, obtener sus detalles
    foreach ($ventas as &$venta) {
        $detalles = $detalleVenta
            ->where('venta_id', $venta['id_venta'])
            ->findAll();
        $venta['detalles'] = $detalles;
    }

    $data = [
        'ventas' => $ventas,
        'titulo' => 'Listado de Ventas'
    ];

    return view('backend/ventas/listar_ventas_view', $data);
}
}
