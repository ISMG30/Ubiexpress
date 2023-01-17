<?php
  include_once 'conectar.php';
  require "conexion.php";
class Inser{
    public $cnx;
    public $prueba;

  function __construct(){
    $this->cnx = Conexion::ConectarDB();
   
  }

  function Inserter()
  {
    $sql="INSERT INTO ubiexpress(id_Unidad, Unidad, combustible, km) VALUES ('302', 'C. Rojo SN-52-235', '85.23','236535')";
    $resu = $this ->cnx->prepare($sql);
    $resu -> execute();
    if($resu)
    {
        echo "Registro";
    }else{
        echo "Error";
    }
  }
}
?>