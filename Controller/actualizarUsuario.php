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

   $unombre =  $_REQUEST['unombre'];
   $uapellido =  $_REQUEST['uapellido'];
   $ucontraseña =  $_REQUEST['ucontraseña'];
   $uestado =  $_REQUEST['uestado'];
   $urol = $_REQUEST['urol'];
   $usuarioId= $_REQUEST['tabla'];
   
   $con2->actualizarUsuario($unombre,$uapellido,$ucontraseña,$uestado,$urol,$usuarioId);
      ?>
      <script>
         swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
         
      </script>

      <?php

      header("refresh:1;url=../View/Usuarios.php?pagina=1");

      
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






