<?php

class RolesUsuariosController
{
    private $model;

    public function __construct()
    {
        $this->model = new RolesUsuariosModel();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Roles Usuarios',
            'page_tag'   => 'Roles Usuarios | Parkingsoft',
        ];

        $view = __DIR__ . "/../../Frontend/Views/RolesUsuarios/rolesUsuarios.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    // GET /rolesUsuarios/selectRoles
    public function selectRoles()
    {
        $data = $this->model->selectRoles();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay roles registrados');
        }
    }

    // POST /rolesUsuarios/insertRol
    public function insertRol()
    {
        $body = getJsonBody();
        $result = $this->model->insertRol(
            clean($body['nombre_rol']   ?? ''),
            clean($body['descripcion']  ?? ''),
            (int)($body['status']       ?? 1)
        );

        if ($result === 'exist') {
            response('exist', null, 'El rol ya existe');
        } elseif ($result) {
            response('success', null, 'Rol creado correctamente');
        } else {
            response('error', null, 'Error al crear el rol');
        }
    }
}
?>