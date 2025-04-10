<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Proyecto_1/centro_informatico.php');
    }
}
