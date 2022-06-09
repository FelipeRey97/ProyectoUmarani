<?php 

require_once('../Model/M_facturas.php');
require_once('../Model/M_Pedidos.php');

$clienteId = $_REQUEST['clienteId'];
$todaydate = $_REQUEST['date'];
$total = $_REQUEST['costoTotal'];
$clienteDoc = $_REQUEST['clienteDoc'];
$tipoPago = $_REQUEST['tipoPago'];
$sesionId = $_REQUEST['sesionId'];


$fact1 = new Factura ();
$fact1->insertarFactura($clienteId,$todaydate,$total,$clienteDoc,$tipoPago);


$facturaId = mysqli_query($conexionFactura,"SELECT facturaId FROM factura
WHERE facturaId IN (SELECT max(facturaId) FROM factura)") 
or die ("problemas en el select" .mysqli_error($conexionFactura));

while ($factId = mysqli_fetch_array($facturaId)){

    $id = $factId['facturaId'];

}

$idFactura=  $id;

$gPedido = new Pedido ();
$gPedido->insertarPedido($idFactura,$todaydate,$clienteId,$id,$total);

$articulos = mysqli_query($conexionFactura,"SELECT * FROM carrito 
JOIN articulo
ON articuloId = artId
WHERE sesionId = '$sesionId'") or die ("problemas en el select");

while ($art = mysqli_fetch_array($articulos)){

    $articuloId = $art['artId'];
    $cantidad = $art['artCarroCant'];
    $precio = $art['artPrecio'];

    mysqli_query($conexionFactura, "INSERT INTO productoporpedido (prodPed_artId,prodPed_pedidoId,prodPedCant,prodPedValorArt)
    VALUES ($articuloId,$id,$cantidad,$precio)") or die ("problemas en el insert");

    mysqli_query($conexionFactura, "INSERT INTO productoporfactura (prodFact_ArtId,prodFact_FactId,prodFactCantidad,prodFactPrecio)
    VALUES ($articuloId,$idFactura,$cantidad,$precio)") or die ("problemas en el insert");

}


mysqli_close($conexionFactura);

?>


<script>
         swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
         
      </script>
<?php

header("Location: http://localhost/UmaraniWeb/view/catalogo.php");

?>