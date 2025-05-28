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

