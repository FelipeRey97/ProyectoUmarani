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
    
    $usuario= $_POST['cMail'];
    $contraseña= $_POST['cPassword'];

    session_start();
    $_SESSION['cMail'] = $usuario;

    $conexion = mysqli_connect("localhost","root","","proyecto")
    or die ("problemas con la conexion");

    $consulta = "SELECT*FROM cliente 
    where clienteEmail = '$usuario' and clienteContraseña = '$contraseña'";
    $resultado = mysqli_query($conexion,$consulta);

    $filas = mysqli_fetch_array($resultado);
  
    if($filas){
        
        $_SESSION['nombre'] = $filas['clienteNombre'];
        $_SESSION['apellido'] = $filas['clienteApellido'];

     if($_REQUEST['compra'] == 1){

        header("Location: ../View/DatosFacturacion.php");

     }else{
        header("Location: ../View/areaCliente.php");
     }
         
    }
    else{
        ?>
        <?php 
        include("../View/iniciarSesion.php");
        ?>
        <h1>ERROR EN LA AUTENTICACION</h1>
        <?php 
    }


?>

</body>
</html>