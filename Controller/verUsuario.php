<?php

    require('../Model/M_conexion.php');

    $con1 = new Conexion();

    $usuarios = $con1->verUsuario();

    

// se almacenan los datos de la funcion verUsuario() que contiene select en la variable $usuarios

?>