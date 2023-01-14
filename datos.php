<?php
  include 'Json.php';
  include_once 'ModeloE.php';
     
  $this -> modelo = new ModeloE();
        $data =[];
      $data[] = array(
      "id" => "341",
      "user" => "C. ROJA SN-75-862",
      "com" => "49.5",
      "km" => "28140"
     );
     $data[] = array(
      "id" => "302",
      "user" => "C. ROJA SN-75-866",
      "com" => "48.5",
      "km" => "29569"
     );
     $data[] = array(
      "id" => "103",
      "user" => "TRAILER CASCADIA SN-88-974",
      "com" => "220",
      "km" => "39760"
     );    
    /* $result = array(
      "sEcho" => 1,
      "iTotalRecords" => count($data),
      "iTotalDisplayRecords" => count($data),
      "aaData" => $data
     );*/
     $result = $data + $data;
     echo json_encode($result);
     $jsone = json_encode($result);
     $datosclientes = json_decode($jsone, true);
     
     $modelo = new ModeloE();
     foreach ($datosclientes as $cliente)
     {
        $consulta ="(id_Unidad, Unidad, combustible, km) VALUES('".$cliente['id']."','".$cliente['user']."','".$cliente['com']."','".$cliente['km']."')";
        $datof = $modelo->Insertar("ubiexpress",$consulta);
        if($datof){
         echo  "Registro";
        }else{
         echo "error";
        }
     }  
     
    
?>