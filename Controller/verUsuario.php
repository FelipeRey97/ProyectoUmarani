<?php

    require('../Model/M_conexion.php');

    $con1 = new Conexion();

    $usuarios = $con1->verUsuario();

    $resultado = mysqli_query($conexionUsuario,"SELECT COUNT(*) AS cantidad FROM usuariotienda")
    or die("problemas en el select" . mysqli_error($conexionUsuario));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];

    

// se almacenan los datos de la funcion verUsuario() que contiene select en la variable $usuarios
 
?>