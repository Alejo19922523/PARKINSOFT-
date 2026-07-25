<?php

class ReportesModel extends Mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function selectReportes()
    {
        $sql = "SELECT * FROM parkingsoft.ingreso_vehiculo"; // ajusta la tabla según necesites
        $request = $this->select_all($sql);
        return $request;
    }
}
?>