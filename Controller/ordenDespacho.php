<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php

require_once('../Model/M_despacho.php');

if(isset($_REQUEST['despachoId'])){

$despachoId = $_REQUEST['despachoId'];
$empresaId = $_REQUEST['empresaId'];
$pedidoId = $_REQUEST['pedidoId'];
$usuarioId = $_REQUEST['usuarioId'];
$date = $_REQUEST['date'];
    $envio = new Despacho();

    $envio->insertarOrden($despachoId,$empresaId,$pedidoId,$usuarioId,$date);
    $Estado ="Enviado";
    $envio->actualizarPedido($pedidoId,$Estado);

    $envio->cerrarConexion();
    ?>
<script>
    swal("Operación Realizada!", "Se ha guardado la Orden Correctamente!", "success");
</script>
<?php

    
  header("refresh:1;url=../View/pedidos.php?pagina=1");

}

?>
</body>
</html>

