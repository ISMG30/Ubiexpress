<?php
session_start();
//include ("bargradex1.php");

include ("Grafico/jpgraph.php");
include ("Grafico/jpgraph_bar.php");

require('fpdf/fpdf.php');

$ANO= $_REQUEST['ANO'];
$OFICINA= $_REQUEST['OFI'];

$myServer = "localhost";
$myUser = "Miguel";
$myPass = "usu1";
$myDB = "Base_Datos";
$dbhandle = mssql_connect($myServer, $myUser, $myPass) ;
$selected = mssql_select_db($myDB, $dbhandle) ;

class PDF extends FPDF
{

//Page header
function Header()
{
//Logo
// $this->Image('logo_pb.png',10,8,33);
$this->Ln(0);

// $this->Image('imagen/logochilebus.gif',10,8,33);
//Arial bold 15
$this->SetFont('Arial','U',9);
//Move to the right
$this->Cell(70);
//Title
$this->Cell(30,10,utf8_decode('Informe de Boletos Enviados a Oficinas'),0,0,'C');
//Line break
$this->Ln(2);

}

//Page footer
function Footer()
{
//Position at 1.5 cm from bottom
$this->SetY(-15);
//Arial italic 8
$this->SetFont('Arial','I',6);
//Page number
$this->Cell(0,3,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
function Tit($ano)
{
$this->AliasNbPages();
$this->AddPage();
$this->Ln(3) ;
$this->SetFont('Arial','U',6);
$this->Cell(70);
$this->Cell(30,10,utf8_decode('Año de Proceso: ') . $ano,0,0,'C');
$this->SetFont('Times','',6);
}
function Subtit1($ano)
{
// $this->Tit($ano);
$this->Ln(10) ;

$this->Cell(15,3,utf8_decode('Oficina'),1,0,'C');
$this->Cell(12,3,utf8_decode('Enero'),1,0,'C');
$this->Cell(12,3,utf8_decode('Febrero'),1,0,'C');
$this->Cell(12,3,utf8_decode('Marzo'),1,0,'C');
$this->Cell(12,3,utf8_decode('Abril'),1,0,'C');
$this->Cell(12,3,utf8_decode('Mayo'),1,0,'C');
$this->Cell(12,3,utf8_decode('Junio'),1,0,'C');
$this->Cell(12,3,utf8_decode('Julio'),1,0,'C');
$this->Cell(12,3,utf8_decode('Agosto'),1,0,'C');
$this->Cell(12,3,utf8_decode('Septiembre'),1,0,'C');
$this->Cell(12,3,utf8_decode('Octubre'),1,0,'C');
$this->Cell(12,3,utf8_decode('Noviembre'),1,0,'C');
$this->Cell(12,3,utf8_decode('Diciembre'),1,0,'C');
$this->Cell(13,3,utf8_decode('Total'),1,0,'C');
$this->Ln() ;
}
}
$pdf=new PDF('P','mm','a4');
$FILA1 = array();
$FILA2[13] = 0;
$FILA3 = array();
$FILA4[13] = 0;
$inx = 1;

$pdf->Tit($ANO);
$pdf->Subtit1($ANO);
$Query = "SELECT DISTINCT DETALLE=OFI_CODIGO ";
$Query = $Query . "from dbo.DESPACHO,dbo.OFICINA ";
$Query = $Query . "WHERE (YEAR(DESP_FECHA) = ".$ANO. ") and ";
$Query = $Query . "(DESP_OFICINA = OFI_CORREL ) ";
$result = mysqli_query($Query);
$numRows = mssql_num_rows($result);
$nfil = $numRows;
$tgasto[$nfil];

while($row = mssql_fetch_array($result))
{
$tgasto[$inx]=$row["DETALLE"] ;
$inx++;
}

$inx = 1;
$Query = "SELECT DETALLE=OFI_CODIGO, VAL=COUNT(*), MES=MONTH(DESP_FECHA) ";
$Query = $Query . "from dbo.DESPACHO,dbo.OFICINA ";
$Query = $Query . "WHERE (YEAR(DESP_FECHA) = ".$ANO. ") and ";
$Query = $Query . "(DESP_OFICINA = OFI_CORREL ) ";
$Query = $Query . " GROUP BY OFI_CODIGO, MONTH(DESP_FECHA) ";
$result = mssql_query($Query);
//$numRows = mssql_num_rows($result);
//$nfil = $numRows;
//$tgasto[$nfil];
//$FILA1 = array();
$ind = 0;

while($row = mssql_fetch_array($result))
{
$inx = 1;
$det = $row["DETALLE"];
while ($tgasto[$inx] != $det)
{
$inx++;
}
// if ($ind==0)
$ind = $inx;
// $tgasto[$inx]=$row["DETALLE"] ;
$mes=$row["MES"] ;
$FILA1[$ind][$mes] = $FILA1[$ind][$mes] + $row["VAL"] ;
$FILA1[$ind][13] = $FILA1[$ind][13] + $row["VAL"] ;
$FILA2[$mes] = $FILA2[$mes] + $row["VAL"] ;
$FILA2[13] = $FILA2[13] + $row["VAL"] ;
// $inx++;
}

$inx = 1;
$inxf = 1;

while ( $inx <= $nfil)
{
// $pdf->Ln() ;
// $pdf->Cell(15,3,utf8_decode(' '),1,0,'L');
$pdf->Cell(15,3,utf8_decode($tgasto[$inx]),1,0,'1');
$pdf->Cell(12,3,number_format($FILA1[$inx][1],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][2],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][3],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][4],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][5],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][6],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][7],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][8],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][9],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][10],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][11],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA1[$inx][12],0, ',','.'),1,0,'R');
$pdf->Cell(13,3,number_format($FILA1[$inx][13],0, ',','.'),1,0,'R');

