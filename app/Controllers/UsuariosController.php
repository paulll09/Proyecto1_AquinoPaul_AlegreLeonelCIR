<?php

namespace App\Controllers;

use App\Models\UsuariosModel;

class UsuariosController extends BaseController
{
    public function mostrar_formulario_registro()
    {
        return view('Proyecto_1/registro_usuario_view');
    }

    public function registrar_usuario()
    {
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                'nombre' => 'required|min_length[3]|max_length[150]',
                'apellido' => 'required|min_length[3]|max_length[150]',
                'dni' => 'required|numeric|min_length[7]|max_length[11]',
                'fecha_nacimiento' => 'required|valid_date',
                'telefono' => 'required|min_length[10]|max_length[20]',
                'direccion' => 'required|min_length[5]|max_length[255]',
                'ciudad' => 'required|min_length[3]|max_length[100]',
                'provincia' => 'required|min_length[3]|max_length[100]',
                'codigo_postal' => 'required|numeric|min_length[3]|max_length[10]',
                'email' => 'required|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ],
            [
                'nombre' => [
                    'required' => 'El nombre es obligatorio.',
                    'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                    'max_length' => 'El nombre no puede exceder los 150 caracteres.',
                ],
                'apellido' => [
                    'required' => 'El apellido es obligatorio.',
                    'min_length' => 'El apellido debe tener al menos 3 caracteres.',
                    'max_length' => 'El apellido no puede exceder los 150 caracteres.',
                ],
                'dni' => [
                    'required' => 'El DNI/CUIT es obligatorio.',
                    'numeric' => 'Debe ingresar solo números.',
                    'min_length' => 'Debe tener al menos 7 dígitos.',
                    'max_length' => 'No debe exceder los 11 dígitos.',
                ],
                'fecha_nacimiento' => [
                    'required' => 'La fecha de nacimiento es obligatoria.',
                    'valid_date' => 'Debe ingresar una fecha válida.',
                ],
                'telefono' => [
                    'required' => 'El teléfono es obligatorio.',
                    'min_length' => 'El teléfono debe tener al menos 10 caracteres.',
                    'max_length' => 'El teléfono no puede exceder los 20 caracteres.',
                ],
                'direccion' => [
                    'required' => 'La dirección es obligatoria.',
                    'min_length' => 'La dirección es muy corta.',
                    'max_length' => 'La dirección es demasiado larga.',
                ],
                'ciudad' => [
                    'required' => 'La ciudad es obligatoria.',
                    'min_length' => 'Debe tener al menos 3 caracteres.',
                    'max_length' => 'No debe exceder los 100 caracteres.',
                ],
                'provincia' => [
                    'required' => 'La provincia es obligatoria.',
                    'min_length' => 'Debe tener al menos 3 caracteres.',
                    'max_length' => 'No debe exceder los 100 caracteres.',
                ],
                'codigo_postal' => [
                    'required' => 'El código postal es obligatorio.',
                    'numeric' => 'Debe ingresar solo números.',
                    'min_length' => 'Debe tener al menos 3 dígitos.',
                    'max_length' => 'No debe exceder los 10 dígitos.',
                ],
                'email' => [
                    'required' => 'El correo electrónico es obligatorio.',
                    'valid_email' => 'Debe ingresar un correo electrónico válido.',
                ],
                'password' => [
                    'required' => 'La contraseña es obligatoria.',
                    'min_length' => 'Debe tener al menos 8 caracteres.',
                    'max_length' => 'No puede exceder los 255 caracteres.',
                ],
            ]
        );

        if (!$validation->withRequest($request)->run()) {
            return view('Proyecto_1/registro_usuario_view', [
                'validation' => $validation,
                'datos' => $request->getPost(),
            ]);
        }

        $hashedPassword = password_hash($request->getPost('password'), PASSWORD_DEFAULT);

        $data = [
            'persona_nombre' => $request->getPost('nombre'),
            'persona_apellido' => $request->getPost('apellido'),
            'persona_dni' => $request->getPost('dni'),
            'persona_fecha_nacimiento' => $request->getPost('fecha_nacimiento'),
            'persona_telefono' => $request->getPost('telefono'),
            'persona_direccion' => $request->getPost('direccion'),
            'persona_ciudad' => $request->getPost('ciudad'),
            'persona_provincia' => $request->getPost('provincia'),
            'persona_codigo_postal' => $request->getPost('codigo_postal'),
            'persona_mail' => $request->getPost('email'),
            'persona_pass' => $hashedPassword,
            'persona_estado' => 1,
            'perfil_id' => 2,
        ];

        $usuarioModel = new UsuariosModel();
        $usuarioModel->insert($data);

