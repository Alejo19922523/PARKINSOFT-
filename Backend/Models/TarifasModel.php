<?php

    class TarifasModel extends Mysql
    {
        public $tarifaHora;
        public $tarifaMinuto;
        public $tarifaDia;

        public function __construct()
        {
            parent::__construct();
        }

        
        public function selectTarifas()
        {
            //extrae usuarios
            $sql = "SELECT * FROM parkingsoft.tipo_vehiculo tp INNER JOIN parkingsoft.tarifas t ON t.fk_id_tp_vehiculo = tp.id_tp_vehiculo WHERE id_tarifas != 0;  ";
            $request = $this->select_all($sql);
            return $request;
        }
        



    }

?>