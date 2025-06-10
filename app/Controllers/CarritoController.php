<?php

namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\Categoria_Model;

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

}
