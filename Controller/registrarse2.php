<?php
    
    require_once('../Model/M_Clientes.php');
      
        $cliente1 = new Clientes;

        if(isset($_REQUEST['Registrarse'])){
            

            if(isset($_REQUEST['cNombre']) && $_REQUEST['cNombre'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cNombre'])){

                $cNombre = htmlentities($_REQUEST['cNombre']);
                $cNombre = strtoupper($cNombre);
                $vcNombre = true;
            }else{
                $error = "nombre";
                $vcNombre = false;
               
            }if(isset($_REQUEST['cApellido']) && $_REQUEST['cApellido'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cApellido'])){

                $cApellido =  htmlentities($_REQUEST['cApellido']);
                $cApellido = strtoupper($cApellido);
                $vcApellido = true;
                
            }
            else{
                $error = "apellido";
                $vcApellido = false;
               
                
            }
            if(isset($_REQUEST['cClave'])){
                
                $cPassword =  $_REQUEST['cClave'];
                $vcPassword = false;
                $error = "incierto";

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
  
               validar_clave($cPassword,$error,$vcPassword);
                       
            }else{
                $error = "clave";
                $vcPassword = false;
            }if(isset($_REQUEST['cMail']) && $_REQUEST['cMail'] !="" && filter_var($_REQUEST['cMail'], FILTER_VALIDATE_EMAIL)){

                $sanitized_Mail =  htmlentities($_REQUEST['cMail']);
                $sanitized_Mail = filter_var($sanitized_Mail, FILTER_SANITIZE_EMAIL);
                $mail = $sanitized_Mail;
                $existe_Email = $cliente1->verificarEmail($mail);
                if($existe_Email == true){
                    
                    $vsanitized_Mail = false;
                    $error = "existe";
                }else{

                    $vsanitized_Mail = true;
                    $cMail = $mail;
                }
                
            }
            else{

                $error = "mail";
                echo "error mial";
                $vsanitized_Mail = false;
                
            }
            if(isset($_REQUEST['terminos'])){

                $terminos = true;

            }else{
              
                $terminos = false;
                $error = "terminos";
            }

            if($terminos == true && $vcPassword == true && $vcNombre == true && $vcApellido == true && $vsanitized_Mail == true && $vcPassword == true){
                $_SESSION['cMail'] =  $sanitized_Mail;
                $cPassword = password_hash($cPassword, PASSWORD_DEFAULT);
            $cliente1->insertarCliente($cNombre,$cApellido,$cMail,$cPassword);
            $cliente1->cerrarConexion();
            
            
            if($_REQUEST['compra'] == 1){
            $valor = 1;
            header("refresh:1;url=../View/DatosFacturacion.php?valor=$valor");
            }
            else{

            header("refresh:1;url=../View/areaCliente.php?valor=0");
            }
            $error = "aceptable";
            }

            else if(empty($_REQUEST['cNombre']) || empty($_REQUEST['cApellido']) && empty($_REQUEST['cMail']) && empty($_REQUEST['cPassword'])){

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
            'El E-mail ya está registrado',
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
        case "nombre":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el nombre',
           'warning'
           )
           </script>
        <?php   break;
        case "apellido":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el apellido',
           'warning'
           )
           </script>
        <?php   break;
          case "terminos":
            ?>
            <script>
            Swal.fire(
            'Atención',
            'Para continuar debe aceptar los términos y condiciones',
            'warning'
            )
            </script>
         <?php   break;
        case "aceptable":
           ?>
           <script>
           Swal.fire(
           'Completado',
           'Te has Registrado correctamente',
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
    $cliente1->cerrarConexion();
?>
</body>
</html>