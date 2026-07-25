<?php

class ReportesController
{
    private $model;

    public function __construct()
    {
        $this->model = new ReportesModel();
    }

    public function index()
    {
        $data = [
            'page_title' => 'Reportes',
            'page_tag'   => 'Reportes | Parkingsoft',
        ];
        $view = __DIR__ . "/../../Frontend/Views/Reportes/reportes.php";
        if (file_exists($view)) {
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista no encontrada"]);
        }
    }

    // GET /reportes/selectReportes
    public function selectReportes()
    {
        $data = $this->model->selectReportes();
        if (!empty($data)) {
            response('success', $data);
        } else {
            response('empty', [], 'No hay reportes registrados');
        }
    }
}
?>