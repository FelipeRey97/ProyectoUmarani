<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    

<?php 

require_once('../Model/M_facturas.php');
require_once('../Model/M_Pedidos.php');

$clienteId = $_REQUEST['clienteId'];
$todaydate = $_REQUEST['date'];
$total = $_REQUEST['costoTotal'];
$clienteDoc = $_REQUEST['clienteDoc'];
$tipoPago = $_REQUEST['tipoPago'];
$sesionId = $_REQUEST['sesionId'];
$dirC = $_REQUEST['direccionC'];
$dpto = $_REQUEST['dpto'];
$ciudad = $_REQUEST['ciudad'];
$direccion = $_REQUEST['direccion'];
$impuestoId = 1;
$fact1 = new Factura ();
$fact1->insertarFactura($clienteId,$todaydate,$total,$clienteDoc,$tipoPago,$dirC,$impuestoId);


$facturaId = mysqli_query($conexionFactura,"SELECT facturaId FROM factura
WHERE facturaId IN (SELECT max(facturaId) FROM factura)") 
or die ("problemas en el select" .mysqli_error($conexionFactura));

while ($factId = mysqli_fetch_array($facturaId)){

    $id = $factId['facturaId'];

}

$idFactura=  $id;
$direccionId = $id;

mysqli_query($conexionFactura,"INSERT INTO direccionpedido (direccionId,direccionDep,direccionCiudad,direccionDomicilio)
VALUES ($direccionId,'$dpto','$ciudad','$direccion')");

$gPedido = new Pedido ();
$gPedido->insertarPedido($idFactura,$todaydate,$clienteId,$id,$total,$direccionId);

$articulos = mysqli_query($conexionFactura,"SELECT * FROM carrito 
JOIN articulo
ON articuloId = artId
WHERE sesionId = '$sesionId'") or die ("problemas en el select");

while ($art = mysqli_fetch_array($articulos)){

    $articuloId = $art['artId'];
    $cantidad = $art['artCarroCant'];
    $precio = $art['artPrecio'];
    $cantActual = $art['artCantidad'];

    mysqli_query($conexionFactura, "INSERT INTO productoporpedido (prodPed_artId,prodPed_pedidoId,prodPedCant,prodPedValorArt)
    VALUES ($articuloId,$id,$cantidad,$precio)") or die ("problemas en el insert");

    mysqli_query($conexionFactura, "INSERT INTO productoporfactura (prodFact_ArtId,prodFact_FactId,prodFactCantidad,prodFactPrecio)
    VALUES ($articuloId,$idFactura,$cantidad,$precio)") or die ("problemas en el insert");

    mysqli_query($conexionFactura,"UPDATE articulo SET artCantidad = $cantActual - $cantidad 
    WHERE artId = $articuloId");

}




mysqli_close($conexionFactura);

?>


<script>
         swal("Operación Realizada", "Se ha realizado la Compra!", "success");
         
      </script>
<?php

header("refresh:1;url=../view/comprafinalizada.php?pedidoId=$id");

?>






</body>
</html>

