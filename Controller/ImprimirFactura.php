<?php
require('../fpdf/fpdf.php');
require('../Model/M_facturas.php');
require('../Model/M_art_ped_factura.php');

$id = $_REQUEST['factId'];

$fac1 = new Factura();
$art_p_fact = new articuloPorFactura();

//DATOS PARA LA CABECERA DE LA FACTURA
$registros = $fac1->cabeceraFactura($id);
// DATOS PARA EL CUERPO DE LA FACTURA
$contenido = $art_p_fact->cuerpoFactura($id);
// DATOS PARA EL DESGLOSE DE PRECIOS EN LA FACTURA
$content = $fac1->preciosFactura($id);
 
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
     
}


// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Generación de la tabla
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image('../Uploads/logo.png',78,0,50);
// Arial bold 15
$pdf->SetFont('Arial','B',12);
// Movernos a la derecha
$pdf->Cell(1);
// Título Factura
$pdf->Ln(40);
$pdf->Cell(0,25,'FACTURA DE COMPRA',0,1,'C');
// Título Comercio
$pdf->SetFont('Arial','',15);
$pdf->Cell(190,0,'',1,1,'');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,'UMARANI ACCESORIOS ',0,1,'');
while($reg = mysqli_fetch_array($registros)){


$pdf->Cell(0,0,'Factura No.'. $reg['facturaId'],0,1,'R');
$pdf->Ln(7);
$pdf->Cell(1,0,'NIT: 22222222 - 2  ',0,1,'');
$pdf->Cell(0,0,$reg['facturaFecha'],0,1,'R');
$pdf->Ln(7);
$pdf->Cell(1,0,'Cra 28 A # 21-34 Bucaramanga - Santander ',0,1,'');
$pdf->Ln(7);
$pdf->Cell(190,0,'',1,1,'');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,0,'Nombre: ',0,1,'');
$pdf->SetFont('Arial','',10);
$pdf->Cell(18);
$pdf->Cell(0,0,$reg['clienteNombre'] ." ". $reg['clienteApellido'] ,0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,'Documento: ',0,1,'');
$pdf->SetFont('Arial','',10);
$pdf->Cell(22);
$pdf->Cell(0,0,$reg['facturaClienteDoc'],0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,0,utf8_decode('Teléfono: '),0,1,'');
$pdf->Cell(18);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,$reg['clienteTelefono'],0,1,'L');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(5);
$pdf->Cell(0,0,utf8_decode('Dirección: '),0,1,'');
$pdf->Cell(18);
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,0,$reg['facturaClienteDireccion'],0,1,'L');
$pdf->Ln(5);
$pdf->Cell(190,0,'',1,1,'');
// Salto de línea
$pdf->Ln(10);

}


$pdf->SetFont('Arial','B',10);
//Cabecera de la tabla
$pdf->Cell(20,7,'Cantidad',1,0,'C');
$pdf->Cell(110,7,utf8_decode('Descripción'),1,0,'C');
$pdf->Cell(30,7,'Precio Unidad',1,0,'C');
$pdf->Cell(30,7,'Costo Total',1,1,'C');
// Contenido de la tabla
$pdf->SetFont('Arial','',10);
while($file = mysqli_fetch_array($contenido)){

$pdf->Cell(20,7,$file['prodFactCantidad'],1,0,'C');
$pdf->Cell(110,7,utf8_decode($file['artNombre']),1,0,'L');
$pdf->Cell(30,7,$file['artPrecio']-($file['artPrecio']*$file['impValor']),1,0,'C');
$pdf->Cell(30,7,($file['artPrecio']-$file['artPrecio']*$file['impValor'])*$file['prodFactCantidad'],1,1,'C');

}

while($row = mysqli_fetch_array($content)){
//Totales e impuestos
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,7,'',0,0,'C');
$pdf->Cell(110,7,utf8_decode(''),0,0,'C');
$pdf->Cell(30,7,'Subtotal',1,0,'C');
$pdf->Cell(30,7,$row['facturaCostoTotal']-$row['facturaCostoTotal']*$row['impValor'],1,1,'C');
$pdf->Cell(20,7,'',0,0,'C');
$pdf->Cell(110,7,utf8_decode(''),0,0,'C');
$pdf->Cell(30,7,'IVA (' . $row['impValor']*100 .'%)' ,1,0,'C');
$pdf->Cell(30,7,$row['facturaCostoTotal']*$row['impValor'],1,1,'C');
$pdf->Cell(20,7,'',0,0,'C');
$pdf->Cell(110,7,utf8_decode(''),0,0,'C');
$pdf->Cell(30,7,'Total',1,0,'C');
$pdf->Cell(30,7,$row['facturaCostoTotal'],1,1,'C');

}

$pdf->Ln();
$pdf->Output();
?>