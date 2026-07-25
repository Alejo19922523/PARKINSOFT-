

<?php

class TipoVehiculoController
{
    private $model;

    public function __construct()
    {
        $this->model = new TipoVehiculoModel();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Tipo de Vehículo',
            'page_tag'   => 'Tipo de Vehículo | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/TipoVehiculo/tipoVehiculo.php";
        if (file_exists($view)) {
            include $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    public function selectTipoVehiculos()
    {
        $data = $this->model->selectTipoVehiculos();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay tipos de vehículo');
        }
    }

    public function selectTpVehiculo()
    {
        $data = $this->model->selectTpVehiculo();
        response('success', $data);
    }

    public function insertTpVehiculo()
    {
        $body = getJsonBody();
        $result = $this->model->InsertTpVehiculo(clean($body['nom_vehiculo'] ?? ''));

        if ($result === 'exist') {
            response('exist', null, 'Ese tipo de vehículo ya existe');
        } elseif ($result) {
            response('success', null, 'Tipo de vehículo creado');
        } else {
            response('error', null, 'Error al crear tipo de vehículo');
        }
    }

    public function updateTpVehiculo()
    {
        $body = getJsonBody();
        $result = $this->model->updateTpVehiculo(
            (int)($body['id_tp_vehiculo'] ?? 0),
            clean($body['nom_vehiculo']   ?? '')
        );

        if ($result === 'exist') {
            response('exist', null, 'Ese nombre ya existe');
        } elseif ($result) {
            response('success', null, 'Tipo de vehículo actualizado');
        } else {
            response('error', null, 'Error al actualizar');
        }
    }

    public function deleteTipoVehiculo(string $id)
    {
        $result = $this->model->deleteTipoVehiculo((int)$id);
        if ($result === 'exist') {
            response('exist', null, 'Tiene tarifas asociadas, no se puede eliminar');
        } elseif ($result) {
            response('success', null, 'Tipo de vehículo eliminado');
        } else {
            response('error', null, 'Error al eliminar');
        }
    }
}
?>