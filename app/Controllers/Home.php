<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $this->data['titulo'] = 'Centro Informático Regional';
        return view('Proyecto_1/inicio_view', $this->data);
    }
    
    public function inicio()
    {
        $this->data['titulo'] = 'Centro Informático Regional';
        return view('Proyecto_1/inicio_view', $this->data);
    }
    
    public function nosotros()
    {
        $this->data['titulo'] = 'Sobre Nosotros - Centro Informático Regional';
        return view('Proyecto_1/nosotros_view', $this->data);
    }
    
    public function contacto()
    {
        $this->data['titulo'] = 'Contáctanos - Centro Informático Regional';
        return view('Proyecto_1/contacto_view', $this->data);
    }
    
    public function comercializacion()
    {
        $this->data['titulo'] = 'Información Comercial - Centro Informático Regional';
        return view('Proyecto_1/comercializacion_view', $this->data);
    }
    
    public function terminos()
    {
        $this->data['titulo'] = 'Términos y Usos - Centro Informático Regional';
        return view('Proyecto_1/terminos_view', $this->data);
    }

    public function login()
    {
        $this->data['titulo'] = 'Iniciar Sesión - Centro Informático Regional';
        return view('Proyecto_1/login_view', $this->data);
    }
}
