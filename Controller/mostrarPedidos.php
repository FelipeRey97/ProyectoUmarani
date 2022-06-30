<?php

require_once("../Model/M_Pedidos.php");

$ped2 = new Pedido();

$registros = $ped2->verPedido();


$resultado = mysqli_query($conexionPedido,"SELECT COUNT(*) AS cantidad FROM pedido")
or die("problemas en el select" . mysqli_error($conexionPedido));

$res = mysqli_fetch_array($resultado);

$cantidad = $res['cantidad'];
 
?> 