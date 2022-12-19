<?php
include_once "Prueba.php";

if(!empty($_POST['opcion'])){
   $opcion = $_POST['opcion'];
   $Ubi = new Prueba ();
   
   switch($opcion){
    case 1: {
          $dato = $Ubi->unidades();
    }
    ;
    break;
    case 2: {
      //  $unidad= $_POST['unidad'];
        $dato = $Ubi ->NUnidad();
    }
    case 3:{
         
        $dato = $Ubi ->Combustible();
    }
   }
}
?>