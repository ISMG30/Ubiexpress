<?php
//include_once "Prueba.php";
//include_once "Json.php";
//include_once "./Ubi/Inserta.php";
include_once "./Ubi/Request.php";

if(!empty($_POST['opcion'])){
   $opcion = $_POST['opcion'];
   $Ubi = new Prueba ();
  // $db =new Json();   
   //$I =new Inser();
   $f =new Request();
   switch($opcion){
   
    case 1: {
     
        $dato = $Ubi ->Unidades();
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
        $unidad=$_POST['unidad'];
        $fechaI=$_POST['fechai'];
        $fechaF=$_POST['fechaf'];
        $dato =$Ubi-> KmRecorido($fechaI, $fechaF, $unidad);
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
     case 5:{

        $dato = $Ubi->Coordenadas();
     }
     ;
     break;

     case 6:{

        $dato = $db->Insercion();
     }
     ;
     break;
     case 8:{

        $dato = $I->Inserter();
     }
     ;
     break;
     case 7:{

        $dato = $f->getInsert();
     }
     ;
     break;
     case 9:{

      $dato = $Ubi-> Coordenadas();
      }
      ;
      break;

   }
}
?>