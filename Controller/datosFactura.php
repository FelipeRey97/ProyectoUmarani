<?php


$conexion = mysqli_connect('localhost','root','','proyecto') or 
        die ("problemas en la conexion" . mysqli_error($conexion));

        $registroCliente = mysqli_query($conexion,"select * from cliente where clienteEmail ='$_SESSION[cMail]'") 
        or die ("problemas en el select" . mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registroCliente)){

        
$nombre = $reg['clienteNombre'];
$apellido = $reg['clienteApellido'];
$mail = $reg['clienteEmail'];
$clave = $reg['clienteContraseña'];
$tel = $reg['clienteTelefono'];
$clienteId = $reg['clienteId'];

}

?>