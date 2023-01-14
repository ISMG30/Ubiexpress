<?php

include_once 'wialon.php';

class Prueba {
  
  

   //var $token ='2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
   //var $token ='2f0a8929ad515bb67157ead976434d5832024D2B6FDD58B2372D512352E484120DED7575';
   
    
   function __construct()
    {
        //$this -> wialon_api = new Wialon();     
    }


    function Unidades()
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
              $resul =json_decode($dato, true);
              if(!isset($resul['error']))
              {
                $array=[];
                foreach($resul['items'] as $row)
                {
                   //$user1 = $user['items'];
                   $array []= array(
                      'id' => $row['id'],
                      'user'=>$row['nm']
                   );             
                }
                echo json_encode($array);           
              } 
        }
     }
     
    function CombustibleKmtotal()
     {
        $wialon_api = new Wialon();
        $result = $wialon_api -> login($this->token);
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
                //echo json_encode($array); 
                $resulf = json_encode($array);
                return $resulf; 
          }
        }
      }
    
      
     function  KmRecorido($fechaI, $fechaF, $unidad)
     {
       $fe= strtotime($fechaI);
       $fechaIn = $fe+25200;              
       $fef=strtotime($fechaF);
       $fechafi = $fef+25200;
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
                //Crear capa de pista          https://sdk.wialon.com/wiki/en/local/remoteapi2104/apiref/render/create_messages_layer
                $params=array(
                  'layerName'=>'Unidad',       //Nombre  de la capa
                  'itemId'=>$id,               //Id de la unidad  cuyo mensajes se solicitaran
                  'timeFrom'=>$fechaIn,         //Comienzo del intervalo
                  'timeTo'=>$fechafi,           //Final del intervalo
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

        $fe= strtotime($fechaI);
        $fechaIn = $fe+25200;
        $fef=strtotime($fechaF);
        $fechafi = $fef+25200;
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
                  'timeFrom'=>$fechaIn,      //Comienzo de intervalo, fecha en unix
                  'timeTo'=>$fechafi,        //Final de intervalo, fecha en unix
                  'flags'=>0x0000,          //Bandera para cargar mensajes
                  'flagsMask'=>0x0000,      //Mascara
                  'loadCount'=>0xffffffff   //Cuántos mensajes devolver
                );
            $dato = $wialon_api->messages_load_interval(json_encode($params)); //Se usa el comando messages/load_interval
            $posicion = json_decode($dato, true);
              if(!isset($posicion['error']))
                {  
              
                 foreach($posicion['messages'] as $rows)
                 {  $unixf = $rows['t']-25200; 
                    $unix = date('d-m-y H:i:S', $unixf);
                    $posicionY = $rows['pos']['y'];
                    $posicionX = $rows['pos']['x'];
                    $array [] = array(
                      
                      'id' => $row['id'],
                      'user' => $row['nm'],
                      'fechaunix' =>$rows['t'],
                      'fecha' => $unix,
                      'PosicionY' => $posicionY,
                      'PosicionX' => $posicionX
                     );
                  }
                  
                } 
              }  
                header('Content-Type: Rutas.js'); 
                echo json_encode($array);     
          }
        }
      }     
      function Coordenadas()
      {
               $data[] = array(
                "id" => "1",
                "unidad" => "hidalguin",
                "posicionY"=>18.457885011,
                "posicionX"=>-97.3794599851
               );
               $data[] = array(
                "id" => "1",
                "unidad" => "hidalguin",
                "posicionY"=>18.4578666687,
                "posicionX"=>-97.3796066602
               );
               
               $result = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
               );
               
               $resul1=$data+$data;
    
            header('Content-Type: Rutas.js');
               echo json_encode($resul1);
               $coo=json_encode($resul1);
               return $coo;
            
      }
}

 
?>