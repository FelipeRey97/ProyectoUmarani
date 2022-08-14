<?php


if(isset($_REQUEST['actualizar'])){
   
   require_once('../Model/M_conexion.php');
   $user1 = new Conexion();

   $usuario = $_SESSION['usuario'];
   $claveActual = $_REQUEST['claveActual'];

   $consulta = $user1->validarUsuario($usuario);

   $filas = mysqli_fetch_array($consulta);

   if($filas){

       if(isset($_REQUEST['nuevaClave2']) && isset($_REQUEST['nuevaClave1']) && $_REQUEST['nuevaClave2'] == $_REQUEST['nuevaClave1']){
           
   
        $nuevaClave = $_REQUEST['nuevaClave2'];
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


           if($vcPassword == true){  // COMPROBACION DE CLAVE ACTUAL IGUAL A NUEVA CLAVE.

              $v_existeClave = password_verify($nuevaClave, $filas['usuarioContraseña']);

            if($v_existeClave == true) {

                    $error = "repetida";
                }
                else{
                    
                    $nuevaClave = password_hash($nuevaClave, PASSWORD_DEFAULT);
               $user1->asignarClave($nuevaClave,$usuario);
               $error = "aceptable";
               header('refresh:1;url=../View/pedidos.php');
            }
           }
       
   }
       else{
        
        $error = "Nocoincide";
           
           }

   }
   else{

    $error = "usuario";
       

   }

    if(empty($_REQUEST['nuevaClave2']) || empty($_REQUEST['nuevaClave1']) || empty($_REQUEST['claveActual'])){

        $error = "vacio";

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

        case "Nocoincide":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Las Contraseñas nueva no coincide',
           'warning'
           )
           </script>
        <?php   break;
        case "usuario":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'El usuario no es válido',
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
     case "repetida":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'La Clave nueva no puede ser igual a la actual',
        'error'
        )
        </script>
     <?php   break;
     case "aceptable":
        ?>
        <script>
        Swal.fire(
        'Completado',
        'Se han guardado los cambios satisfactoriamente',
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