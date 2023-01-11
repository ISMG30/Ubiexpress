<?php
 class connection extends mysqli{
    private $host = "localhost", $username ="root", $password="1234", $dbname="pruebacront";
    public $con;

    function __construct()
    {
        $this -> con =$this->connect($this->host, $this->username, $this->password, $this->dbname);
    }
 }
?>