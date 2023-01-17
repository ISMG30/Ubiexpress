<?php
require ("fpdf182/fpdf.php"); 
require ("conectar.php");
class PDF extends FPDF{
    function Header()
    {
        $this->SetFont("Arial", "", 14);
        $this->Image("../imagenes/descarga.png", 1, 1);
        $this->Cell(7);
        $this->Cell(13, 7, utf8_decode("Titulo del documento"));
    }
    function Body()
    {
        $my = conectObj();
        $sql = "select id, id_Unidad, Unidad, combustible, km from ubiexpress order by id";
        $stm = $my->prepare($sql);
        $stm->execute();
        $stm ->bind_result($id,$Id_Usuario, $Unidad, $Combustible, $km);
        $stm ->store_result();
        $hay = $stm->num_rows;
        if($hay == 0){
            $this -> Cell(-21, 10, "No hay registro que mostrar", 0, 1, 'C');
        }else{
            $this ->SetFont("Arial", 'B',10);
            $this ->Ln();
            $this ->SetTextColor(62, 72, 204);
            $this ->Cell(2,1,"Id", 1, 0, 'C');
            $this ->Cell(3,1,"Id_Usuario", 1, 0, 'C');
            $this ->Cell(8,1,"Unidad", 1, 0, 'C');
            $this ->Cell(4,1,"Combustible", 1, 0, 'C');
            $this ->Cell(3,1,"KM", 1, 1, 'C');
            $this->SetFont("Arial", '', 14);
            $this->SetTextColor(0, 0, 0);
            while($stm->fetch()){
                $id = utf8_decode($id);
                $this->Cell(10,1, "",0,1, 'C');
                $this->Cell(2,1,$id, 1, 0, 'C');
                $this->Cell(3,1,$Id_Usuario, 1, 0, 'C');
                $this->Cell(8,1,$Unidad, 1, 0, 'C');
                $this->Cell(4,1,$Combustible, 1,0,'C');
                $this->Cell(3,1,$km, 1, 1, 'C');
            }
        }
        $stm ->close();
    }
    function Footer()
    {
        $this->SetY(-2);
        $this->SetFont("Arial",'I',10);
        $this->Cell(0, 1, "Como generar archivos PDF con PHP", 0, 0,'C');
    }

}
    $pdf =new PDF('P', 'cm', 'letter');
    $pdf->SetAuthor("Ubiexpress", true);
    $pdf->SetTitle("Documetos PDF de prueba", true);
    $pdf->AddPage();
    $pdf->Body();
    $pdf->Output();
    $pdf->Output("Documento Final1.pdf", 'F');
    if(!isset($_POST['Descargar']))
    {
        $file = 'Documento Final1.pdf';
        if(is_file($file)){
            $filename = "Informe.pdf";
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            readfile($file);
        }else{
            die("Error: no se encontro el archivo '$file'");
        }
    }
?>