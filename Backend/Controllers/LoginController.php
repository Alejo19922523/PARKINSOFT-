<?php

class LoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    public function home()
    {
        $view = __DIR__ . '/../Views/home.php';
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Vista no encontrada']);
        }
    }

    public function login()
    {
        $body = getJsonBody();
        $usuario  = clean($body['usuario']  ?? '');
        $password = $body['password'] ?? '';

        if (empty($usuario) || empty($password)) {
            response('error', null, 'Usuario y contrasena son requeridos');
            return;
        }

        $user = $this->model->login($usuario);

        if (empty($user)) {
            response('error', null, 'Usuario no encontrado o inactivo');
            return;
        }

        if (!password_verify($password, $user['contraseña'])) {
            response('error', null, 'Contrasena incorrecta');
            return;
        }

        unset($user['contraseña']);
        response('success', $user, 'Login exitoso');
    }
}
?>