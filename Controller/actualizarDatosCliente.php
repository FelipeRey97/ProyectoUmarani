<?php  
 
require_once('../Model/M_Clientes.php');

 
$cliente2 = new Clientes();

    //control para actualizacion de usuario, se añaden condiciones para controlar los formularios


      if(isset($_REQUEST['guardar'])){
          

          if(isset($_REQUEST['cNombre']) && $_REQUEST['cNombre'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cNombre'])){

              $cNombre = htmlentities($_REQUEST['cNombre']);
              $cNombre = strtoupper($cNombre);
              $vcNombre = true;
          }else{
              
              $vcNombre = false;
              $error = "nombre";
          }if(isset($_REQUEST['cApellido']) && $_REQUEST['cApellido'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cApellido'])){

              $cApellido =  htmlentities($_REQUEST['cApellido']);
              $cApellido = strtoupper($cApellido);
              $vcApellido = true;
              
          }
          else{
             
              $vcApellido = false;
              $error = "apellido";
              
          }
          if(isset($_REQUEST['cClave'])){
              
              $cPassword =  $_REQUEST['cClave'];
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

             validar_clave($cPassword,$error,$vcPassword);
                     
          }else{
              
              $vcPassword = false;
          }
          if(isset($_REQUEST['cTelefono']) && $_REQUEST['cTelefono'] != "" && preg_match("/^[0-9]{10,10}$/",$_REQUEST['cTelefono'])){

            $cTelefono = htmlentities($_REQUEST['cTelefono']);
            $vTelefono = true;
           
          }
          else if(empty($_REQUEST['cTelefono'])){

            $vTelefono = true;
            $cTelefono = "";
          }
          else if(isset($_REQUEST['cTelefono']) && $_REQUEST['cTelefono'] != "" && !preg_match("/^[0-9]{10,10}$/",$_REQUEST['cTelefono'])){

            $vTelefono = false;
            $error = "telefono";
          }

          if($vTelefono == true && $vcPassword == true && $vcNombre == true && $vcApellido == true && $vcPassword == true){
            $error = "aceptable";
            $cliente2->actualizarCliente($cNombre,$cApellido,$cPassword,$cTelefono);
            

            header("refresh:1;url=../View/areaCliente.php");

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

        case "nombre":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Nombre',
           'warning'
           )
           </script>
        <?php   break;
        case "apellido":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Apellido',
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
     case "telefono":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique el telefono',
        'warning'
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