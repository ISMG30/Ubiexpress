<?php
include_once "Prueba.php";

if(!empty($_POST['opcion'])){
   $opcion = $_POST['opcion'];
   $Ubi = new Prueba ();
   
   switch($opcion){
    case 1: {
          $dato = $Ubi->login();
          return $dato;
         
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
      
        $dato = $Ubi -> Combustibleo();
    }
    ;
    break;
    case 5:{
       // $fechaI=$_POST['fecha'];
        $dato =$Ubi->Posicion();
    }
    ;
    break;
    case 6:{
        // $fechaI=$_POST['fecha'];
         $dato =$Ubi->Posicion1();
     }
     ;
     break;
   }
}
?>