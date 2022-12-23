<?php
include('wialon.php');
$wialon_api =new Wialon();
$token = '2f0a8929ad515bb67157ead976434d583BCAEAF887B0551E3F8C07590A59533902946CAA';
$result = $wialon_api->login($token);
//$result = $wialon_api->login($result);
$json = json_decode($result, true);
if(!isset($json['error'])){

    $userId = $json['user']['id'];

    $params =array( 
        'type'=>'unit',
        'flags' => 1
    );
    //echo  $wialon_api->token_list(json_encode($params));
    echo $wialon_api->file_library(json_encode($params));
   // $result= $wialon_api->core_create_user(json_encode ($params));
    //echo $result;

    $wialon_api->logout();
}else{
    echo WialonError::error($json['error']);
}
?>