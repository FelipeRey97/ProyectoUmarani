<?php

    require('../Model/M_Clientes.php');



    while ($reg = mysqli_fetch_array($registroCliente)){

        $nombre = $reg['clienteNombre'];
        $apellido = $reg['clienteApellido'];
        $telefono = $reg['clienteTelefono'];
        $mail = $reg['clienteEmail'];
        $clave = $reg['clienteContraseña'];
        $tel = $reg['clienteTelefono'];
    }

   
// se almacenan los datos de la funcion verCliente() que contiene select en la variable $usuarios

?>