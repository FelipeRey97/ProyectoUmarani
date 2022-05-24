<?php

    require('../Model/M_Clientes.php');


    $registroCliente = mysqli_query($conexion,"select * from cliente where clienteEmail ='$_SESSION[cMail]'") 
    or die ("problemas en el select" . mysqli_error($conexion));

    while ($reg = mysqli_fetch_array($registroCliente)){

        $nombre = $reg['clienteNombre'];
        $apellido = $reg['clienteApellido'];
        $telefono = $reg['clienteTelefono'];
        $mail = $reg['clienteEmail'];
    }

   
// se almacenan los datos de la funcion verCliente() que contiene select en la variable $usuarios

?>