<?php

    class ModeloE {
        private $db;
        private $modelo;
        function __construct()
        {   $this ->modelo = array();
            $this -> db = new PDO('mysql:host=localhost;dbname=pruebacront', "root","1234");
           
        }

        
        public function Insertar($tabla, $consulta)
        {
            $consulta1= "insert into " . $tabla . " " . $consulta. "";
            echo "- $consulta1";
            $reuslt = $this->db->query($consulta1);
            if($reuslt)
            {
                return true;
            }else{
                return false;

            }

        }
        
    }
?>