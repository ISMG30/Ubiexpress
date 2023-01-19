<?php
 require ("fpdf182/fpdf.php");
 require ("conectar.php");  //Conexion de la base de datos

 class PDFGA extends FPDF
 {
    function Header(){

    $this->SetFont("Arial", "", 14);
    //$this->Image("../imagenes/descarga.png", 1, 1); Se pone una imagen del logo 
    $this->Cell(7);
    $this->Cell(13, 7, utf8_decode("Titulo del documento"));
    }

    function Body()
    {
        $my = conectObj();
        $sql ="SELECT
        TC.nombre as combustible, E.litros, E.totalCosto as costo, round((E.totalCosto / E.litros),2) as costol, E.fecha
        FROM entradas_combustible as E INNER JOIN tipo_combustible as TC 
        ON E.tipo_combustible = TC.id_tipo_com
        WHERE E.id_unidad = ? 
        AND E.fecha = ?";
        $stm = $my->prepare($sql);
        $stm->execute();
        $stm->bind_result($id);
        $stm->store_result();
        $hay = $stm->num_rows;
        if($hay == 0 )
        {
            $this ->Cell(-21, 10, "No hay registro que mostrar", 0, 'C');
        
        }else{
            $this ->SetFont("Arial", 'B', 10);
            $this ->Ln();
            $this ->SetTextColor(62, 72, 204);
            $this ->Cell(2, 1, "" , 1, 0, 'C');
            $this ->Cell(3,1, "",1,0,'C');
            $this ->Cell(8,1, "", 1, 0, 'C');
            $this ->Cell(4,1, "", 1, 0, 'C');
            $this ->Cell(3,1, "", 1, 1, 'C');
            $this ->SetFont("Arial", '', 14);
            $this ->SetTextColor(0,0,0);
            while($stm ->fetch()){
                $id = utf8_decode($id);
                $this ->Cell(10, 1, '', 0, 1, 'C');
                $this ->Cell(2, 1, '', 1, 0, 'C');
                $this ->Cell(3, 1, '', 1, 0, 'C');
                $this ->Cell(8, 1, '', 1, 0, 'C');
                $this ->Cell(4, 1, '', 1, 0, 'C');
                $this ->Cell(3, 1, '', 1, 1, 'C');
            }
        }
        $stm ->close();
    }
    function Footer()
    {
        $this->SetY(-2);
        $this->SetFont("Arial",'I',10);
        $this->Cell(0, 1, "Combustible", 0, 0, 'C');
    }

 }
?>