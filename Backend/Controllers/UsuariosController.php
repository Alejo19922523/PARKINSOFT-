<?php

class UsuariosController
{
    private $model;

    public function __construct()
    {
        $this->model = new UsuariosModel();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Usuarios',
            'page_tag'   => 'Usuarios | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/Usuarios/usuarios.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    // GET /usuarios/selectUsuarios
    public function selectUsuarios()
    {
        $data = $this->model->selectUsuarios();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay usuarios registrados');
        }
    }

    // GET /usuarios/selectUsuario/{id}
    public function selectUsuario(string $id)
    {
        $data = $this->model->selectUsuario($id);
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'Usuario no encontrado');
        }
    }

    // POST /usuarios/insertUsuario
    public function insertUsuario()
    {
        $body = getJsonBody();
        $password = hashPassword($body['contraseña'] ?? '');

        $result = $this->model->InsertUsuario(
            clean($body['num_documento']       ?? ''),
            (int)($body['id_tp_documento']     ?? 0),
            (int)($body['id_genero']           ?? 0),
            clean($body['nom_usuario']         ?? ''),
            clean($body['prim_nom']            ?? ''),
            clean($body['seg_nombre']          ?? ''),
            clean($body['prim_apellido']       ?? ''),
            clean($body['seg_apellido']        ?? ''),
            clean($body['correo_electronico']  ?? ''),
            $password
        );

        if ($result === 'exist') {
            response('exist', null, 'El usuario ya existe');
        } elseif ($result) {
            $this->model->InsertRol(
                clean($body['num_documento']   ?? ''),
                (int)($body['id_tp_documento'] ?? 0),
                (int)($body['id_rol']          ?? 2),
                1
            );
            response('success', null, 'Usuario creado correctamente');
        } else {
            response('error', null, 'Error al crear el usuario');
        }
    }

    // PUT /usuarios/updateUsuario
    public function updateUsuario()
    {
        $body = getJsonBody();

        $result = $this->model->updateUsuario(
            clean($body['num_documento']      ?? ''),
            (int)($body['id_genero']          ?? 0),
            clean($body['nom_usuario']        ?? ''),
            clean($body['prim_nom']           ?? ''),
            clean($body['seg_nombre']         ?? ''),
            clean($body['prim_apellido']      ?? ''),
            clean($body['seg_apellido']       ?? ''),
            clean($body['correo_electronico'] ?? '')
        );

        if ($result === 'exist') {
            response('exist', null, 'El nombre de usuario ya está en uso');
        } elseif ($result) {
            response('success', null, 'Usuario actualizado');
        } else {
            response('error', null, 'Error al actualizar');
        }
    }

    // DELETE /usuarios/deleteUsuario/{id}
    public function deleteUsuario(string $id)
    {
        $result = $this->model->deleteUsuario($id);
        if ($result === 'ok') {
            response('success', null, 'Usuario desactivado');
        } else {
            response('error', null, 'Error al desactivar usuario');
        }
    }
}
?>