<?php
include_once "Prueba.php";

if(!empty($_POST['opcion'])){
   $opcion = $_POST['opcion'];
   $Ubi = new Prueba ();
   
   switch($opcion){
    case 1: {
          $fechai=$_POST['fechai'];
          $fechaf=$_POST['fechaf'];
          $dato = $Ubi->login($fechai, $fechaf);
          
         
    }
    ;
    break;
    case 2: {
        $unidad= $_POST['unidad'];
        $dato = $Ubi ->Usuarios($unidad);
        
        
    }
    ;
    break;
    case 3:{
        $unidad= $_POST['unidad'];
        $dato = $Ubi ->NUnidad($unidad);
    }
    ;
    break;
    case 4: {
      
        $dato = $Ubi -> Combustible();
    }
    ;
    break;
    case 5:{
        $fechaI=$_POST['fechai'];
        $fechaF=$_POST['fechaf'];
        $dato =$Ubi-> KmRecorido($fechaI, $fechaF);
    }
    ;
    break;
    case 6:{
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