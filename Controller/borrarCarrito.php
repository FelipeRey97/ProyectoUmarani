<?php
session_start();

$sesionId= $_REQUEST['sesionId'];
$artId = $_REQUEST['artId'];
$conexion2 = mysqli_connect("localhost","root","","proyecto") 
or die ("problemas con la conexion");


mysqli_query($conexion2,"DELETE FROM carrito 
WHERE articuloId = $artId AND sesionId = '$sesionId' ");


header("Location:" .$_SERVER['HTTP_REFERER']."");

?>