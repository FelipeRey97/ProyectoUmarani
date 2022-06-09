<?php
session_start();



$conexion = mysqli_connect('localhost','root','','proyecto') or 
        die ("problemas en la conexion" . mysqli_error($conexion));

        $registroPedido = mysqli_query($conexion,"SELECT * FROM pedido
        JOIN cliente
        ON clienteId = pedidoClienteId
        WHERE clienteEmail ='$_SESSION[cMail]'") 
        or die ("problemas en el select" . mysqli_error($conexion));

        
    




?>