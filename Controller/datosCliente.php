<?php

    require_once('../Model/M_Clientes.php');

    $client = new clientes ();
    $mail = $_SESSION['cMail'];
    $registroCliente = $client->DetalleCliente($mail);

    if(isset($registroCliente)){

        while ($reg = mysqli_fetch_array($registroCliente)){

        
            $nombre = $reg['clienteNombre'];
            $apellido = $reg['clienteApellido'];
            $telefono = $reg['clienteTelefono'];
            $mail = $reg['clienteEmail'];
            $clave = $reg['clienteContraseña'];
            $tel = $reg['clienteTelefono'];
        
            }

    }else{
    
        header("location: ../View/iniciarSesion.php");
    }
   

 
?>