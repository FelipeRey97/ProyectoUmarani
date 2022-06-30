<?php

require_once('../Model/M_PQRS.php');

$pq1 = new PQRS();


$registros = $pq1->verPqrs();

$resultado = mysqli_query($conexionPqrs,"SELECT COUNT(*) AS cantidad FROM pqrs")
or die ("problemas en el select " . mysqli_error($conexionPqrs));

$reg = mysqli_fetch_array($resultado);

$cantidad = $reg['cantidad'];

$registrosxpagina = 5;

?>