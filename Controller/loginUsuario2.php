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

    require_once('../Model/M_conexion.php');

    $user = new Conexion();

    $usuario= $_POST['usuario'];
    $contraseña= $_POST['contraseña'];
  
    $consulta = $user->validarUsuario($usuario,$contraseña);

    $filas = mysqli_fetch_array($consulta);
  
    if($filas){
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $filas['usuarioNombre'];
        $_SESSION['doc'] = $filas['usuarioDoc'];
        $_SESSION['apellido'] = $filas['usuarioApellido'];
        $_SESSION['rol'] = $filas['rolNombre'];
        $_SESSION['usuarioId'] = $filas['usuarioId'];

        header("Location: ../view/pedidos.php?pagina=1");
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




</body>
</html>
