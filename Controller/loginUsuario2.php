<?php 

if(isset($_REQUEST['iniciar-sesion'])){

    require_once('../Model/M_conexion.php');

    $user = new Conexion();

    $usuario= $_POST['usuario'];
    $contraseña= $_POST['contraseña'];
  
    $consulta = $user->validarUsuario($usuario);

    $filas = mysqli_fetch_array($consulta);
  
    if($filas){

        
        if($filas['usuarioEstado'] == "Preactivo"){
            session_start();
            $usuario = $_POST['usuario'];
            $_SESSION['usuario'] = $usuario;
            $vEstado = false;
            header("Location: ../View/asignarClave.php");
        }
        else{

            $vEstado = true;
            
        }
        if($vEstado == true){

            $v_password = password_verify($contraseña,$filas['usuarioContraseña']);
            if($v_password == true){

                if($filas['usuarioEstado'] == "Bloqueado" || $filas['usuarioEstado'] == "Inactivo"){

                    $vEstado = false;
                    $error = "bloqueado";
                }

                if ($filas['usuarioEstado'] == "Activo"){

                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['nombre'] = $filas['usuarioNombre'];
                    $_SESSION['doc'] = $filas['usuarioDoc'];
                    $_SESSION['apellido'] = $filas['usuarioApellido'];
                    $_SESSION['rol'] = $filas['rolNombre'];
                    $_SESSION['usuarioId'] = $filas['usuarioId'];

                    header("Location: ../View/pedidos.php?pagina=1");
                }
            }
            else if($v_password == false){
               
                $error = "erroneo";
            }
            
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

        
    case "erroneo":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Usuario o Contraseña Erróneos',
        'error'
        )
        </script>
        <?php   break;
        case "bloqueado":
            ?>
            <script>
            Swal.fire(
            'Atención',
            'Usuario Bloquedo o Inactivo contacte al Adminsitrador',
            'info'
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
     ?>
     </body>
     </html>
     <?php

    }
 // ASIGNAR CONTRASEÑA EN EL PRIMER INICIO DE SESION
if(isset($_REQUEST['Guardar'])){

   
    require_once('../Model/M_conexion.php');
    $user = new Conexion();

    if($_REQUEST['contraseña1'] == $_REQUEST['contraseña2']){
        session_start();
       $usuario = $_SESSION['usuario'];
       $nuevaClave = $_REQUEST['contraseña1'];
       $error = "ninguno";
       $vcPassword = false;

        function validar_clave(&$cPassword,&$error,&$vcPassword){

                  if(strlen($cPassword) < 6){
                      
                    $error = "lenMin";
                    $vcPassword = false;
                    return ;
                  }
                  if(strlen($cPassword) > 20){
                      
                    $error = "lenMax";
                    $vcPassword = false;
                    return ;
                  }
                  if (!preg_match('`[a-z]`',$cPassword)){
                      
                    $error = "charMin";
                    $vcPassword = false;
                    return ;
                  }
                  if (!preg_match('`[A-Z]`',$cPassword)){
                     
                    $error = "charMay";
                    $vcPassword = false;
                    return ;
                  }
                  if (!preg_match('`[0-9]`',$cPassword)){
                      
                    $error = "charNum";
                    $vcPassword = false;
                    return ; 
                  }

                  $vcPassword = true;
                  return ; 
                  
               } 

             validar_clave($nuevaClave,$error,$vcPassword);

        if($vcPassword == true){

            $nuevaClave = password_hash($nuevaClave, PASSWORD_DEFAULT);  //ENCRIPTACION DE CONTRASEÑA CON BLOWFISH

            $user->asignarClave($nuevaClave,$usuario);
           
            header('refresh:1;url=../View/LoginUsuario.php');
            $error = "aceptable";
        }
       
    }
    else{

        $error = "coincide";
        
        }

    if(empty($_REQUEST['contraseña1']) || empty($_REQUEST['contraseña2'])){

        $error = "vacio";

    }    

    // ACTUALIZAR O MODIFICAR CONTRASEÑA
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
    
    switch($error){

        case "clave":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor ingrese una contraseña válida',
           'warning'
           )
           </script>
     <?php   break;
     case "lenMin":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'La clave no puede ser inferior a 6 caracteres',
        'warning'
        )
        </script>
  <?php   break;
  case "lenMax":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'La clave no puede ser mayor a 20 caracteres',
    'warning'
    )
    </script>
<?php   break;
case "charMin":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'La clave debe incluir al menos una Minúscula',
    'warning'
    )
    </script>
<?php   break;
case "charMay":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'La clave debe incluir al menos una Mayúscula',
    'warning'
    )
    </script>
<?php   break;
case "charNum":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'La contraseña debe incluir al menos un Número',
    'warning'
    )
    </script>
<?php   break;
     case "coincide":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique que las contraseñas coincidan',
        'warning'
        )
        </script>
     <?php   break;
     case "aceptable":
        ?>
        <script>
        Swal.fire(
        'Completado',
        'Se ha Asignado la Clave satisfactoriamente',
        'success'
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