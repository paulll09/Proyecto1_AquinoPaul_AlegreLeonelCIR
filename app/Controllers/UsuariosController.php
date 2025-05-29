<?php

namespace App\Controllers;

use App\Models\UsuariosModel; //Importa el modelo mensajesContactoModel.

class UsuariosController extends BaseController
{

    public function mostrar_formulario_registro()
    {
        return view('Proyecto_1/registro_usuario_view');
        //Carga la vista del formulario de registro de usuario.
    }



    public function registrar_usuario()
    {
        $request = \Config\Services::request();
        $session = session();
        $validation = \Config\Services::validation();
        //Instancia los servicios de validación, request y sesión que proporciona CodeIgniter 4.


        $validation->setRules(
            [
                'nombre' => 'required|min_length[3]|max_length[150]',
                'apellido' => 'required|min_length[3]|max_length[150]',
                'email' => 'required|valid_email',
                'telefono' => 'required|min_length[10]|max_length[100]',
                'password' => 'required|min_length[8]|max_length[255]',
            ],

            //Mensajes de error
            [
                'nombre' => [
                    'required' => 'El nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede exceder los 150 caracteres.'
                ],
                'apellido' => [
                    'required' => 'El apellido es obligatorio.',
                    'min_length' => 'El apellido debe tener al menos 3 caracteres.',
                    'max_length' => 'El apellido no puede exceder los 150 caracteres.'
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
                'password' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
                    'max_length' => 'La contraseña no puede exceder los 255 caracteres.'
                ]
            ]

        );

        //Ejecuta la validación con los datos del request. Si pasa la validación, entra al bloque if.
        if ($validation->withRequest($request)->run()) {

            $hashedPassword = password_hash($request->getPost('password'), PASSWORD_DEFAULT); // Encripta la contraseña usando password_hash antes de guardarla en la base de datos.

            $data = [
                'persona_nombre' => $request->getPost('nombre'),
                'persona_apellido' => $request->getPost('apellido'),
                'persona_mail' => $request->getPost('email'),
                'persona_telefono' => $request->getPost('telefono'),
                'persona_pass' => $hashedPassword, // Almacena la contraseña encriptada.
                'persona_estado' => 1, // Estado activo del usuario.
                'perfil_id' => 2, // Asigna un perfil por defecto (por ejemplo, usuario normal).

            ];

            $usuarioModel = new UsuariosModel();
            $usuarioModel->insert($data);

            return redirect()->to('login')->with('mensaje', 'Usuario registrado correctamente');
            //Redirige a la ruta de login con un mensaje de éxito.

        } else {

            $data['titulo'] = 'Registro';
            $data['validation'] = $validation->getErrors();
            return view('Proyecto_1/registro_usuario_view', $data);
            //Si la validación falla, se carga la vista del registro con los errores y el título.

        }
    }

    public function buscar_usuario()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();
        //Instancia los servicios de validación, request y sesión que proporciona CodeIgniter 4.

        $validation->setRules(
            [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]',

            ],

            //Mensajes de error
            [
                'email' => [
                    'required' => 'El correo es obligatorio.',
                    'valid_email' => 'La direccion de correo debe ser valida.',
                ],
                'password' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
                ],


            ]
        );

        //Ejecuta la validación con los datos del request. Si pasa la validación, entra al bloque if.
        if (!$validation->withRequest($request)->run()) {
            $data['titulo'] = 'Login';
            $data['validation'] = $validation->getErrors();
            return view('Proyecto_1/login_view', $data);
            //Si la validación falla:Se cargan los errores usando $validation->getErrors().
            //Se devuelve la vista del login con los errores y el título.
        }

        $mail = $request->getPost('email');
        $pass = $request->getPost('password');
        //Se obtienen los valores ingresados en el formulario.


        $user_Model = new UsuariosModel();
        $user = $user_Model->where('persona_mail', $mail)
            ->where('persona_estado', 1) //Verifica que el usuario esté activo
            ->first();
        //Se busca el usuario en la base de datos por correo y estado activo (persona_estado = 1).



        if ($user && password_verify($pass, $user['persona_pass'])) {   //Si el usuario existe y la contraseña coincide con el hash guardado usando password_verify, continúa:

            $data = [
                'id' => $user['id_persona'],
                'nombre' => $user['persona_nombre'],
                'apellido' => $user['persona_apellido'],
                'perfil' => $user['perfil_id'],
                'login' => true,

            ];

            $session->set($data);  //Si el usuario existe y la contraseña es correcta, se crea un array $data con los datos del usuario.

            switch ((int) $user['perfil_id']) {
                case 1:
                    return redirect()->route('user_admin');
                    //Si el perfil es 1, se redirige al usuario al panel de administración.
                case 2:
                    return redirect()->route('/');
                    //Si el perfil es 2, se redirige al usuario a la página de inicio.

            }
        } else {

            return redirect()->route('login')->with('mensaje', 'Usuario y/o contraseña incorrecto!');
            //Si la validación falla o el usuario no existe, se vuelve al login con un mensaje de error.
        }
    }

    public function cerrar_sesion()
    {
        $session = session();
        $session->setFlashdata('mensaje', 'Sesión cerrada correctamente.');
        return redirect()->to(base_url('login'));
        $session->destroy(); // Mueve la destrucción después de la redirección.
    }

    public function admin()
    {

        $data['titulo'] = 'Index';

        return view('Proyecto_1/admin_view', $data);
        //Carga la vista del panel de administración con el título "Index".


    }
}
