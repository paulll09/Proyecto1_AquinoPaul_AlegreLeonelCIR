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

            'producto_categoria' => 'is_not_unique[producto_categoria.id_categoria]',
            'imagen' => 'uploaded[imagen]|max_size[imagen,4096]|is_image[imagen]',
            'nombre' => 'required|min_length[3]|max_length[150]',
            'descripcion' => 'required|min_length[5]|max_length[500]',
            'precio' => 'required|decimal|greater_than[0]',
            'stock' => 'required|integer',

        ], [
            //Mensajes de error personalizados

            'producto_categoria' => ['is_not_unique' => 'Debe seleccionar una categoría'],
            'imagen' => [
                'uploaded' => 'Debe seleccionar una imagen',
                'is_image' => 'Debe ser una imagen válida',
            ],
            'nombre' => [
                'required' => 'El nombre del producto es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede exceder los 150 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción del producto es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 5 caracteres.',
                'max_length' => 'La descripción no puede exceder los 500 caracteres.'
            ],
            'precio' => [
                'required' => 'El precio del producto es obligatorio.',
                'decimal' => 'El precio debe ser un número decimal válido.',
                'greater_than' => 'El precio debe ser mayor que cero.'
            ],
            'stock' => [
                'required' => 'El stock del producto es obligatorio.',
                'integer' => 'El stock debe ser un número entero.'
            ]
        ]);

        if ($validation->withRequest($request)->run()) {
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'public/assets/uploads', $nombre_aleatorio);

            $data = [
                'nombre' => $request->getPost('nombre'),
                'descripcion' => $request->getPost('descripcion'),
                'precio' => $request->getPost('precio'),
                'stock' => $request->getPost('stock'),
                'imagen' => $nombre_aleatorio,
                'producto_categoria' => $request->getPost('producto_categoria'),
                'producto_estado' => 1
            ];

            $producto = new ProductoModel();
            $producto->insert($data);

            return redirect()->route('admin/registrar_producto')->with('mensaje', '¡Producto registrado correctamente!');
        } else {
            $categoria = new CategoriaProductoModel();
            $data['validation'] = $validation->getErrors();
            $data['categorias'] = $categoria->findAll();
            $data['titulo'] = 'Agregar producto';

            return view('Views/backend/producto/agregar_producto_view', $data);
        }
    }

    public function gestionar_productos()
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaProductoModel();
        $data['productos'] = $productoModel->join('producto_categoria', 'producto_categoria.id_categoria = productos.producto_categoria')->findAll();
        $data['categorias'] = $categoriaModel->findAll();
        $data['titulo'] = 'Listar productos';
        return view('Views/backend/producto/listar_productos_view', $data);
    }

    public function editar_producto($id = null)
    {

        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaProductoModel();
        $data['categorias'] = $categoriaModel->findAll();
        $data['producto'] = $productoModel->where('id_producto', $id)->first();
        $data['titulo'] = 'Editar producto';
        return view('Views/backend/producto/editar_producto_view', $data);
    }

    public function actualizar_producto($id = null)
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaProductoModel();

        $validation->setRules([
            'producto_categoria' => 'is_not_unique[producto_categoria.id_categoria]',
            'imagen' => 'permit_empty|max_size[imagen,4096]|is_image[imagen]',
            'nombre' => 'required|min_length[3]|max_length[150]',
            'descripcion' => 'required|min_length[5]|max_length[500]',
            'precio' => 'required|decimal|greater_than[0]',
            'stock' => 'required|integer',
        ], [
            'producto_categoria' => ['is_not_unique' => 'Debe seleccionar una categoría'],
            'imagen' => [
                'max_size' => 'La imagen no puede exceder los 4MB.',
                'is_image' => 'Debe ser una imagen válida.',
            ],
            'nombre' => [
                'required' => 'El nombre del producto es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede exceder los 150 caracteres.'
            ],
            'descripcion' => [
                'required' => 'La descripción del producto es obligatoria.',
                'min_length' => 'La descripción debe tener al menos 5 caracteres.',
                'max_length' => 'La descripción no puede exceder los 500 caracteres.'
            ],
            'precio' => [
                'required' => 'El precio del producto es obligatorio.',
                'decimal' => 'El precio debe ser un número decimal válido.',
                'greater_than' => 'El precio debe ser mayor que cero.'
            ],
            'stock' => [
                'required' => 'El stock del producto es obligatorio.',
                'integer' => 'El stock debe ser un número entero.'
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            // Si falla la validación, devolvemos la vista con los errores y los datos existentes del producto
            $data = [
                'titulo' => 'Editar producto',
                'validation' => $validation,  // PASA EL OBJETO
                'producto' => $productoModel->find($id),
                'categorias' => $categoriaModel->findAll(),
            ];
            return view('backend/producto/editar_producto_view', $data);
        }

        // Si pasó la validación, armamos los datos para actualizar
        $data = [
            'nombre' => $request->getPost('nombre'),
            'descripcion' => $request->getPost('descripcion'),
            'precio' => $request->getPost('precio'),
            'stock' => $request->getPost('stock'),
            'producto_categoria' => $request->getPost('producto_categoria'),
        ];

        // Verificamos si se subió una nueva imagen
        $img = $request->getFile('imagen');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $nombre_aleatorio = $img->getRandomName();
            $img->move(ROOTPATH . 'public/assets/uploads', $nombre_aleatorio);
            $data['imagen'] = $nombre_aleatorio;

            // Eliminar la imagen anterior
            $productoExistente = $productoModel->find($id);
            if (!empty($productoExistente['imagen'])) {
                $rutaAnterior = ROOTPATH . 'public/assets/uploads/' . $productoExistente['imagen'];
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }
        }

        // Actualizamos en la base de datos
        $productoModel->update($id, $data);

        return redirect()->route('admin/gestionar_productos')->with('mensaje', '¡Producto actualizado correctamente!');
    }



    public function eliminar_producto($id = null)
    {
        //se actualiza el estado del producto a 0 (eliminado)
        $data = array("producto_estado" => 0);
        $producto = new ProductoModel();
        $producto->update($id, $data);
        return redirect()->route('admin/gestionar_productos')->with('mensaje', '¡Producto eliminado correctamente!');
    }

    public function activar_producto($id = null)
    {
        //se actualiza el estado del producto a 1 (activo)
        $data = array("producto_estado" => 1);
        $producto = new ProductoModel();
        $producto->update($id, $data);
        return redirect()->route('admin/gestionar_productos')->with('mensaje', '¡Producto activado correctamente!');
    }

    public function listar_productos(){
        $productoModel = new ProductoModel();
        $data['producto']= $productoModel->where('producto_estado',1)->where('stock >',0)->join('producto_categoria', 'producto_categoria.id_categoria = productos.producto_categoria')->findAll();
        $data['titulo'] = 'Catálogo de Productos';
        return view('Views/backend/producto/catalogo_productos_view', $data);
    }
}
