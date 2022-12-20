<?php


class Peticion
{
  public $urlApi;

  function __construct()
  {
    //$this->urlApi = "http://169.254.16.249/hidalgoapi/production/Panel.php";
    //$this->urlApi = "http://hidalgo.no-ip.info:5610/hidalgoapi/production/Panel.php";
    $this ->urlApi = "http://localhost/Ubiexpress/Respuesta.php";
   }

  //Consultar Todas las Venta del Dia
  function consultarVentasDia($unidad)
  {
    $ch = curl_init();
    $post = [
      'opcion' => '2',
      'fecha' => $unidad
    ];
    $url = $this->urlApi;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    $json = json_decode($response, true);
    return $json;
    echo $json;
  }
  
}

?>