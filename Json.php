<?php
      /*  include_once 'wialon.php';
        $wialon_api = new Wialon();
       // $token ='2f0a8929ad515bb67157ead976434d5832024D2B6FDD58B2372D512352E484120DED7575';
        $result = $wialon_api -> login($token);
        $json =json_decode($result, true);
        if(!isset($json['error']))
        {
          // Buscar articulos  por propiedad   https://sdk.wialon.com/wiki/en/local/remoteapi2004/apiref/core/search_items
          $params = array(                  
            'spec' => array(                  //Especificacion de búsqueda      
                'itemsType' => 'avl_unit',    // Tipo de Busqueda
                'propName'=> 'sys_name',      //Nombre de la propiedad cuyo valor se buscará
                'propValueMask' =>'*',        //Máscara de valor de propiedad
                'sortType' => 'sys_name'      //Nombre de la propiedad utilizada para clasificar
            ),
            'force' => 1,                     //0: si se ha realizado dicha búsqueda, devuelve el resultado almacenado en caché, 1: para realizar una nueva búsqueda
            'from' => 0,                      //Indice del primer elemento devuelto 
            'to'=>0,                          //Indice del último elemento devuelto 
            'flags' => 4611686018427387903    //Indicadores de datos para la respuesta
          );     
        $dato = $wialon_api->core_search_items(json_encode($params));  //Se usa el comando core/search_items
        $resul = json_decode($dato, true);
          if(!isset($resul['error']))
          {
             $array = [];

             foreach($resul['items'] as $row)
             {
               $id = $row['id'];
               
              //Valores  de los sensores del último mensaje  https://sdk.wialon.com/wiki/en/local/remoteapi2004/apiref/unit/calc_last_message
               $params = array(
                'unitId'=> $id,                 //Identificación  de la unidad
                'sensores'=> 1,                 //Matriz de ID de sensores
                'flags' => 0x01                 //Bandera
                ); 
              $dato = $wialon_api->unit_calc_last_message(json_encode($params)); //Se usa el comando unit/calc_last_message
              $ver = json_decode($dato, true);
              if(!isset($ver['error']))
              { 
                if($ver && ['1'])
                {
                   $com = $ver['1'];
                   //$kmh = $ver['2']; // Cuando esta en moviento nos manda el Km
                                  
                   $array []= array(
                    'id' => $row['id'],
                    'user' => $row['nm'],
                    'com' =>$com,
                    'km'=>$row['cnm']
                    //'kmh' => $kmh
                   );             
                }
               }  
              }
               $json1= json_encode($array);  
          }
        }*/

    //$json = '[{"id":"1","nombre":"Jose","edad":"25","genero":"masculino","email":"josegonzales9871@gmail.com","localidad":"Madrid","telefono":"912546524"},{"id":"2","nombre":"Juan","edad":"31","genero":"masculino","email":"juanrodriguez65465@gmail.com","localidad":"Barcelona","telefono":"934654654"},{"id":"3","nombre":"Antonio","edad":"43","genero":"masculino","email":"antoni654654@gmail.com","localidad":"Valencia","telefono":"214748366"},{"id":"4","nombre":"Angelina","edad":"35","genero":"femenino","email":"angelina654456@gmail.com","localidad":"New York","telefono":"247483647"}]';
    $json ='[{"id":"341","user":"C. ROJA SN-75-862","com":"49.5","km":"28140"},
             {"id":302,"user":"C. ROJA SN-75-866","com":"48.5","km":"29569"},
             {"id":"103","user":"TRAILER CASCADIA SN-88-974","com":"220","km":"39760"},
             {"id":"325","user":"TRAILER CASCADIA SN-99-983","com":"120","km":"23585"},
             {"id":"341","user":"C. ROJA SN-75-862","com":"49.5","km":"28140"}]';
    
    $datosclientes = json_decode($json, true);
    
    
    $server = "localhost";
    $user = "root";
    $pass = "1234";
    $bd = "pruebacront";
    
    //Creamos la conexión
    $conexion = mysqli_connect($server, $user, $pass,$bd) 
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");
    
    
    /*foreach ($datosclientes as $cliente) {
            
        mysqli_query($conexion,"INSERT INTO clientes (nombre,edad,genero,email,localidad,telefono) 
        VALUES ('".$cliente['nombre']."',".$cliente['edad'].",'".$cliente['genero']."','".$cliente['email']."','".$cliente['localidad']."',".$cliente['telefono'].")");	
            
    }*/
    
    foreach($datosclientes as $cliente){

            
             $insertar = "INSERT INTO ubiexpress(id_Unidad, Unidad, combustible, km) VALUES ('".$id."','".$cliente['user']."','".$cliente['com']."','".$cliente['km']."')";
           if($insertar = $cliente['id'])
           {
             mysqli_query($conexion, $insertar);
           }
        
        //mysqli_query($conexion, "INSERT INTO ubiexpress(id_Unidad, Unidad, combustible, km) VALUES ('".$cliente['id']."','".$cliente['user']."','".$cliente['com']."', '".$cliente['km']."')");
    }
    
   
    mysqli_close($conexion);
    
   
?>