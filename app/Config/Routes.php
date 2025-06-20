<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('inicio', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('contacto', 'Home::contacto');
$routes->get('comercializacion', 'Home::comercializacion');
$routes->get('terminos', 'Home::terminos');
$routes->get('login', 'Home::login');
$routes->post('contacto/enviar', 'MensajeContactoController::add_consulta');//Esto hace que cuando el formulario envíe un POST a contacto/enviar, se ejecute el método add_consulta().
$routes->get('contacto', 'ContactoController::index'); // O el controlador que uses para mostrar el formulario
$routes->post('login/validar','UsuariosController::buscar_usuario'); //Ruta para validar el login, que llama al método buscar_usuario del controlador UsuariosController.
$routes->post('verificar_usuario', 'UsuariosController::buscar_usuario');
$routes->get('logout', 'UsuariosController::cerrar_sesion');
$routes->get('user_admin', 'UsuariosController::admin');
$routes->get('registrar', 'UsuariosController::mostrar_formulario_registro');
$routes->post('registro/guardar', 'UsuariosController::registrar_usuario'); //Ruta para registrar un nuevo usuario, que llama al método registrar_usuario del controlador UsuariosController.
$routes->get('admin/registrar_producto', 'ProductoController::form_agregar_producto');
$routes->post('insertar_producto' , 'ProductoController::registrar_producto');
$routes->get('admin/gestionar_productos', 'ProductoController::gestionar_productos');
$routes->get('eliminar_producto/(:num)', 'ProductoController::eliminar_producto/$1');
$routes->get('activar_producto/(:num)', 'ProductoController::activar_producto/$1');
$routes->get('editar_producto/(:num)', 'ProductoController::editar_producto/$1');
$routes->post('actualizar_producto/(:num)', 'ProductoController::actualizar_producto/$1');
$routes->get('admin/productos', 'ProductoController::listar_productos');
$routes->get('add_cart', 'CarritoController::agregar_carrito');
$routes->get('carrito', 'CarritoController::ver_carrito');
$routes->post('add_cart', 'CarritoController::agregar_carrito');
$routes->get('ver_carrito', 'CarritoController::ver_carrito');
$routes->get('eliminar_item/(:any)', 'CarritoController::eliminar_item/$1');
$routes->get('vaciar_carrito', 'CarritoController::vaciar_carrito');
$routes->get('productos', 'ProductoController::listar_productos');
$routes->get('ventas', 'CarritoController::guardar_venta');
$routes->get('admin/ventas', 'VentasController::listar_ventas');
$routes->get('admin/consultas', 'MensajeContactoController::listarConsultas');
$routes->get('productos/listar', 'ProductoController::listar_productos');
$routes->post('actualizar_item', 'CarritoController::actualizar_item');
