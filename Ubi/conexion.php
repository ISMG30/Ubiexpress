<?php

class Conexion {
    static function ConectarDB()
    {
        try{
            require "Globla.php";
            $cnx = new PDO(DSN,USERNAME,PASSWORD);
            
            return $cnx;
        }catch(PDOException $ex){
            die($ex->getMessage());
        }
    }


}
?>