<?php
    require("fpdf182/fpdf.php");
    require("conectar.php");
    class PDF extends FPDF{
        function Header(){
            $this->SetFont("Arial", "", 24);
            $this->Image("somelogo.png", 1, 1);
            $this->Cell(9);
            $this->Cell(10, 2, utf8_decode("Título del documento"), 1, 1, 'C');
        }
        function Body(){
            $my = conectObj();
            $sql = "select id, id_Usuario, Unidad, combustible, km from ubiexpress";
            $stm = $my->prepare($sql);
            $stm->execute();
            $stm->bind_result($id, $Unidad, $Combustible, $km);
            $stm->store_result();
            $hay = $stm->num_rows;
            if($hay==0){
                $this->Cell(10, 3, "No hay registros que mostrar", 1, 1, 'C');
            }else{
                $this->SetFont("Arial", 'B', 14);
                $this->Ln();
                $this->SetTextColor(62, 72, 204);
                $this ->Cell(7,1,"ID", 1, 0, 'C');
                $this ->Cell(3,1,"Id_Usuario", 1, 0, 'C');
                $this ->Cell(2,1,"Unidad", 1, 0, 'C');
                $this ->Cell(7,1,"Combustible", 1, 0, 'C');
                $this ->Cell(7,1,"KM", 1, 0, 'C');
                $this->SetFont("Arial", '', 14);
                $this->SetTextColor(0, 0, 0);
                while($stm->fetch()){
                    $id = utf8_decode($id);
                    $this->Cell(7,1,$id, 1, 0, 'C');
                    $this->Cell(3,1,$Unidad, 1, 0, 'C');
                    $this->Cell(2,1,$Combustible, 1,0,'C');
                    $this->Cell(7,1,$km, 1, 1, 'C');
                }
            }
            $stm->close();
        }
        function Footer(){
            $this->SetY(-2);
            $this->SetFont("Arial", 'I', 10);
            $this->Cell(0, 1, "Como generar archivos PDF con PHP", 0, 0, 'C');
        }
    }
    $pdf = new PDF('P', 'cm','letter');
    $pdf->SetAuthor("CableNaranja", true);
    $pdf->SetTitle("Documento PDF de prueba", true);
    $pdf->AddPage();
    $pdf->Body();
    // Encabezado del documento
    $pdf->Output();
    $pdf->Output("Documento Final.pdf", 'F');
?>