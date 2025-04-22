<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('Proyecto_1/centro_informatico', $this->data);
    }
    
    public function inicio()
    {
        return view('Proyecto_1/centro_informatico', $this->data);
    }
    
    public function nosotros()
    {
        return view('Proyecto_1/nosotros', $this->data);
    }
    
    public function contacto()
    {
        return view('Proyecto_1/contacto', $this->data);
    }
    
    public function consulta()
    {
        return view('Proyecto_1/consulta', $this->data);
    }
    
    public function servicios($tipo = null)
    {
        if ($tipo) {
            return view('Proyecto_1/servicios/' . $tipo, $this->data);
        }
        return view('Proyecto_1/servicios', $this->data);
    }
}
