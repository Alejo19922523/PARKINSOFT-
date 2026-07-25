<?php

class HomeController
{
    private $model;

    public function __construct()
    {
        $this->model = new HomeModel();
    }

    public function home()
    {
        require_once __DIR__ . '/../Views/home.php';
    }
}
?>