<?php

   $conectar = new mysqli("localhost", "root", "1234","pruebacront");
   if($conectar->connect_errno){
     printf("Error al conetar: %s \n",
     $conectar-> connect_error);
     exit();
   }
   $fecha = date('Y-m-d');
   $costo = rand(5, 15);
   $cliente = rand(1,200);
   if($fecha == '2021-02-27'){
    $conetar ->query("INSERT INTO facturas(cliente_id, concepto, total, fecha) VALUES('$cliente','Servicio de Internet', '$costo','$fecha')");  
   }

?>