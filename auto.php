<?php
 include_once 'insertarbd.php';
 $insertarbd=new Insertarbd();
 $cliente =rand(1111,9999);
 $costo='17.00';
 $fecha =date('Y:m:d H:i:sa');
 $insertarbd->addEntry($cliente, $costo, $fecha);

$json = '[{
            "id":"1",
            "nombre":"Jose",
            "edad":"25",
            "genero":"masculino",
            "email":"josegonzales9871@gmail.com",
            "localidad":"Madrid",
            "telefono":"912546524"},
            {"id":"2",
             "nombre":"Juan",
             "edad":"31",
             "genero":"masculino",
             "email":"juanrodriguez65465@gmail.com",
             "localidad":"Barcelona",
             "telefono":"934654654"},
             {"id":"3",
              "nombre":"Antonio",
              "edad":"43",
              "genero":"masculino",
              "email":"antoni654654@gmail.com",
              "localidad":"Valencia",
              "telefono":"214748366"},
              {"id":"4",
               "nombre":"Angelina",
               "edad":"35",
               "genero":"femenino",
               "email":"angelina654456@gmail.com",
               "localidad":"New York",
               "telefono":"247483647"}]';


$datosclientes = json_decode($json, true);

/* $id ='309';
 $unidad ='TRAILER CASCADIA SN-88-974';
 $Combustible = '25.52';
 $km = '25.52';
 $insertarbd -> add($id, $unidad, $Combustible, $km);*/

 

?>