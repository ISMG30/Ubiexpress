<?php
include('wialon.php');
$wialon_api =new Wialon();
$token = '9184acef7671d237a45f10b8cf35cb44C6A74782B34BE66620F9280CC80D54237ED69E7D';
//$token ='2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
$result = $wialon_api->login($token);
//$result = $wialon_api->login('PROGRAMACION','PRUEBAS12');
//$result = $wialon_api->login($result);
$json = json_decode($result, true);
if(!isset($json['error'])){
  //echo  $json['user']['nm'];
   //echo $userId = $json['user']['id'];
    //echo "<br>$userId<br>"; 
   //echo $result;
 $params= array();
 //echo $wialon_api->core_logout(json_encode($params));
  // echo $wialon_api->core_get_account_data('{"type":1}');
   //echo $wialon_api->core_search_item('{"id":440,"flags": 0x1}');
    
   //echo $json['eid'];
    //print_r($json['user']);
    //echo $wialon_api->core_get_hw_types();
     $params = array(
        'itemId' => '', 
        'id' => '', 
        "callMode" => ''
        );
       //echo $wialon_api->core_create_user(json_encode($params));
       //echo $wialon_api->core_get_hw_types();
       
       /*$params =array(
        'creatorId' => $userId,
        'name' => 'C. ROJA SN-75-866',
        'hwTypeId' =>'165',
        //'password' => '165',
        'dataFlags' => 5,
        'calcTypes' => 'unit'
      );
      //$res=$wialon_api->core_create_resource(json_encode($params));
      // echo $res;
      //$resource =json_decode($result, true);
      //echo $resource;
      //echo $wialon_api->core_create_unit(json_encode($params));
      //echo $wialon_api->get_fuel_settings(json_encode($params));


     $params =array(
           'itemId' => $resource['unit']['id'],
           'app' => '1600563642_162',
           'password' => 'PRUEBAS12',  
           'dataFlags' => 5
         );
      //echo $wialon_api->core_create_user(json_encode($params));
      //echo  $wialon_api->account_create_account(json_encode($params));
      //echo $wialon_api->update_command_definition(json_encode($params));
*/
    /*$params = array(
        'user' => 'PROGRAMACION',
        'itemId' => '',
        'accoessMask' => 0x10
        
        );
      echo $wialon_api->user_update_item_access(json_encode($params));*/


 /*   $params=array(
          'id'=>$userId,
          'flags' => 0x1 | 0x4
        );
       $ver= $wialon_api->core_search_item(json_encode($params));
       
       $res =json_decode($ver, true);
       if(!isset($res['error'])){

       //echo $res['item']['nm'];
       }
       

       $params =array(
         'creatorId' =>$userId,
         'name'=> 'PROGRMACION',
         'password' => 'PRUEBAS12',
         'dataFlasgs' => 5
       );*/
       //echo $wialon_api->core_create_user(json_encode($params));

       // Busca la Unidades que se tiene
       //$Unidad= $_POST['unidad'];
       $params = array(
        'spec' => array(
            'itemsType' => 'avl_unit',
            'propName'=> 'sys_name',
            'propValueMask' => 'C. ROJA SN-75-862',
            'sortType' => 'sys_name'
        ),
        'force' => 1,
        'from' => 0,
        'to'=>0,
        'flags' => 0x00000400
      );
      
      //echo $wialon_api->core_search_items(json_encode($params));

      $params= array(
        'itemId'=>302,

      );
      //echo $wialon_api->unit_get_trip_detector(json_encode($params));
      //echo $resu;
    //  $ejemplo='{"searchSpec":{"itemsType":"avl_unit","propName":"sys_name","propValueMask":"*","sortType":"sys_name","propType":"","or_logic":"0"},"dataFlags":1,"totalItemsCount":7,"indexFrom":0,"indexTo":0,"items":[{"nm":"ADAN_AS","cls":2,"id":425,"mu":0,"uacl":19327369763},{"nm":"C. ROJA SN-75-866","cls":2,"id":302,"mu":0,"uacl":16931},{"nm":"HIDALGUIN","cls":2,"id":145,"mu":0,"uacl":16931},{"nm":"ISUZU 5 TON. SN-75-852","cls":2,"id":141,"mu":0,"uacl":16931},{"nm":"MICA_SU","cls":2,"id":429,"mu":0,"uacl":16931},{"nm":"TORTON AZUL","cls":2,"id":123,"mu":0,"uacl":16931},{"nm":"TRAILER CASCADIA SN-88-974","cls":2,"id":103,"mu":0,"uacl":16931}]}';
       //var_dump(json_decode($ejemplo));
       //$dato= json_decode($ejemplo,true);
       //echo $dato['items']['cls'];
      //echo $dato;
      //
      //$Unidad= $_POST['unidad'];
      $params =array(
        'spec' => array(
            'itemsType' => 'avl_resource',
            'propName'=> 'zones_library',
            'propValueMask' => '*bing*',
            'sortType' => 'zones_library',
            'propType' => 'propitemname'
        ),
        'force' => 1,
        'from' => 0,
        'to'=> 1,
        'flags' =>4097
      );
      
       //echo $wialon_api->core_search_items(json_encode($params));
      
      //$Unidad='C. ROJA SN-75-866';
      $params =array(
         //'nm'=>$Unidad,        
        'id'=> '302',
        'flags'=> 4611686018427387903	
      );
    // echo $wialon_api->core_search_item(json_encode($params));
     
     $params =array(
      //'nm'=>$Unidad,        
     'id'=> '302',
     'sens'=>array(
      'id' => '1',
      'n' => 'COMBUSTIBLE',
      't' => 'fuel level',
      'd' => 'NIVEL COMBUSTIBLE|0:0:20:10:40:20:60:30:80:40:100:50:120:60:140:70:160:80:180:90:200:100',
      'm' => '1',
      'p'=>'adc1',
      'f' => '0',
      'c' =>'',
      'vt' => 0,
      'vs'=> '0',
      'tbl' => array(
         'x' => 0,
         'a' => 0.5,
         'b'=> 0
      )

     )       
   );
  // echo $wialon_api->core_search_item(json_encode($params));
      
      // Datos el Combustible
      $params = array(
        'itemId'=>'302',
        'id'=> '1',
        'callMode' => 'update',
        'unlink' => 0,
        'n' =>'COMBUSTIBLE', 
			  't' => 'fuel level', 
			  'd' => 'NIVEL COMBUSTIBLE', 
			  'm' => 1, 
			  'p' => 'adc1', 
			  'f' => 0, 
			  'c' => array(
          'act'=> 1,
          'appear_in_popup'=> 'true'),
			  'vt' => 0, 
			  'vs'=> 0,
			  'tbl' => array(
              'x' =>0,
              'a' =>0.5,
              'b' =>0
       )
      );
      //echo $wialon_api->unit_update_sensor(json_encode($params));

      $params = array(
        'unitId'=>'302',
        'sensores'=> 1,
        'flags"' => 0x01,
      );
    //echo $wialon_api->unit_calc_last_message(json_encode($params));

      $params = array(
        'id'=>'302',
        'flags' => 0x1 | 0x4
      );
      //echo $wialon_api->core_search_item(json_encode($params));

      $params = array(
        'itemId'=>'302',
        'newValue'=>0x000
        
      );
     // echo $wialon_api->unit_update_mileage_counter(json_encode($params));

      $params = array(
        'itemId'=>'302',
        'newValue'=> 0x000
        
      );
     // echo $wialon_api->unit_update_calc_flags(json_encode($params));

      $params =array(
        'itemId'=> '302',
        //'password'=> 'PRUEBAS12',
        //'operateAs' => 'POR',
        'flags'=>0x02
       );
      //echo $wialon_api->unit_get_fuel_settings(json_encode($params));

      $params= array(
            'itemId'=> '302',	
					  'consSummer' => '8.88',
					  'consWinter'=>'7.88',
					  'winterMonthFrom' => '11',
					  'winterDayFrom' => '20',
					  'winterMonthTo'=>'11',
					  'winterDayTo'=>'20'
      );
      //echo $wialon_api->unit_update_fuel_rates_params(json_encode($params));


        $params =array(
        'itemId'=> '302',
        //'password'=> 'PRUEBAS12',
        //'operateAs' => 'POR',
        'calcTypes' =>0x1
      );
     //echo $wialon_api->unit_update_fuel_calc_types(json_encode($params));

      $params =array(
        'itemId'=> '2',
        'idling' => 2,
        'urban' => 10,
        'suburban'=> 7,
        'loadCoef'=> 0,
      );
     // echo $wialon_api->unit_update_fuel_math_params(json_encode($params)); 

      //contador de kilometraje
      $params =array(
        'itemId'=> '302',
        //'password'=> 'PRUEBAS12',
        //'operateAs' => 'POR',
        'newValue' =>40
      );
      //echo $wialon_api->unit_update_mileage_counter(json_encode($params));

      //Obtener todas las rondas
      $params =array(
        'itemId'=> '302',
        'timeFrom' => 1, 
		     'timeTo'=>  1, 
		    'fullJson' => 1
      );
     // echo $wialon_api->route_get_all_rounds(json_encode($params));

      $params =array(
        'itemId'=> '302',
        'newValue' => 100
      );
      //echo $wialon_api->unit_update_mileage_counter(json_encode($params));

      $params =array(
        'token'=> '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA', 
         //'password' => 'PRUEBAS12',
	    	'operateAs'=>  'PROGRAMACION',
        'fl' => 0x1
      );
      //echo $wialon_api->token_login(json_encode($params));

      $params = array(
            'itemId' => '302',	
            'consSummer'=> 10,
            'consWinter'=> 10,
            'winterMonthFrom'=> 11,
            'winterDayFrom'=> 1,
            'winterMonthTo'=> 1,
            'winterDayTo'=> 29
      );
     //echo $wialon_api->unit_update_fuel_rates_params($params);

     $params = array(
      'itemId' => '302',	
      'flags'=> 7754,
      'ignoreStayTimeout'=> 20,
      'minFillingVolume'=> 20,
      'minTheftTimeout'=> 0,
      'minTheftVolume'=> 10,
      'filterQuality'=> 5,
      'fillingsJoinInterval'=> 300,
      'theftsJoinInterval'=> 300,
      'extraFillingTimeout'=> 200
    );

   //echo $wialon_api->unit_update_fuel_level_params(json_encode($params));

       // RUTAS
       $params =array(
        'itemId' =>'302', 
        'timeFrom' => 8, 
        'timeTo' => 23, 
        'fullJson' =>0 
       );
      //echo $wialon_api->router_get_all_rounds($params);
      
       $params =array(
        'itemId' =>'302', 
        'col' => [20]
       );
     
       //echo $wialon_api->route_get_round_data($params);

       $params = array(
         'street'=>'skryganova',
         'flags'=> 1796,
         'count'=>3,
         'indexFrom'=>0,
         'uid'=>50935
       );
      // echo $wialon_api->routes_git_search(json_encode($params));

       $params=array(
        'userId'=>440,
        'type'=>1,
        'destination'=>'m30g05@gmail.com'
       );
       //echo $wialon_api->user_verify_auth(json_encode($params));

     $params = array(
        'reportResourceId' => 163266,
        'reportTemplateId' => 10,
        'reportObjectId' =>34868,
        'reportObjectSecId' => 0,
        'interval' => array(
            'from' => 1671721201,
            'to' =>1671742801,
            'flags' => 0
        )
     );
     //echo $wialon_api->report_exec_report(json_encode($params));
    $params = array(
      'attachmentIndex' => 1,
      'action' => 0,
      'width' => 600,
      'height' => 300,
      'autoScaleY' => 0,
      'pixelFrom' => 0,
      'pixelTo' =>300,
      'flags' => 513
      
   );
  //echo $wialon_api->report_get_result_chart(json_encode($params));
  $params = array(
    'width' => 700,
    'height'=> 800
  );
  //echo $wialon_api->report_get_result_map(json_encode($params));
  $params =array(
    'attachmentIndex' =>1,
    'width' =>600,
    'useCrop' => 1,
    'cropBegin' =>2,
    'cropEnd'=>3
  );
  //echo $wialon_api->report_render_json(json_encode($params));

  $params = array(
    'format'=> 2,
    'pageOrientation' =>'portrait',
    'pageSize' => 'a4',
    'pageWidth' => 0,
    'coding' => 'utf8',
    'delimiter' => 'comma',
    'headings' => 0,
    'compress' =>0,
    'attachMap' =>0,
    'extendBounds' =>0,
    'hideMapBasis' =>0,
    'outputFileName' => 'Online_report'

  );
 // echo $wialon_api->report_export_result(json_encode($params));


  $params=array(
    
  );
  //echo $wialon_api->report_cleanup_result(json_encode($params));
  //echo $wialon_api-> report_get_report_status(json_encode($params));
  $params = array(
    'itemId'=>302,
    'col' => [10],
    'flags' => 0x00008000
    
  );
  //echo $wialon_api->report_get_report_data(json_encode($params));
  $params = array(
    'tableIndex' => 0,
    'indexFrom' =>0,
    'indexTo' =>0
  );
  //echo $wialon_api->report_get_result_rows(json_encode($params));
  $params = array (
    'reportResourceId'=>163266,
    'reportTemplateId'=>10,
    'reportObjectId'=>34868,
    'reportObjectSecId'=>0,
    'reportObjectIdList'=>0,
    'interval'=> array(
        'from'=>1671721201,
        'to'=>1671742801,
        'flags'=>0
    ),
    'remoteExec'=>0,
    'reportTemplate'=>0
  );
 //echo $wialon_api->report_exec_report(json_encode($params));

 $params= array(
  'id'=>302,
  'flags'=>	 1025
 );
// echo $wialon_api->core_search_item(json_encode($params));
 $params=array(
  'unitId'=>302,
   'sensors'=>0,
   'flags'=>1
 );
 //echo $wialon_api->unit_calc_last_message(json_encode($params));
 
 $params=array(
  'itemId'=>302,			   
  'msgsSource'=>'data messages',
  'timeFrom'=>1672293600,
  'timeTo'=>1672380000
);

  //echo $wialon_api->unit_get_trips(json_encode($params));
  //Ruta de la Unidad por Cordenadas
  $params=array(
  'itemId'=>302,  //Id de la Unidad
  'timeFrom'=>1672293600,  //Fecha y hora de Inicio
  'timeTo'=>1672380000,  //Fecha y hora  final
  'flags'=>0x0000,  // bandera
  'flagsMask'=>0x0000,
  'loadCount'=>0xffffffff 
  );
  $var = $wialon_api->messages_load_interval(json_encode($params));
  $dato= json_decode($var, true);
  if(!isset($dato['error'])){
    $arr =[];
     foreach($dato['messages'] as $row){
      $arr [] = array(
        'y' =>$row['pos']['y'],
        'x' => $row['pos']['x']

      );
    
       //echo json_encode($posicion);
     }
     echo json_encode($arr);

  }

 $params=array(
    'layerName'=>'Unidad',
    'format'=> 'txt',
    'itemId'=>302,
    'timeFrom'=>1672293600,
    'timeTo'=>1672380000,
    'compress'=>0
  );
   // echo $wialon_api->exchange_export_messages(json_encode($params));
//Crear capa de pista km y latitud y longitud https://sdk.wialon.com/wiki/en/local/remoteapi2004/apiref/render/create_messages_layer
    $params=array(
      'layerName'=>'Unidad',
      'itemId'=>123,
      'timeFrom'=>1672380000, //Fecha y hora de Inicio
      'timeTo'=>1672462800,  //Fecha y hora final
      'tripDetector'=>1,
      'trackColor'=>'trip',
      'trackWidth'=>2,
      'arrows'=>0,
      'points'=>1,
      'pointColor'=>'red',
      'annotations'=>0,
      'flags'=>0x0001
    );
      //echo $wialon_api->render_create_messages_layer(json_encode($params));



 $array =array(
   'id'=> 302,
   'user'=>'C. ROJA SN-75-866',
   'km'=>'29001',
   
 );
 $array1 =array(

  'Combustible' => '56',
  'Km/h'=>0
 );
$array2 =array(
  'id'=> 302,
  'user'=>'C. ROJA SN-75-866',
  'km'=>'29001',
  
);
$array3 =array(

 'Combustible' => '56',
 'Km/h'=>0
);
 
$arfinal[] =array(
  $array,
  $array1,
  '3'=>$array2,
  '4'=>$array3,
 
);
$final1=array($array+$array1);
 //$final = array_merge($array, $array1);
//echo json_encode($final1);
 $arr = array('Name' => 'Test', 
            'Age' => 24, 
            'Email' => 'test@gmail.com'); 
$arr1 = array('Name' => 'Test', 
            'Age' => 24, 
            'Email' => 'test@gmail.com'); 
$final=array($arr ,
 $arr1);
//echo json_encode($arfinal)."\n";

                //echo Datetime("y-m-d h:i:s ",$fecha),'<br>';
                 //$fecha1 = new DateTime($fecha);
               // $fecha1->format("Y-m-d H:m:s");
                 //echo $fecha1;
                 
       
                //$timestamp = $date->getTimestamp();
                //$timestamp=strtotime($fechaI);
                //  $timestamp=mktime('12:13:00');
                //echo $timestamp,'<br>';
                // echo strtotime($fechaI); 

$wialon_api->logout();
}else{
    echo WialonError::error($json['error']);
}/*

// old username and password login is deprecated, use token login
$token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
$result = $wialon_api->login($token);
$json = json_decode($result, true);
if(!isset($json['error'])){
    echo $wialon_api->core_search_item('{"id":50935,"flags":0x1}');
    $wialon_api->logout();
} else {
    echo WialonError::error($json['error']);


}*/

?>