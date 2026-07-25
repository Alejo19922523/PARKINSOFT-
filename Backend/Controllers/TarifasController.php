<?php

class TarifasController
{
    private $model;

    public function __construct()
    {
        $this->model = new TarifasModel();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Tarifas',
            'page_tag'   => 'Tarifas | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/Tarifas/tarifas.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    // GET /tarifas/selectTarifas
    public function selectTarifas()
    {
        $data = $this->model->selectTarifas();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay tarifas registradas');
        }
    }
}
?>