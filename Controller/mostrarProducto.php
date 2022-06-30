<?php

    require('../Model/M_Productos4.php');

    $prod1 = new Producto();

    $productos = $prod1->verInventario();
// se almacenan los datos de la funcion verUsuario() que contiene select en la variable $productos

    $resultado = mysqli_query($conexion1,"SELECT COUNT(*) AS cantidad FROM articulo")
    or die("problemas en el select" . mysqli_error($conexion1));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];
 
?>