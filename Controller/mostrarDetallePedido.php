<?php

require('../Model/M_Pedidos.php');

if(isset($_REQUEST['ped']) || isset($_REQUEST['rect'])){

if(isset($_REQUEST['rect'])){

    $id = $_REQUEST['rect'];

}else if(isset($_REQUEST['ped'])){

    $id=  $_REQUEST['ped'];
}


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

$empresaenvio = mysqli_query($conexionPedido,"SELECT * FROM empresaenvio");



}

if(isset($_REQUEST['vis']) || isset($_REQUEST['rect']) ){

    if(isset($_REQUEST['rect'])){

        $id = $_REQUEST['rect'];
    
    }else if(isset($_REQUEST['vis'])){
    
        $id=  $_REQUEST['vis'];
        
    }

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

$empresaenvio = mysqli_query($conexionPedido,"SELECT * FROM empresaenvio");

$datosDespacho = mysqli_query($conexionPedido,"SELECT * FROM  pedido
JOIN despacho
ON  pedidoId = despachoPedidoId 
JOIN usuariotienda 
ON usuarioId = despachoUsuarioId
JOIN empresaenvio
ON despachoEmpresaId = empresaId
WHERE despachoPedidoId = $id") 
or die("Problemas en el select" . mysqli_error($conexionPedido));

while($desp = mysqli_fetch_array($datosDespacho)){

    $uNombre = $desp['usuarioNombre'];
    $uApellido = $desp['usuarioApellido'];
    $uCodigo = $desp['usuarioId'];
    $eLogistica = $desp['empresaNombre'];
    $cGuia = $desp['despachoId'];
    $pedEstado = $desp['pedidoEstado'];
    $estadoFecha = $desp['despachoFecha'];
}






}








?>