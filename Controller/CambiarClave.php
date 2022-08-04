
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


if(isset($_REQUEST['actualizar'])){
   
   require_once('../Model/M_conexion.php');
   $user1 = new Conexion();

   $usuario = $_SESSION['usuario'];
   $claveActual = $_REQUEST['claveActual'];

   $consulta = $user1->validarUsuario($usuario,$claveActual);

   $filas = mysqli_fetch_array($consulta);

   if($filas){

       if(isset($_REQUEST['nuevaClave2']) && isset($_REQUEST['nuevaClave1']) && $_REQUEST['nuevaClave2'] == $_REQUEST['nuevaClave1']){
           
   
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

       $nuevaClave = $_REQUEST['nuevaClave2'];

       $vcPassword = validar_clave($nuevaClave);

           if($vcPassword == true){


            if($claveActual == $nuevaClave) {

                ?>
               <script>
               swal('Atención','La nueva Clave debe ser distinta a la Actual','info');
               </script>
               <?php 
                }
                else{
   
               $user1->asignarClave($nuevaClave,$usuario);
               ?>
               <script>
               swal('Operación Realizada','Se ha Asignado la contraseña','success');
               </script>
               <?php 
               header('refresh:1;url=../view/pedidos.php');
            }
           }
      
   }
       else{
   
           ?>
           <script>
               swal('Error','Las nuevas contraseñas no coinciden','warning');
           
           </script>
           <?php 
           }

   }
   else{

       ?>
       <script>
           swal('Error','La contraseña Actual es Incorrecta','warning');
       
       </script>
       <?php 

   }

    if(empty($_REQUEST['nuevaClave2']) || empty($_REQUEST['nuevaClave1']) || empty($_REQUEST['claveActual'])){

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

