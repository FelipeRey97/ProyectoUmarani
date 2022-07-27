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

 
$cliente2 = new Clientes();

    //control para actualizacion de usuario, se añaden condiciones para controlar los formularios


      if(isset($_REQUEST['guardar'])){
          

          if(isset($_REQUEST['cNombre']) && $_REQUEST['cNombre'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cNombre'])){

              $cNombre = htmlentities($_REQUEST['cNombre']);
              $cNombre = strtoupper($cNombre);
              $vcNombre = true;
          }else{
              
              $vcNombre = false;
              ?>
              <script>
              swal("Atención", "Por favor verifique el nombre", "warning");
              </script>
              <?php
          }if(isset($_REQUEST['cApellido']) && $_REQUEST['cApellido'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cApellido'])){

              $cApellido =  htmlentities($_REQUEST['cApellido']);
              $cApellido = strtoupper($cApellido);
              $vcApellido = true;
              
          }
          else{
             
              $vcApellido = false;
              ?>
              <script>
              swal("Atención", "Por favor verifique el apellido", "warning");
              </script>
              <?php
              
          }
          if(isset($_REQUEST['cClave'])){
              
              $cPassword =  $_REQUEST['cClave'];

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

               $vcPassword = validar_clave($cPassword);
                     
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
            
          }

          if($vTelefono == true && $vcPassword == true && $vcNombre == true && $vcApellido == true && $vcPassword == true){

            $cliente2->actualizarCliente($cNombre,$cApellido,$cPassword,$cTelefono);
            ?>
            <script>
               swal("Operación Realizada", "Se han guardado los cambios Satisfactoriamente!", "success");
               
            </script>

            <?php

            header("refresh:10;url=../View/areaCliente.php");

          }

          else if(empty($_REQUEST['cNombre']) || empty($_REQUEST['cApellido']) && empty($_REQUEST['cMail']) && empty($_REQUEST['cPassword'])){

              ?>
              <script>
              swal("Atención", "Por favor complete todos los campos", "warning");
              </script>
              <?php
              
              }

      } 

?>
</body>
</html>