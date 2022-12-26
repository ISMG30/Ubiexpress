<?php
include('wialon.php');
$wialon_api =new Wialon();
$token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
$result = $wialon_api->login($token);
//$result = $wialon_api->login($result);
$json = json_decode($result, true);
if(!isset($json['error'])){
    //echo $result;
    $userId = $json['user']['id'];

    $params =array( 
        'token'=> '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA',
        
    );
  //echo $wialon_api->account_get_account_data(json_encode($params));
    $params =array( 
        'type'=>'unit',
        'flags' => 1
    );
    //echo  $wialon_api->token_list(json_encode($params));
    //echo $wialon_api->file_library(json_encode($params));
   // $result= $wialon_api->core_create_user(json_encode ($params));
    //echo $result;
    
    // Inicio de Session
    $params = array(
        'user'=>'PROGRAMACION',
        'password' => 'PRUEBAS12'
        
    );

   //echo $wialon_api->core_login(json_encode($params));

 $params= array(
      'flags'=>0x10
 );

  //echo $wialon_api->report_cleanup_result(json_encode($params));
  //echo $wialon_api->report_get_report_tables(json_encode($params));
  $params = array (
    'reportResourceId'=>163266,
    'reportTemplateId'=>10,
    'reportObjectId'=>'302',
    'reportObjectSecId'=>0,
    'reportObjectIdList'=>0,
    'interval'=> array(
        'from'=>1671807639,
        'to'=>1671858039,
        'flags'=>0x01
    ),
    'remoteExec'=>0,
    'reportTemplate'=>0
  );
  //echo $wialon_api->report_exec_report(json_encode($params));

  $params=array(
    'itemId'=>302,			   
    'msgsSource'=>'message loader used',        
    //'timeFrom'=>0,
    'timeTo'=>0
  );
  //echo $wialon_api->unit_get_trips(json_encode($params));
 $params = array(
    'itemId'=> '302',
    'col' => array(
        'id'=> 1
    ),
    'flags'=>0x4
 );
 //echo $wialon_api->report_get_report_data(json_encode($params));
 $params = array(
    'itemId'=> '440',
    'conl' => [0]
 );
 //echo $wialon_api->report_get_report_data(json_encode($params)); 
 //echo $wialon_api->route_update_config(json_encode($params));
$params =array(
    'itemId' => '302'
);
//echo $wialon_api->unit_get_report_settings(json_encode($params));
$params = array(
    'format'=> 2,
    'pageOrientation' =>'portrait',
    'pageSize' => 'a4',
    'pageWidth' => 0,
    'coding' => 'utf8',
    'delimiter' => 'comma',
    'headings' => 1,
    'compress' =>0,
    'attachMap' =>0,
    'extendBounds' =>0,
    'hideMapBasis' =>0,
    'outputFileName' => 'Online_report'

  );
  echo $wialon_api->report_export_result(json_encode($params));

    $wialon_api->logout();
}else{
    echo WialonError::error($json['error']);
}
?>