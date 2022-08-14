<?php 
     
  if(isset($_REQUEST['iniciar_sesion'])){

    require_once('../Model/M_Clientes.php');
    
    $cliente_Sesion = new Clientes();

    $usuario= $_POST['cMail'];
    $contraseña= $_POST['cPassword'];
    //SE REALIZA LA CONSULTA PARA COMPROBAR SI EL USUARIO Y CONTRASEÑA CORRESPONDEN
    $resultado = $cliente_Sesion->verificarCliente($usuario);

    $filas = mysqli_fetch_array($resultado);
  
    if($filas){

        $v_contraseña = password_verify($contraseña, $filas['clienteContraseña']);

        if($v_contraseña == true){
       
        $_SESSION['cMail'] = $usuario;
        $_SESSION['nombre'] = $filas['clienteNombre'];
        $_SESSION['apellido'] = $filas['clienteApellido'];

     if($_REQUEST['compra'] == 1){

        header("Location: ../View/DatosFacturacion.php");

     }else{
        header("Location: ../View/areaCliente.php");
     }
    }  
    else{
        
        $error = "erroneos";

    }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
<?php    
    switch($error){

    case "erroneos":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'Usuario o Contraseña Erróneos',
    'error'
    )
    </script>
    <?php   break;
    case "vacio":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'No se permiten campos vacíos',
    'error'
    )
    </script>
    <?php   break;
    }

  }
    ?>

</body>
</html>