        return redirect()->to('login')->with('mensaje', 'Usuario registrado correctamente.');
    }

    public function buscar_usuario()
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();
        $session = session();

        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[8]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            return view('Proyecto_1/login_view', [
                'titulo' => 'Login',
                'validation' => $validation->getErrors()
            ]);
        }

        $mail = $request->getPost('email');
        $pass = $request->getPost('password');

        $user_Model = new UsuariosModel();
        $user = $user_Model->where('persona_mail', $mail)
            ->where('persona_estado', 1)
            ->first();

        if ($user && password_verify($pass, $user['persona_pass'])) {
            $session->set([
                'id' => $user['id_persona'],
                'nombre' => $user['persona_nombre'],
                'apellido' => $user['persona_apellido'],
                'perfil' => $user['perfil_id'],
                'login' => true,
            ]);

            return redirect()->route($user['perfil_id'] == 1 ? 'user_admin' : '/');
        }

        return view('Proyecto_1/login_view', [
            'titulo' => 'Login',
            'mensaje_error' => 'Usuario y/o contraseña incorrectos.',
        ]);
    }

    public function editar_perfil()
    {
        $session = session();

        if (!$session->get('login')) {
            return redirect()->to('login')->with('mensaje_error', 'Debe iniciar sesión para editar su perfil.');
        }

        $idUsuario = $session->get('id');
        $usuarioModel = new UsuariosModel();
        $usuario = $usuarioModel->find($idUsuario);

        if (!$usuario) {
            return redirect()->back()->with('mensaje_error', 'Usuario no encontrado.');
        }

        return view('Views/backend/perfil/editar_perfil_view', [
            'titulo' => 'Editar Perfil',
            'usuario' => $usuario,
            'validation' => session('validation'),
            'mensaje' => session('mensaje'),
        ]);
    }

    public function actualizar_perfil()
    {
        $session = session();
        $idUsuario = $session->get('id');
        $usuarioModel = new UsuariosModel();
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[150]',
            'apellido' => 'required|min_length[3]|max_length[150]',
            'dni' => 'required|numeric|min_length[7]|max_length[11]',
            'fecha_nacimiento' => 'required|valid_date',
            'telefono' => 'required|min_length[10]|max_length[20]',
            'direccion' => 'required|min_length[5]|max_length[255]',
            'ciudad' => 'required|min_length[3]|max_length[100]',
            'provincia' => 'required|min_length[3]|max_length[100]',
            'codigo_postal' => 'required|numeric|min_length[3]|max_length[10]',
            'email' => 'required|valid_email',

        ], [
            'nombre' => [
                'required' => 'El nombre es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => 'El nombre no puede exceder los 150 caracteres.',
            ],
            'apellido' => [
                'required' => 'El apellido es obligatorio.',
                'min_length' => 'El apellido debe tener al menos 3 caracteres.',
                'max_length' => 'El apellido no puede exceder los 150 caracteres.',
            ],
            'dni' => [
                'required' => 'El DNI/CUIT es obligatorio.',
                'numeric' => 'Debe ingresar solo números.',
                'min_length' => 'Debe tener al menos 7 dígitos.',
                'max_length' => 'No debe exceder los 11 dígitos.',
            ],
            'fecha_nacimiento' => [
                'required' => 'La fecha de nacimiento es obligatoria.',
                'valid_date' => 'Debe ingresar una fecha válida.',
            ],
            'telefono' => [
                'required' => 'El teléfono es obligatorio.',
                'min_length' => 'El teléfono debe tener al menos 10 caracteres.',
                'max_length' => 'El teléfono no puede exceder los 20 caracteres.',
            ],
            'direccion' => [
                'required' => 'La dirección es obligatoria.',
                'min_length' => 'La dirección es muy corta.',
                'max_length' => 'La dirección es demasiado larga.',
            ],
            'ciudad' => [
                'required' => 'La ciudad es obligatoria.',
                'min_length' => 'Debe tener al menos 3 caracteres.',
                'max_length' => 'No debe exceder los 100 caracteres.',
            ],
            'provincia' => [
                'required' => 'La provincia es obligatoria.',
                'min_length' => 'Debe tener al menos 3 caracteres.',
                'max_length' => 'No debe exceder los 100 caracteres.',
            ],
            'codigo_postal' => [
                'required' => 'El código postal es obligatorio.',
                'numeric' => 'Debe ingresar solo números.',
                'min_length' => 'Debe tener al menos 3 dígitos.',
                'max_length' => 'No debe exceder los 10 dígitos.',
            ],
            'email' => [
                'required' => 'El correo electrónico es obligatorio.',
                'valid_email' => 'Debe ingresar un correo electrónico válido.',
            ],
            'password' => [
                'required' => 'La contraseña es obligatoria.',
                'min_length' => 'Debe tener al menos 8 caracteres.',
                'max_length' => 'No puede exceder los 255 caracteres.',
            ],
        ]);

        if (!$validation->withRequest($request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('validation', $validation);
        }

        $datos = [
            'persona_nombre' => $request->getPost('nombre'),
            'persona_apellido' => $request->getPost('apellido'),
            'persona_dni' => $request->getPost('dni'),
            'persona_fecha_nacimiento' => $request->getPost('fecha_nacimiento'),
            'persona_telefono' => $request->getPost('telefono'),
            'persona_direccion' => $request->getPost('direccion'),
            'persona_ciudad' => $request->getPost('ciudad'),
            'persona_provincia' => $request->getPost('provincia'),
            'persona_codigo_postal' => $request->getPost('codigo_postal'),
            'persona_mail' => $request->getPost('email'),
        ];

        $usuarioModel->update($idUsuario, $datos);

        return redirect()->back()->with('mensaje', 'Perfil actualizado correctamente.');
    }

    public function cerrar_sesion()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('login?cerrada=1'));
    }

    public function admin()
    {
        return view('Proyecto_1/admin_view', ['titulo' => 'Index']);
    }
}
