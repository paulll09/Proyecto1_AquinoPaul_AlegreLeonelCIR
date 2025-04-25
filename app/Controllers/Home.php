<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $this->data['titulo'] = 'Centro Informático Regional';
        return view('Proyecto_1/centro_informatico', $this->data);
    }
    
    public function inicio()
    {
        return view('Proyecto_1/centro_informatico', $this->data);
    }
    
    public function nosotros()
    {
        $this->data['titulo'] = 'Sobre Nosotros - Centro Informático Regional';
        return view('Proyecto_1/nosotros', $this->data);
    }
    
    public function contacto()
    {
        $this->data['titulo'] = 'Contáctanos - Centro Informático Regional';
        return view('Proyecto_1/contacto', $this->data);
    }
    
    public function comercializacion()
    {
        $this->data['titulo'] = 'Información Comercial - Centro Informático Regional';
        return view('Proyecto_1/comercializacion', $this->data);
    }
    
    public function servicios($tipo = null)
    {
        if ($tipo) {
            return view('Proyecto_1/servicios/' . $tipo, $this->data);
        }
        return view('Proyecto_1/servicios', $this->data);
    }

    public function terminos()
    {
        $this->data['titulo'] = 'Términos y Usos - Centro Informático Regional';
        return view('Proyecto_1/terminos', $this->data);
    }
}
