<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
<?php 
if(isset($_REQUEST['iniciar-sesion'])){


    $usuario= $_POST['usuario'];
    $contraseña= $_POST['contraseña'];

    session_start();
    $_SESSION['usuario'] = $usuario;

    $conexion = mysqli_connect("localhost","root","","proyecto")
    or die ("problemas con la conexion");
  
    $consulta = "SELECT*FROM usuariotienda join rol
    on rolId = usuarioRolId
    where usuarioDoc = '$usuario' and usuarioContraseña = '$contraseña'";
    $resultado = mysqli_query($conexion,$consulta);

    $filas = mysqli_fetch_array($resultado);

    if($filas){

        header("Location: ../view/pedidos.php?pagina=1");
        session_start();
        $_SESSION['nombre'] = $filas['usuarioNombre'];
        $_SESSION['doc'] = $filas['usuarioDoc'];
        $_SESSION['apellido'] = $filas['usuarioApellido'];
        $_SESSION['rol'] = $filas['rolNombre'];
        $_SESSION['usuarioId'] = $filas['usuarioId'];
    }
    else{
        ?>
            <script>
                swal('Error','Usuario o contraseña Erroneos','warning');
            
            </script>
       
        
        <?php 
    }

}
?>


<script src="../JS/alertas.js"></script>

</body>
</html>