$pdf->Ln() ;
$inx++;
}

$pdf->Cell(15,3,utf8_decode('Total'),1,0,'1');
$pdf->Cell(12,3,number_format($FILA2[1],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[2],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[3],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[4],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[5],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[6],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[7],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[8],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[9],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[10],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[11],0, ',','.'),1,0,'R');
$pdf->Cell(12,3,number_format($FILA2[12],0, ',','.'),1,0,'R');
$pdf->Cell(13,3,number_format($FILA2[13],0, ',','.'),1,0,'R');

$pdf->Ln() ;

$pdf->Tit($ANO);

// AQUI VIENE EL GRAFICO

// Some data
$datay1=array(140,110,50);
$datay2=array(35,90,190);
$datay3=array(20,60,70);

// Create the basic graph
$graph = new Graph(300,200);
$graph->SetScale("textlin");
$graph->SetMargin(40,20,20,40);
$graph->SetMarginColor('white:0.9');
$graph->SetColor('white');
$graph->SetShadow();

// Adjust the position of the legend box
$graph->legend->Pos(0.03,0.10);

// Adjust the color for theshadow of the legend
$graph->legend->SetShadow('darkgray@0.5');
$graph->legend->SetFillColor('lightblue@0.1');
$graph->legend->Hide();

// Get localised version of the month names
$graph->xaxis->SetTickLabels($gDateLocale->GetShortMonth());

$graph->SetBackgroundCountryFlag('mais',BGIMG_COPY,50);

// Set axis titles and fonts
$graph->xaxis->title->Set('Year 2002');
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetColor('white');

$graph->xaxis->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->SetColor('navy');

$graph->yaxis->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->SetColor('navy');

//$graph->ygrid->Show(false);
$graph->ygrid->SetColor('white@0.5');

// Setup graph title
$graph->title->Set('ESTADISTICA DE AÑO 2008');

// Some extra margin (from the top)
$graph->title->SetMargin(3);
$graph->title->SetFont(FF_ARIAL,FS_NORMAL,9);

// Create the three var series we will combine
$bplot1 = new BarPlot($datay1);
$bplot2 = new BarPlot($datay2);
$bplot3 = new BarPlot($datay3);

// Setup the colors with 40% transparency (alpha channel)
$bplot1->SetFillColor('yellow@0.4');
$bplot2->SetFillColor('red@0.4');
$bplot3->SetFillColor('darkgreen@0.4');

// Setup legends
$bplot1->SetLegend('Label 1');
$bplot2->SetLegend('Label 2');
$bplot3->SetLegend('Label 3');

// Setup each bar with a shadow of 50% transparency
$bplot1->SetShadow('black@0.4');
$bplot2->SetShadow('black@0.4');
$bplot3->SetShadow('black@0.4');

$gbarplot = new GroupBarPlot(array($bplot1,$bplot2,$bplot3));
$gbarplot->SetWidth(0.6);
$graph->Add($gbarplot);

$graph->Stroke();


$pdf->Output();
?>