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
require_once('../Model/M_Productos4.php');
require_once('../Model/M_direccionPedido.php');
require_once('../Model/M_carrito.php');
require_once('../Model/M_art_ped_factura.php');

//INSERCIÓN DE DATOS EN LA TABLA FACTURAS

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

//OBTIENE EL ID DE LA FACTURA RECIÉN GENERADA PARA SINCRONIZARLA LA TABLA PEDIDOS

$facturaId = $fact1->ObtenerIdFactura();

while ($factId = mysqli_fetch_array($facturaId)){

    $id = $factId['facturaId'];

}
 
$idFactura=  $id;
$direccionId = $id;

// SE GUARDAN LOS DATOS DE LA DIRECCION Y PEDIDO SINCRONIZADOS CON LA FACTURA
$direccionPed = new Direccion();
$direccionPed->guardarDireccion($direccionId,$dpto,$ciudad,$direccion);

$gPedido = new Pedido ();
$gPedido->insertarPedido($idFactura,$todaydate,$clienteId,$id,$total,$direccionId);

// SE GUARDAN EN EL PEDIDO Y ARTICULO_POR_PEDIDO Y ARTICULO_POR_FACTURA LA SELECCION DE ARTICULOS EN EL CARRITO
$car2 = new Carrito ();
$articulos = $car2->mostrarCarrito($sesionId); 

// SE INSTANCIAN OBJETOS ANTES DE INICIAR EL CICLO FOREACH

$apf_object = new articuloPorFactura ();
$app_object = new articuloPorPedido ();

$prodCompra = new Producto();
foreach ($articulos as $art){

    $articuloId = $art['artId'];
    $cantidad = $art['artCarroCant'];
    $precio = $art['artPrecio'];
    $cantActual = $art['artCantidad'];

    //SE ALMACENAN LOS ARTICULOS CORRESPONDIENTES AL PEDIDO Y FACTURA.

    $app_object->guardarDatos($articuloId,$id,$cantidad,$precio);

    $apf_object->guardarDatos($articuloId,$idFactura,$cantidad,$precio);

    //SE RESTAN LOS ARTICULOS COMPRADOS DE LA CANTIDAD DISPONIBLE EN EL INVENTARIO

    $prodCompra->DescontarInventario($cantActual,$cantidad,$articuloId);
    
}

?>


<script>
         swal("Operación Realizada", "Se ha realizado la Compra!", "success");
         
      </script>
<?php

header("refresh:1;url=../view/comprafinalizada.php?pedidoId=$id");

?>






</body>
</html>

