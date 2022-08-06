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


// VALIDAR INICIO DE SESIÓN DEL USUARIO
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
                    ?>
                    <script>
                        swal('Atención','El usuario se encuentra Inactivo o Bloqueado','info');
                    </script>
                <?php 
                }

                if ($filas['usuarioEstado'] == "Activo"){

                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['nombre'] = $filas['usuarioNombre'];
                    $_SESSION['doc'] = $filas['usuarioDoc'];
                    $_SESSION['apellido'] = $filas['usuarioApellido'];
                    $_SESSION['rol'] = $filas['rolNombre'];
                    $_SESSION['usuarioId'] = $filas['usuarioId'];

                    header("Location: ../view/pedidos.php?pagina=1");
                }
            }
            else if($v_password == false){
                ?>
                    <script>
                        swal('Error','Usuario o contraseña Erroneos','warning');
                    
                    </script>
                <?php 
            }
            
        }
        
        
    }
    

}

 // ASIGNAR CONTRASEÑA EN EL PRIMER INICIO DE SESION
if(isset($_REQUEST['Guardar'])){

   
    require_once('../Model/M_conexion.php');
    $user = new Conexion();

    if($_REQUEST['contraseña1'] == $_REQUEST['contraseña2']){
        session_start();
       $usuario = $_SESSION['usuario'];
       $nuevaClave = $_REQUEST['contraseña1'];

       function validar_clave($cPassword){

        if(strlen($cPassword) < 6){
            // echo strlen($cPassword);
            ?>
            <script>
            swal("Atención", "La clave debe ser mayor a 6 caracteres", "info");
            </script>
            <?php
           return false;
        }
        if(strlen($cPassword) > 10){
            ?>
            <script>
            swal("Atención", "La clave no puede tener más de 10 caracteres", "info");
            </script>
            <?php
           return false;
        }
        if (!preg_match('`[a-z]`',$cPassword)){
            ?>
            <script>
            swal("Atención", "La clave debe tener al menos una letra minúscula", "info");
            </script>
            <?php
           return false;
        }
        if (!preg_match('`[A-Z]`',$cPassword)){
           ?>
            <script>
            swal("Atención", "La clave debe tener al menos una letra mayúscula", "info");
            </script>
            <?php
           return false;
        }
        if (!preg_match('`[0-9]`',$cPassword)){
            ?>
            <script>
            swal("Atención", "La clave debe tener al menos un caracter numérico", "info");
            </script>
            <?php
           return false;
        }
        return true;
     } 

     $vcPassword = validar_clave($nuevaClave);

        if($vcPassword == true){

            $nuevaClave = password_hash($nuevaClave, PASSWORD_DEFAULT);  //ENCRIPTACION DE CONTRASEÑA CON BLOWFISH

            $user->asignarClave($nuevaClave,$usuario);
            ?>
            <script>
            swal('Operación Realizada','Se ha Asignado la contraseña','success');
            </script>
            <?php 
            header('refresh:1;url=../view/loginUsuario.php');
        }
       
    }
    else{

        ?>
        <script>
            swal('Error','Las contraseñas no coinciden','warning');
        
        </script>
        <?php 
        }

    if(empty($_REQUEST['contraseña1']) || empty($_REQUEST['contraseña2'])){

        ?>
        <script>
            swal('Atención','Por favor complete todos los campos','warning');
        
        </script>
        <?php 

    }    
    }

    // ACTUALIZAR O MODIFICAR CONTRASEÑA

    



?>




</body>
</html>
