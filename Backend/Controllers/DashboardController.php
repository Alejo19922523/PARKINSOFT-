<?php

class DashboardController
{
    public function index()
    {
        $data = [
            'page_title' => 'Dashboard',
        ];

        $view = __DIR__ . "/../../Frontend/Views/Dashboard/dashboard.php";
        if (file_exists($view)) {
            require_once __DIR__ . "/../Config/Config.php";
            require_once __DIR__ . "/../Helpers/Helpers.php";
            require_once $view;
        } else {
            echo json_encode(["status" => "error", "message" => "Vista dashboard no encontrada"]);
        }
    }
}
?>
