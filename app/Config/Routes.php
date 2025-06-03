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
$routes->post('insertar_producto', 'ProductoController::registrar_producto');


