<?php

include_once 'wialon.php';

class Prueba {
   
   


   function __construct()
    {
       $this -> wialon_api = new Wialon();
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

           $com = $dato1['item']['sens']['1']['c'];
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
     


     function Combustible($unidad)
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
          $dato1 =json_decode($dato, true);
          if(!isset($dato1['error'])){
            $var = $dato1['items'];

           for($i=0; $i<count($var); $i++)
            {  
                $id=$dato1['items'][$i]['id'];
                $user = $dato1['items'][$i]['nm'];
                $km = $dato1['items'][$i]['cnm'];    
             
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
                   $comb = $ver['1']; // Combustible 
                   $kmt=  $ver['2']; //kilometraje 
                 }
                
                 $usuario = array(
                  'id' => $id,
                  'user'=> $user,
                  'km' => $km,
                  'Combustible' => $comb,
                  'Km Tiempo' => $kmt
                  );
                  echo json_encode($usuario); 
             }
           }      
             
          }
        }
       
      }

     function Combustibleo($unidad)
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
                'propValueMask' => '*',
                'sortType' => 'sys_name'
            ),
            'force' => 1,
            'from' => 0,
            'to'=>0,
            'flags' => 4611686018427387903
          );     
          echo $wialon_api->core_search_items(json_encode($params));
          $dato=$wialon_api->core_search_items(json_encode($params));
          $dato1 =json_decode($dato, true);
          if(!isset($dato1['error'])){
            //echo  $dato1 ['searchSpec']['propValueMask'];
            $var = $dato1['items'];
           
            $id=$dato1['items']['0']['id'];
            $user= $dato1['items']['0']['nm']; //Unidades
            $Km=$dato1['items']['0']['cnm']; //Kilometraje 
            
            
            $params = array(
                'unitId'=> $id,
                'sensores'=> 1,
                'flags' => 0x01
              );
             $dato = $wialon_api->unit_calc_last_message(json_encode($params));
             $ver = json_decode($dato, true);
             if(!isset($ver['error'])){
               
              
                $comb = $ver['1']; // Combustible 
                $kmt=  $ver['2']; //kilometraje
              
             }   
             
             $dato = array(
                'id'=> $id,
                'Unidad' => $user,
                'Kilometraje' =>$Km,
                'Combustible' => $comb,
                'Km Tiempo'=> $kmt
             );
             echo json_encode($dato);
            }
            
        }
     }
}
?>