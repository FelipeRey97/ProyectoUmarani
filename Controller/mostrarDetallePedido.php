<?php

require_once('../Model/M_Pedidos.php');
require_once('../Model/M_facturas.php');
require_once('../Model/M_art_ped_factura.php');
require_once('../Model/M_despacho.php');

if(isset($_REQUEST['ped']) || isset($_REQUEST['rect'])){

if(isset($_REQUEST['rect'])){

    $id = $_REQUEST['rect'];

}else if(isset($_REQUEST['ped'])){

    $id=  $_REQUEST['ped'];
}

$fact2 = new Factura();

//DATOS DEL CLIENTE EN EL PEDIDO

$datosPedido = $fact2->cabeceraFactura($id);

while($datped = mysqli_fetch_array($datosPedido)){

    $nombre = $datped['clienteNombre'];
    $apellido = $datped['clienteApellido'];
    $documento = $datped['facturaClienteDoc']; 
    $direccion = $datped['facturaClienteDireccion'];
    $telefono = $datped['facturaClTelefono'];
    $mail = $datped['clienteEmail'];
     
}

$artxped1 = new articuloPorPedido();

$detallePedido = $artxped1->detallePedido($id);

$desp1 = new Despacho();
$empresaenvio = $desp1->verEmpresaEnvio();

}


if(isset($_REQUEST['vis']) || isset($_REQUEST['rect']) ){

    if(isset($_REQUEST['rect'])){

        $id = $_REQUEST['rect'];
    
    }else if(isset($_REQUEST['vis'])){
    
        $id=  $_REQUEST['vis'];
        
    }

    $fact2 = new Factura();

    //DATOS DEL CLIENTE EN EL PEDIDO
    
    $datosPedido = $fact2->cabeceraFactura($id);

while($datped = mysqli_fetch_array($datosPedido)){

    $nombre = $datped['clienteNombre'];
    $apellido = $datped['clienteApellido'];
    $documento = $datped['facturaClienteDoc'];
    $direccion = $datped['facturaClienteDireccion'];
    $telefono = $datped['facturaClTelefono'];
    $mail = $datped['clienteEmail'];
    
}

$artxped1 = new articuloPorPedido();

$detallePedido = $artxped1->detallePedido($id);

$desp1 = new Despacho();
$empresaenvio = $desp1->verEmpresaEnvio();

$datosDespacho = $desp1->mostrarDatosDespacho($id);

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