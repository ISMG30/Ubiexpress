<?php 
include_once 'connection.php';
    class Insertarbd extends connection{
        function addEntry( $cliente, $costo, $fecha){
            $insert ="INSERT INTO facturas( cliente_id, concepto, total, fecha) VALUES('$cliente','Servicio de Internet', '$costo','$fecha')";
            $this->query($insert);
        }
        
        function add($id, $unidad, $Combustible, $km){
            $insert ="INSERT INTO ubiexpress(id, Unidad, combustible, km) VALUES ('$id','$unidad','$Combustible','$km')";
            $this ->query($insert);
        }
        
    }
?>