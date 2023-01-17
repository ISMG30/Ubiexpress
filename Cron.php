<?php
 include_once 'ModeloE.php';
 include_once 'Prueba.php';
 $modelo = new ModeloE ();
 $Prueba = new Prueba ();
 function combustible(){
  $data =[];
$data[] = array(
  "id" => "23",
  "user" => "C. ROJA SN-75-862",
  "com" => "49.5",
  "km" => "28140"
 );
 $data[] = array(
  "id" => "36",
  "user" => "C. ROJA SN-75-866",
  "com" => "48.5",
  "km" => "29569"
 );
 $data[] = array(
  "id" => "69",
  "user" => "TRAILER CASCADIA SN-88-974",
  "com" => "220",
  "km" => "39760"
 );    
 $result = array(
  "sEcho" => 1,
  "iTotalRecords" => count($data),
  "iTotalDisplayRecords" => count($data),
  "aaData" => $data
 );
 $result = $data + $data;
 
 $jsone = json_encode($result);
 
 return $jsone;
 }
     
     $funcion = combustible();
     echo $funcion;
    /* $funcionU = $Prueba-> CombustibleKmtotal();
     echo $funcionU;
     $datoJsond= json_decode($funcionU,true);*/
     
  
     $datoJson = json_decode($funcion,true);
       
     foreach ($datoJson as $cliente)
     {
        $dato = "(id_Unidad, Unidad, combustible, km) VALUES('".$cliente['id']."','".$cliente['user']."','".$cliente['com']."','".$cliente['km']."')";
        $Insert =$modelo->Insertar("ubiexpress",$dato);
      
        //mysqli_query($conexion, "INSERT INTO ubiexpress(id_Unidad, Unidad, combustible, km) VALUES ('".$cliente['id']."','".$cliente['user']."','".$cliente['com']."', '".$cliente['km']."')");
    
      }
     
?>