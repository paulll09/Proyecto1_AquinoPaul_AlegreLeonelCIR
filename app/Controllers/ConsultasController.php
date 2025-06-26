<?php

namespace App\Controllers;

use App\Models\MensajesContactoModel;

class ConsultasController extends BaseController
{
    public function index()
    {
        $model = new MensajesContactoModel();
        $data['consultas'] = $model->findAll();
        return view('contenido/consultas_view', $data);
    }

    public function marcarComoLeida($id)
    {
        $model = new MensajesContactoModel();
        $model->update($id, ['leido' => 1]);

        return redirect()->back()->with('mensaje', 'Consulta marcada como leída.');
    }

    public function eliminar($id)
    {
        $model = new MensajesContactoModel();
        $model->delete($id);

        return redirect()->back()->with('mensaje', 'Consulta eliminada correctamente.');
    }
}
