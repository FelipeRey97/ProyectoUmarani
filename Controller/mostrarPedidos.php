<?php
 
require_once("../Model/M_Pedidos.php");

$ped2 = new Pedido();

if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $ped2->inicializar($artxpag);
}else{
    $artxpag = 5;
    $ped2->inicializar($artxpag);
}

// Combinatoria de filtros y Busquedas

if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] != "" ){

 $dpto = $_REQUEST['dpto'];
 $where = "WHERE direccionDep like '%$dpto%'";
 $ped2->filtrar($where);

}
else if (isset($_REQUEST['estado']) && $_REQUEST['estado']){

    $estado = $_REQUEST['estado'];
    $where = "WHERE pedidoEstado like '%$estado%'";
    $ped2->filtrar($where);
}
else if (isset($_REQUEST['id']) && $_REQUEST['id'] != ""){

    $id = $_REQUEST['id'];
    $where = "WHERE pedidoId = $id";
    $ped2->filtrar($where);

}
else {

$where = "";
$ped2->filtrar($where);
}


$registros = $ped2->verPedido();


$resultado = mysqli_query($conexionPedido,"SELECT COUNT(*) AS cantidad FROM pedido
JOIN direccionPedido
ON pedidoDireccionId = direccionId
$where")
or die("problemas en el select" . mysqli_error($conexionPedido));

$res = mysqli_fetch_array($resultado);

$cantidad = $res['cantidad'];

$fila = mysqli_query($conexionPedido, "SELECT * from dpto");

$registrosxpagina = $ped2->artporpag;
 
?>  