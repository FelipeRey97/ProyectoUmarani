<?php
$sesionId= session_id();



    $conexion4 = mysqli_connect("localhost","root","","proyecto")
    or die ("problemas con la conexion");

    $checkout = mysqli_query($conexion4,"SELECT * FROM carrito 
    JOIN articulo 
    ON articuloId = artId
    WHERE sesionId = '$sesionId'") or die("problemas en el select" . mysqli_error($conexion4));

 
?>