<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>


<?php

require_once('../Model/M_Clientes.php');

$recuperarCliente = new Clientes();

//VALIDACION DEL FORMATO Y EXISTENCIA DEL MAIL PARA INICAR LA RECUPERACION

if(isset($_REQUEST['enviar'])){


    if(isset($_REQUEST['Rmail']) && filter_var($_REQUEST['Rmail'], FILTER_VALIDATE_EMAIL)){

        $Rmail = filter_var($_REQUEST['Rmail'], FILTER_SANITIZE_EMAIL);
        $Rmail = htmlentities($Rmail);

        $vRmail = true;

    }
    else{

        ?>
        <script>
            swal('Atención','Por favor verifique el formato del E-mail','warning');
        </script>
         <?php
         $vRmail = false;

    }
    if($vRmail == true){

        $validar_Email = $recuperarCliente->verificarEmail($Rmail);

        if($validar_Email == true){
           $_SESSION['Rmail'] = $Rmail;
            $V_cliente = True;

        }
        else{
            
            ?>
        <script>
            swal('Atención','El E-mail ingresado no está registrado','warning');
        </script>
         <?php

        }

    }

    if(empty($_REQUEST['Rmail'])){
        ?>

        <script>
            swal('Atención','Por favor complete todos los campos','warning');
        </script>

  <?php

    }



}

//UNA VEZ VALIDADO EL MAIL SE VERIFICA LA NUEVA CONTRASEÑA

if(isset($_REQUEST['recuperar'])){

    $Rmail = $_SESSION['Rmail'];

    if(isset($_REQUEST['Rclave1']) && isset($_REQUEST['Rclave2']) && $_REQUEST['Rclave1'] == $_REQUEST['Rclave2']){

        $Rclave = htmlentities($_REQUEST['Rclave1']);

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
    
         $vcPassword = validar_clave($Rclave);

         if($vcPassword == true){

           $datos = $recuperarCliente->DetalleCliente($Rmail);

            $filas = mysqli_fetch_array($datos);

            $claveActual = $filas['clienteContraseña'];

            if($claveActual == $Rclave) {

                ?>
               <script>
               swal('Atención','La nueva Clave debe ser distinta a la Actual','info');
               </script>
               <?php 
                }
                else{
   
               $recuperarCliente->recuperarClave($Rclave,$Rmail);
               ?>
               <script>
               swal('Operación Realizada','Se ha Recuperado la contraseña','success');
               </script>
               <?php 
               header('refresh:1;url=../View/iniciarSesion.php');
            }

           }

    }
    else{

        ?>
        <script>
            swal('Atención','Las contraseñas no Coinciden','warning');
        </script>
       <?php

    }

    if(empty($_REQUEST['Rclave1']) || empty($_REQUEST['Rclave2'])){

        ?>
        <script>
            swal('Atención','Por favor complete todos los campos','warning');
        </script>
       <?php

    }



}

?>
    
</body>
</html>

