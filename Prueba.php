<?php

include_once 'wialon.php';

    

class Prueba {
   
   
     var $token ='9184acef7671d237a45f10b8cf35cb44C6A74782B34BE66620F9280CC80D54237ED69E7D';
     //var $token ='2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
    
   function __construct()
    {
        //$this -> wialon_api = new Wialon();     
    }

    function login()
    {
        $wialon_api = new Wialon();
        $result = $wialon_api->login($this->token);
        $json = json_decode($result, true);
        if(!isset($json['error']))
        {
            //echo 'Hello,'. $json['user']['nm'];
            $user = $json['user']['nm'];
            $userId = $json['user']['id'];
            //echo "<br>$userId<br>";
            if($user){
                echo json_encode($user);
            }else{
                echo "error";
            }  
        }
    }

    function Usuarios($unidad)
    {
        $wialon_api = new Wialon();
        $result = $wialon_api->login($this->token);
        $json = json_decode($result, true);
        if(!isset($json['error']))
        {    
            $params = array(
                'spec' => array(
                    'itemsType' => 'avl_unit',
                    'propName'=> 'sys_name',
                    'propValueMask' => '*',
                    'sortType' => 'sys_name'
                ),
                'force' => 1,
                'from' => 0,
                'to'=>0,
                'flags' => 0x1
              );  
              //echo $wialon_api->core_search_items(json_encode($params));
              $dato = $wialon_api->core_search_items(json_encode($params));
              $dato1 =json_decode($dato, true);
              if(!isset($dato1['error'])){
              //echo  $dato1 ['searchSpec']['propValueMask'];
              //  echo $dato1['items']['0']['nm'];
                /*$param =array (
                  $dato1['items']
                );*/
                 $array=[];
                foreach($dato1['items'] as $user){
                          //$user1 = $user['items'];
                          $user1 = $user['nm'];
                         
                          $array = array(
                             'user'=>$user1
                          );
                          
                          
                }
                echo json_encode($array);
                /*$logitud=count($param);
                for($i=0; $i<$logitud['0']; $i++){
                  echo $param[$i]; 
                  echo '<br>';
                }*/
               //echo json_encode($dato1['items']['0']['nm']);
               

            
              } 
        }
    }
     
     function NUnidad($unidad)
     {
        $wialon_api = new Wialon();
        $result = $wialon_api->login($this->token);
        $json = json_decode($result, true);
        if(!isset($json['error']))
        { 
             $params = array(
                'spec' => array(
                    'itemsType' => 'avl_unit',
                    'propName'=> 'sys_name',
                    'propValueMask' => $unidad,
                    'sortType' => 'sys_name'
                ),
                'force' => 1,
                'from' => 0,
                'to'=>0,
                'flags' => 0x1
              );
              //echo $wialon_api->core_search_items(json_encode($params));
              $dato = $wialon_api->core_search_items(json_encode($params));
              $dato1 =json_decode($dato, true);
              if(!isset($dato1['error'])){
                //echo  $dato1 ['searchSpec']['propValueMask'];
                //echo $dato1['items']['0']['nm'] ,'/n';
                $id = $dato1['items']['0']['id'];
              } 
           
        $params =array(        
            'id'  => $id,
           'flags'=> 	4611686018427387903
         );
        $dato = $wialon_api->core_search_item(json_encode($params));
        
         $dato1 =json_decode($dato, true);
         if(!isset($dato1['error'])){

           $com = array($dato1['item']['sens']['1']['c']);
           $var =  $dato1['item']['nm'];
           
            if( $var && $com)
           {
           //echo  $dato1['item']['sens']['1']['c'];
           echo $dato1 ['item']['cnm'];
          // $res = $dato1['item']['id'];
           } else{
             echo "No se Encontro";
           }
         }
        // echo $wialon_api->core_search_item(json_encode($params));*/
         
        }
     }
     


