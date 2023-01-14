<?php
 include_once 'Prueba.php';
 include_once 'ModeloE.php';

 $conexion = new ModeloE();
 $array = new Prueba ();

   $result = $array->CombustibleKmtotal();
   $json = json_decode($result, true);

   foreach($json as $consulta)
   {
      $dato = "('id_Unidad','Unidad', 'combustible', 'km') VALUES ('".$consulta['id']."','".$consulta['user']."','".$consulta['com']."','".$consulta['km']."',)";
      $insert = $modelo ->Insertar("ubiexress", $dato);
      if($insert)
       {
         echo  "Registro";
       }else{
         echo "error";
       }
   }


?>