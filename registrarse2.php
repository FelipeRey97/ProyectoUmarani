<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $conexion = mysqli_connect("localhost","root","","proyecto")
        or die("problemas con la conexion");

        mysqli_query($conexion,"insert into cliente (clienteNombre,clienteApellido,clienteEmail,clienteContraseña)
        values('$_REQUEST[cNombre]','$_REQUEST[cApellido]','$_REQUEST[cMail]','$_REQUEST[cPassword]')") 
        or die ("problemas en el select" . mysqli_error($conexion));

        echo "Te has Registrado correctamente";


    ?>
    
</body>
</html>