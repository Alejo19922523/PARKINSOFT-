<?php

class IngresoVehiculosController
{
    public function index()
    {
        $data = [
            'page_title' => 'Ingreso Vehículos',
            'page_tag'   => 'Ingreso Vehículos | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/IngresoVehiculos/ingresoVehiculos.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }
}
?>
