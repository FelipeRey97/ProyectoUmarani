<?php

require_once('../Model/M_Clientes.php');

$recuperarCliente = new Clientes();

//VALIDACION DEL FORMATO Y EXISTENCIA DEL MAIL PARA INICAR LA RECUPERACION

if(isset($_REQUEST['enviar'])){

 $error = "default";
    if(isset($_REQUEST['Rmail']) && filter_var($_REQUEST['Rmail'], FILTER_VALIDATE_EMAIL)){

        $Rmail = filter_var($_REQUEST['Rmail'], FILTER_SANITIZE_EMAIL);
        $Rmail = htmlentities($Rmail);

        $vRmail = true;

    }
    else{

        $error = "mail";
         $vRmail = false;

    }
    if($vRmail == true){

        $validar_Email = $recuperarCliente->verificarEmail($Rmail);

        if($validar_Email == true){
           $_SESSION['Rmail'] = $Rmail;
            $V_cliente = True;

        }
        else{
            
            $error = "existe";

        }

    }

    if(empty($_REQUEST['Rmail'])){
       
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
    
            case "existe":
                ?>
                <script>
                Swal.fire(
                'Atención',
                'El E-mail no está registrado',
                'error'
                )
                </script>
          <?php   break;
          case "mail":
            ?>
            <script>
            Swal.fire(
            'Atención',
            'Por favor verifique el E-mail',
            'warning'
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

//UNA VEZ VALIDADO EL MAIL SE VERIFICA LA NUEVA CONTRASEÑA

if(isset($_REQUEST['recuperar'])){

    $Rmail = $_SESSION['Rmail'];

    if(isset($_REQUEST['Rclave1']) && isset($_REQUEST['Rclave2']) && $_REQUEST['Rclave1'] == $_REQUEST['Rclave2']){

        $Rclave = htmlentities($_REQUEST['Rclave1']);
        $error = "incierto";
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

       validar_clave($Rclave,$error,$vcPassword);

         if($vcPassword == true){

           $datos = $recuperarCliente->DetalleCliente($Rmail);

            $filas = mysqli_fetch_array($datos);

            $claveActual = password_verify($Rclave, $filas['clienteContraseña']);

            if($claveActual == true) {

                $error = "actual";
                }
                else{
                    
               $Encript_clave = password_hash($Rclave, PASSWORD_DEFAULT);
               $recuperarCliente->recuperarClave($Encript_clave,$Rmail);
               session_abort();
               
               header('refresh:1;url=../View/iniciarSesion.php');
               $error = "aceptable";
            }

           }

    }
    else{

       $error = "coinciden";

    }

    if(empty($_REQUEST['Rclave1']) || empty($_REQUEST['Rclave2'])){

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

        case "coinciden":
            ?>
            <script>
            Swal.fire(
            'Atención',
            'Las nuevas contraseñas no coinciden',
            'error'
            )
            </script>
      <?php   break;
      case "actual":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'La nueva contraseña no puede ser igual a la anterior',
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
       
        case "aceptable":
           ?>
           <script>
           Swal.fire(
           'Completado',
           'Has asignado nueva Clave correctamente',
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

   
?>
</body>
</html>
<?php
}
?>