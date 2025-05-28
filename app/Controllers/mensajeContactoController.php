<?php

namespace App\Controllers;

use App\Models\mensajesContactoModel; //Importa el modelo mensajesContactoModel.

// Controlador para manejar los mensajes de contacto
class MensajeContactoController extends BaseController
{
    public function add_consulta() //Método público que procesará el formulario.
    {

        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        //Inicializa el servicio de validación y obtiene el objeto de la petición (request).


        //Define las reglas de validación y los mensajes personalizados de error para cada campo del formulario.
        $validation->setRules(
            [
                'nombre' => 'required|min_length[3]|max_length[150]',
                'email' => 'required|valid_email',
                'telefono' => 'required|min_length[10]|max_length[100]',
                'asunto' => 'required',
                'mensaje' => 'required|min_length[10]|max_length[500]',

            ],

            //Errors

            [
                'nombre' => [
                    'required' => 'El nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede exceder los 150 caracteres.'
                ],
                'email' => [
                    'required' => 'El correo electrónico es obligatorio.',
                    'valid_email' => 'Debe ingresar un correo electrónico válido.'
                ],
                'telefono' => [
                    'required' => 'El teléfono es obligatorio.',
                    'min_length' => 'El teléfono debe tener al menos 10 caracteres.',
                    'max_length' => 'El teléfono no puede exceder los 100 caracteres.'
                ],
                'asunto' => [
                    'required' => 'El asunto es obligatorio.'
                ],
                'mensaje' => [
                    'required' => 'El mensaje es obligatorio.',
                    'min_length' => 'El mensaje debe tener al menos 10 caracteres.',
                ]
            ]
        );


        //Ejecuta la validación con los datos del request. Si pasa la validación, entra al bloque if.
        if ($validation->withRequest($request)->run()) {

            $data = [
                'nombre_completo' => $request->getPost('nombre'),
                'correo_electronico' => $request->getPost('email'),
                'telefono' => $request->getPost('telefono'),
                'asunto' => $request->getPost('asunto'),
                'mensaje' => $request->getPost('mensaje')
            ];
            //Recoge los datos del formulario usando el objeto request y los almacena en un array $data.

            $mensajeContactoModel = new mensajesContactoModel();
            $mensajeContactoModel->insert($data);



            return redirect()->route('contacto')->with('mensaje_contacto', 'Mensaje enviado correctamente. Nos pondremos en contacto contigo pronto.');
            //Redirige a la ruta contacto y pasa un mensaje de sesión

        } else {
            $data['titulo'] = 'Contacto';
            $data['validation'] = $validation->getErrors();
            return view('Proyecto_1/contacto_view', $data);
            //Si no pasa la validación, carga nuevamente la vista del formulario y pasa los errores a la vista para mostrarlos.



        }
    }
}
