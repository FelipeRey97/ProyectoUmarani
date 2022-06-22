<?php

require('../Model/M_Pedidos.php');

if(isset($_REQUEST['ped'])){


$id = $_REQUEST['ped'];

$datosPedido = mysqli_query($conexionPedido,"SELECT * FROM factura
JOIN cliente 
ON clienteId = facturaClienteId
WHERE facturaId = $id") 
or die("Problemas en el select" . mysqli_error($conexionPedido));

while($datped = mysqli_fetch_array($datosPedido)){

    $nombre = $datped['clienteNombre'];
    $apellido = $datped['clienteApellido'];
    $documento = $datped['facturaClienteDoc'];
    $direccion = $datped['facturaClienteDireccion'];
    $telefono = $datped['clienteTelefono'];
    $mail = $datped['clienteEmail'];
    
}

$detallePedido = mysqli_query($conexionPedido,"SELECT * FROM productoporpedido
JOIN pedido
ON pedidoId = prodPed_pedidoId
JOIN articulo
ON artId = prodPed_artId
WHERE pedidoId= $id") 
or die("Problemas en el select" . mysqli_error($conexionPedido));


include('../View/detallePedido.php');


}


?>