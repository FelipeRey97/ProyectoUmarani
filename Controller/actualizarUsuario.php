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

require('../Model/M_conexion.php');


$con2 = new Conexion();

    //control para actualizacion de usuario, se añaden condiciones para controlar los formularios

    if($_REQUEST['unombre'] != "" && $_REQUEST['uapellido'] != "" && $_REQUEST['ucontraseña'] != ""
    && $_REQUEST['uestado'] != "" && $_REQUEST['urol'] != ""){

   if(!is_numeric($_REQUEST['unombre']) && !is_numeric(['uapellido']) && strlen($_REQUEST['ucontraseña'] > 6) && !is_numeric($_REQUEST['uestado']) && is_numeric($_REQUEST['urol'])){

    $con2->actualizarUsuario();
      ?>
      <script>
         swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
      </script>
      <?php

   }
   else{
   
      ?>
      <script>
      swal("Atención", "Por favor Verifique los campos", "warning");
      </script>
      <?php
      
   }
   
}
else{
   
   ?>
   <script>
   swal("Atención", "Por favor complete todos los campos", "warning");
   </script>
   <?php
   
}


    $con2->cerrarConexion();

require('../View/DetalleUsuario.php');

?>
</body>
</html>






