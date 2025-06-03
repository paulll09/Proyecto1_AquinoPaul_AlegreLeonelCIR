<?php
namespace App\Controllers;
use App\Models\ProductoModel;
use App\Models\Categoria_Model;
use App\Models\CategoriaProductoModel;

class ProductoController extends BaseController
{
    public function form_agregar_producto()
    {
        $categoria = new CategoriaProductoModel();
        $data['categorias'] = $categoria->findAll();
        $data['titulo'] = 'Agregar producto';
        return view('Views/backend/producto/agregar_producto_view', $data);
    }

    public function registrar_producto()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules([
            'categoria' => 'is_not_unique[producto_categoria.categoria_id]',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]'
        ], [
            'categoria' => ['is_not_unique' => 'Debe seleccionar una categoría'],
            'imagen' => [
                'uploaded' => 'Debe seleccionar una imagen',
                'is_image' => 'Debe ser una imagen válida'
            ]
        ]);

        if ($validation->withRequest($request)->run()) {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'public/assets/uploads', $nombre_aleatorio);

            $data = [
                'producto_titulo' => $request->getPost('titulo'),
                'producto_descripcion' => $request->getPost('descripcion'),
                'producto_precio' => $request->getPost('precio'),
                'producto_stock' => $request->getPost('stock'),
                'producto_imagen' => $nombre_aleatorio,
                'producto_categoria' => $request->getPost('categoria'),
                'producto_estado' => 1
            ];

            $producto = new ProductoModel();
            $producto->insert($data);

            return redirect()->route('agregar_producto')->with('mensaje', '¡Producto registrado correctamente!');
        } else {
            $categoria = new CategoriaProductoModel();
            $data['validation'] = $validation->getErrors();
            $data['categorias'] = $categoria->findAll();
            $data['titulo'] = 'Agregar producto';

            return view('plantillas/encabezado', $data)
                . view('Backend/navegar_admin_view')
                . view('Backend/Productos/agregar_producto_view');
        }
    }
}
