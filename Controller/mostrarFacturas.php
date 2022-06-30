<?php 

require_once('../Model/M_facturas.php');


$fact1 = new Factura();

$regFacturas = $fact1->verFacturas();

$resultado = mysqli_query($conexionFactura,"SELECT COUNT(*) AS cantidad FROM factura")
or die("problemas en el select" . mysqli_error($conexionFactura));

$res = mysqli_fetch_array($resultado);
$cantidad = $res['cantidad'];
 
?>