<?php
$sesionId= session_id();



    $conexion3 = mysqli_connect("localhost","root","","proyecto")
    or die ("problemas con la conexion");

    $datos = mysqli_query($conexion3,"SELECT * FROM carrito 
    JOIN articulo 
    ON articuloId = artId
    WHERE sesionId = '$sesionId'") or die("problemas en el select" . mysqli_error($conexion3));

?>