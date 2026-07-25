<?php

class RegistroVehiculosController
{
    private $model;

    public function __construct()
    {
        $this->model = new RegistroVehiculosModel();
    }

    // Agrega este método:
    public function index()
    {
        $data = [
            'page_title' => 'Registro Vehículos',
            'page_tag'   => 'Registro Vehículos | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/RegistroVehiculos/registroVehiculos.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    // GET /registroVehiculos/selectVehiculos
    public function selectVehiculos()
    {
        $data = $this->model->selectVehiculos();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay vehículos registrados');
        }
    }
}
?>