     function Combustible()
     {
        $wialon_api = new Wialon();
        $result = $wialon_api -> login($this->token);
        $json =json_decode($result, true);
        if(!isset($json['error']))
        {
          // Busrcar articulos  por propiedad
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
               
              //Valores  de los sensores del último mensaje 
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
                   $kmh = $ver['2'];
                                  
                   $array []= array(
                    'id' => $row['id'],
                    'user' => $row['nm'],
                    'com' =>$com,
                    'kmh' => $kmh
                   );             
                }
               }  
              }
                echo json_encode($array);  
          }
        }
      }
    
      
     function  KmRecorido($fechaI, $fechaF)
     {
        $fecha  = date_create($fechaI);    
        $fecha1 = date_timestamp_get($fecha)+21600;
        $fecha2 = date_create($fechaF);
        $fecha3 = date_timestamp_get($fecha2)+64800;
        $wialon_api = new Wialon();
        $result = $wialon_api -> login($this->token);
        $json =json_decode($result, true);
        if(!isset($json['error']))
        {
          $params = array(
            'spec' => array(
                'itemsType' => 'avl_unit',
                'propName'=> 'sys_name',
                'propValueMask' =>'*',
                'sortType' => 'sys_name'
            ),
            'force' => 1,
            'from' => 0,
            'to'=>0,
            'flags' => 4611686018427387903
          );    
          $dato=$wialon_api->core_search_items(json_encode($params)); //Se usa el comando  core/search_items
          $resul = json_decode($dato, true);
          if(!isset($resul['error'])){
           
            $array = [];
            foreach($resul['items'] as $row)
            {
                $id = $row['id'];
        
                $params=array(
                  'layerName'=>'Unidad',       //Nombre  de la capa
                  'itemId'=>$id,               //Id de la unidad  cuyo mensajes se solicitaran
                  'timeFrom'=>$fecha1,         //Comienzo del intervalo
                  'timeTo'=>$fecha3,           //Final del intervalo
                  'tripDetector'=>1,           //Usa detector del viaje 0 = no, 1 = si 
                  'trackColor'=>'trip',        //Color de la Pista en formato ARGB
                  'trackWidth'=>2,             //Anchura de la línea de seguimiento en píxeles
                  'arrows'=>0,                 //Mostrar el curso de las flechas de movimiento: 0 - no, 1 - sí 
                  'points'=>1,                 //Mostrar puntos en lugares donde se recibieron mensajes: 0 - no, 1 - sí
                  'pointColor'=>'red',         //Puntos de color
                  'annotations'=>0,            //Mostrar anotaciones para puntos: 0 - no, 1 - sí
                  'flags'=>0x0001              //Mostrar marcadores banderas
                );
            $dato = $wialon_api->render_create_messages_layer(json_encode($params)); //Se usa el comando render/create_messages_layer
            $kmr = json_decode($dato, true);
              if(!isset($kmr['error']))
              {  
                 
                   $km = $kmr['units']['0']['mileage'];
                   $kmf =($km/1000);

                   $array [] = array(
                      'id' => $row['id'],
                      'user' => $row['nm'],
                      'km' => $kmf
                   );
              }
            }
                echo json_encode($array);
          }
        }
      }
     

     function  Posicion1($user, $fechaI, $fechaF)
     {
        $fecha  = date_create($fechaI);    
        $fecha1 = date_timestamp_get($fecha)+21600;
        $fecha2 = date_create($fechaF);
        $fecha3 = date_timestamp_get($fecha2)+64800;
        $wialon_api = new Wialon();
        $result = $wialon_api -> login($this->token);
        $json =json_decode($result, true);
        if(!isset($json['error']))
        {
          $params = array(
            'spec' => array(
                'itemsType' => 'avl_unit',
                'propName'=> 'sys_name',
                'propValueMask' =>$user,
                'sortType' => 'sys_name'
            ),
            'force' => 1,
            'from' => 0,
            'to'=>0,
            'flags' => 4611686018427387903
          );    
          $dato=$wialon_api->core_search_items(json_encode($params));
          $resul = json_decode($dato, true);
          if(!isset($resul['error'])){
              $array = [];
              foreach($resul['items'] as $row)
            {
                  $id = $row['id'];

                 $params=array(
                  'itemId'=>$id,            //Id de unidad o recurso
                  'timeFrom'=>$fecha1,      //Comienzo de intervalo, fecha en unix
                  'timeTo'=>$fecha3,        //Final de intervalo, fecha en unix
                  'flags'=>0x0000,          //Bandera para cargar mensajes
                  'flagsMask'=>0x0000,      //Mascara
                  'loadCount'=>0xffffffff   //Cuántos mensajes devolver
                );
            $dato = $wialon_api->messages_load_interval(json_encode($params)); //Se usa el comando messages/load_interval
            $posicion = json_decode($dato, true);
              if(!isset($posicion['error']))
                {  
              
                 foreach($posicion['messages'] as $rows)
                 {
                    $posicionY = $rows['pos']['y'];
                    $posicionX = $rows['pos']['x'];
                    $array [] = array(
                      'id' => $row['id'],
                      'user' => $row['nm'],
                      'PosicionY' => $posicionY,
                      'PosicionX' => $posicionX
                     );
                  }
                  
                } 
              }  
                 echo json_encode($array);
          }
        }
      }     
}
?>