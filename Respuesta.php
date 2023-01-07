<?php
include_once "Prueba.php";

if(!empty($_POST['opcion'])){
   $opcion = $_POST['opcion'];
   $Ubi = new Prueba ();
   
   switch($opcion){
   
    case 1: {
     
        $dato = $Ubi ->Unidades($unidad);
    }
    ;
    break;
    
    break;
    case 2: {
      
        $dato = $Ubi -> CombustibleKmtotal();
    }
    ;
    break;
    case 3:{
        $fechaI=$_POST['fechai'];
        $fechaF=$_POST['fechaf'];
        $dato =$Ubi-> KmRecorido($fechaI, $fechaF);
    }
    ;
    break;
    case 4:{
         $user = $_POST['unidad'];
         $fechaI = $_POST['fechai'];
         $fechaF = $_POST['fechaf'];
         $dato =$Ubi->Posicion1($user, $fechaI, $fechaF);
     }
     ;
     break;
   }
}
?>