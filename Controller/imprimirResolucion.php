<?php

require('../fpdf/fpdf.php');
require('../Model/M_resolucion.php');

$id = $_REQUEST['rId'];

$datos = mysqli_query($conexion,"SELECT * FROM resolucion
JOIN pqrs 
ON pqrsId = resolucionpqrsId
WHERE resolucionId = $id")
or die ("problemas en el select" . mysqli_error($conexion));

 

$obtenerMes = mysqli_query($conexion,"SELECT MONTH(resolucionFecha), YEAR(resolucionFecha), DAY(resolucionFecha) FROM resolucion
WHERE resolucionId = $id") 
or die("problemas en el select" . mysqli_error($conexion));

while($date = mysqli_fetch_array($obtenerMes)){

    $mes = $date['MONTH(resolucionFecha)'];
    $año = $date['YEAR(resolucionFecha)'];
    $dia = $date['DAY(resolucionFecha)'];
}
while($dat = mysqli_fetch_array($datos)){

    $nombre = $dat['pqrsNombre'];
    $respuesta = $dat['resolucionMensaje'];
    
}

switch($mes){

case 1: 
    $mes = 'Enero';
break;

case 2: 
    $mes = 'Febrero';
break;
case 3: 
    $mes = 'Marzo';
break;

case 4: 
    $mes = 'Abril';
break;

case 5: 
    $mes = 'Mayo';
break;

case 6: 
    $mes = 'Junio';
break;

case 7: 
    $mes = 'Julio';
break;

case 8: 
    $mes = 'Agosto';
break;

case 9: 
    $mes = 'Septiembre';
break;

case 10: 
    $mes = 'Ocutbre';
break;

case 11: 
    $mes = 'Noviembre';
break;

case 12: 
    $mes = 'Diciciembre';
break;

}


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    // $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
   
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Ln(-20);
$pdf->setFont('Arial','',12);
$pdf->Cell(0,10,"Bucaramanga, $dia de $mes de $año",0,1,'L');
$pdf->Ln(60);
$pdf->Cell(0,0,utf8_decode("Respetado Señor(a): "),0,1,'L');
$pdf->Ln(10);
$pdf->setFont('Arial','B',12);
$pdf->Cell(0,0,utf8_decode("$nombre"),0,1,'L');
$pdf->Ln(10);
$pdf->Cell(0,0,utf8_decode("E.        S.        M."),0,1,'L');
$pdf->Ln(30);
$pdf->setFont('Arial','',12);
$pdf->MultiCell(0,5,utf8_decode("$respuesta"),0,'J',false);
$pdf->setFont('Arial','',12);
$pdf->Ln(30);
$pdf->Cell(0,0,utf8_decode("Cordialmente."),0,1,'L');
$pdf->Image('../Uploads/firma.png',10,220,50);
$pdf->Ln(55);
$pdf->setFont('Arial','',12);
$pdf->Cell(0,0,utf8_decode("Tatiana Martínez."),0,1,'L');
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode("C.C:1098813441"),0,1,'L');
$pdf->Ln(5);
$pdf->setFont('Arial','B',12    );
$pdf->Cell(0,0,utf8_decode("Umarani Accesorios"),0,1,'L');
$pdf->Ln(5);
$pdf->Output();



?>