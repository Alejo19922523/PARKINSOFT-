<?php

class SalidaVehiculosController
{
    public function index()
    {
        $data = [
            'page_title' => 'Salida Vehículos',
            'page_tag'   => 'Salida Vehículos | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/SalidaVehiculos/salidaVehiculos.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }
}
?>
