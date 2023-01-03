<?php

include_once 'wialon.php';

class Prueba {

   function __construct()
    {
       //$this -> wialon_api = new Wialon();
      
    }

    function login()
    {
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api->login($token);
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
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api->login($token);
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
                $param =array (
                  $dato1['items']
                );
                
                $logitud=count($param);
                for($i=0; $i<$logitud['0']; $i++){
                  echo $param[$i]; 
                  echo '<br>';
                }
                
               // echo $dato1['items']['0']['id'];
              
              } 
              
              
        }
     }
     
     function NUnidad($unidad)
     {
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api->login($token);
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
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api -> login($token);
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
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 = json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
             {  
                $id = $dato1['items'][$i]['id'];
                //$id = $dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
                $km = $dato1['items'][$i]['cnm'];

                /*$unidad = array(
                  'id' => $dato1['items'][$i]['id'],
                  'user'=> $dato1['items'][$i]['nm'],
                  'km'=> $dato1['items'][$i]['nm']
                 );*/

               $params = array(
                'unitId'=> $id,
                'sensores'=> 1,
                'flags' => 0x01
                ); 
              $dato = $wialon_api->unit_calc_last_message(json_encode($params));
              $ver = json_decode($dato, true);
              if(!isset($ver['error']))
              { 
               
                if( $ver && ['1'])
                 {

                  /*$sensor =array(
                    'com'=> $ver['1'],
                    'kmh'=> $ver['2']
                  );*/

                   $comb = $ver['1']; // Combustible 
                   $kmh =  $ver['2']; // kilometraje 

                 $usuario= array(
                  'id' => $id,
                  'usuario' =>$user,
                  'km'=> $km,
                  'Combustible' => $comb,
                  'Km/h Tiempo' => $kmh
                  );
                 
                  //$final1 = array_diff($unidad,$sensor);

                  /*echo json_encode( array(
                    'id' => $dato1['items'][$i]['id'],
                    'user'=> $dato1['items'][$i]['nm'],
                    'km'=> $dato1['items'][$i]['cnm'],
                    'com'=> $ver['1'],
                    'kmh'=> $ver['2']
                  ));*/
                  //$final1=array($unidad+$sensor);
                  
                  echo json_encode($usuario );
                   // echo json_encode($usuario,JSON_UNESCAPED_SLASHES);  
              }
            }  
          }
        }
      }
    }
      
     function  KmRecorido($fechaI, $fechaF)
     {
        $fecha = date_create($fechaI);    
        $fecha1= date_timestamp_get($fecha)+21600;
        $fecha2 = date_create($fechaF);
        $fecha3 = date_timestamp_get($fecha2)+64800;
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api -> login($token);
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
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 = json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
            {  
                $id = $dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
             
                $params=array(
                  'layerName'=>'Unidad',
                  'itemId'=>$id,
                  'timeFrom'=>$fecha1, //Fecha y hora de Inicio
                  'timeTo'=>$fecha3,  //Fecha y hora final
                  'tripDetector'=>1,
                  'trackColor'=>'trip',
                  'trackWidth'=>2,
                  'arrows'=>0,
                  'points'=>1,
                  'pointColor'=>'red',
                  'annotations'=>0,
                  'flags'=>0x0001
                );
              
            $dato = $wialon_api->render_create_messages_layer(json_encode($params));
            $kmr = json_decode($dato, true);
              if(!isset($kmr['error']))
              {  
                   $km = $kmr['units']['0']['mileage'];
                   $kmf =($km/1000);

                   
                   $array =array(
                     'id' => $id, 
                     'unidad' => $user,  
                     'km' => $kmf 
                   );
                    
                   $array1 = [];
                   $array1 = array(
                    'id' => $id,
                    'unidad' => $user,
                    'km' => $kmf
                   );
                   echo json_encode($array1);
                   //https://appdividend.com/2022/01/26/php-json_encode/
                   
                  
              }
            }
          }
        }
     }
   /*  function  KmRecorido($fechaI, $fechaF)
     {
        $fecha = date_create($fechaI);    
        $fecha1= date_timestamp_get($fecha)+21600;
        $fecha2 = date_create($fechaF);
        $fecha3 = date_timestamp_get($fecha2)+64800;
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api -> login($token);
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
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 = json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
            {  
                $id = $dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
                
                $params=array(
                  'layerName'=>'Unidad',
                  'itemId'=>$id,
                  'timeFrom'=>$fecha1, //Fecha y hora de Inicio
                  'timeTo'=>$fecha3,  //Fecha y hora final
                  'tripDetector'=>1,
                  'trackColor'=>'trip',
                  'trackWidth'=>2,
                  'arrows'=>0,
                  'points'=>1,
                  'pointColor'=>'red',
                  'annotations'=>0,
                  'flags'=>0x0001
                );
            $dato = $wialon_api->render_create_messages_layer(json_encode($params));
            $kmr = json_decode($dato, true);
              if(!isset($kmr['error']))
              {  
                   $km = $kmr['units']['0']['mileage'];
                   $kmf =($km/1000);

                   
                   $array =array(
                     'id' => $id, 
                     'unidad' => $user,  
                     'km' => $kmf 
                   );
                 

                   echo json_encode($array);
         
                  
              }
            } 
                
          }
        }
     }*/
     function  Posicion1()
     {
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api -> login($token);
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
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 = json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
            {  
                $id = $dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
                $km = $dato1['items'][$i]['cnm'];

               /* $unidad = array(
                  'id' => $dato1['items'][$i]['id'],
                  'user'=> $dato1['items'][$i]['nm'],
                  'km'=> $dato1['items'][$i]['nm']
                 );*/
                }
                 $params=array(
                  'itemId'=>302,  //Id de la Unidad
                  'timeFrom'=>1672293600,  //Fecha y hora de Inicio
                  'timeTo'=>1672380000,  //Fecha y hora  final
                  'flags'=>0x0000,  // bandera
                  'flagsMask'=>0x0000,
                  'loadCount'=>0xffffffff 
                );
                //echo $wialon_api->messages_load_interval(json_encode($params));
            $dato = $wialon_api->messages_load_interval(json_encode($params));
            $posicion = json_decode($dato, true);
              if(!isset($posicion['error']))
              {  
                //echo $posicion['messages']['0']['pos']['y'];
               // $posiciony = $var['messages'] ['0']['pos']['y'];
                //$posicionx = $var['messages']['0']['pos']['x'];
                /*$posiciony1 = $var['messages']['1']['pos']['y'];
                $posicionx1 = $var['messages']['1']['pos']['x'];
                $posiciony2 = $var['messages']['2']['pos']['y'];
                $posicionx2 = $var['messages']['2']['pos']['x'];
                $posiciony3 = $var['messages']['3']['pos']['y'];
                $posicionx3 = $var['messages']['3']['pos']['x'];*/

                 
                 for($i=0; $i<count($posicion);$i++)
                 {
                   $y = $posicion['messages'][$i]['pos']['y'];
                   $x = $posicion['messages'][$i]['pos']['x'];
                   echo 'y ', $y,', x ', $x, '<br>';
                 }              
              } 
            }  
                //echo Datetime("y-m-d h:i:s ",$fecha),'<br>';
                // $fecha1 = new DateTime($fecha);
                //$fecha1->format("Y-m-d H:m:s");
                // echo $fecha1;
                // echo strtotime("29-12-2022" ,"23-00-00"); 
                //$timestamp = $date->getTimestamp();
                //$timestamp=strtotime($fechaI);
                //  $timestamp=mktime('12:13:00');
                //echo $timestamp,'<br>';
                // echo strtotime($fechaI); 
            
          }
        }
     //}

     
     function Combustibleo()
     {
        $wialon_api = new Wialon();
        $token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
        $result = $wialon_api -> login($token);
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
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 = json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
             {  
                $id = $dato1['items'][$i]['id'];
                //$id = $dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
                $km = $dato1['items'][$i]['cnm'];
                
                $unidad = array(
                  'id' => $dato1['items'][$i]['id'],
                  'user'=> $dato1['items'][$i]['nm'],
                  'km'=> $dato1['items'][$i]['nm']
                 );
                 //echo json_encode($unidad);
             
               $params = array(
                'unitId'=> $id,
                'sensores'=> 1,
                'flags' => 0x01
                ); 
              $dato = $wialon_api->unit_calc_last_message(json_encode($params));
              $ver = json_decode($dato, true);
              if(!isset($ver['error']))
              { 
               
                if( $ver && ['1'])
                 {

                  $sensor =array(
                    'com'=> $ver['1'],
                    'kmh'=> $ver['2']
                  );

                   $comb = $ver['1']; // Combustible 
                   $kmh =  $ver['2']; // kilometraje 

                 $usuario= array(
                  'id' => $id,
                  'usuario' =>$user,
                  'km'=> $km,
                  'Combustible' => $comb,
                  'Km/h Tiempo' => $kmh
                  );
                 
                  //$final1 = array_diff($unidad,$sensor);

                  /*echo json_encode( array(
                    'id' => $dato1['items'][$i]['id'],
                    'user'=> $dato1['items'][$i]['nm'],
                    'km'=> $dato1['items'][$i]['cnm'],
                    'com'=> $ver['1'],
                    'kmh'=> $ver['2']
                  ));*/
                  $final1=[];
                  $final1 =array($usuario+$sensor);
                  
                  echo json_encode($final1 );
                  
                   // echo json_encode($usuario,JSON_UNESCAPED_SLASHES);  
              }
            }  
          }
        }
      }
    }
     
}
?>