
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
// controlador para crear usuario, se añaden condiciones para evitar campos vacios y controlar los formularios

$con = new Conexion();


if($_REQUEST['unombre'] != "" && $_REQUEST['uapellido'] != "" && $_REQUEST['udocumento'] != "" && $_REQUEST['ucontraseña'] != ""
&& $_REQUEST['uestado'] != "" && $_REQUEST['urol'] != ""){

   $unombre =  $_REQUEST['unombre'];
   $uapellido =  $_REQUEST['uapellido'];
   $udocumento =  $_REQUEST['udocumento'];
   $ucontraseña =  $_REQUEST['ucontraseña'];
   $uestado =  $_REQUEST['uestado'];
   $urol = $_REQUEST['urol'];
   
   $con->insertarUsuario($unombre,$uapellido,$udocumento,$ucontraseña,$uestado,$urol);
      ?>
      <script>
         swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
         
      </script>

      <?php

      header("refresh:1;url=../View/Usuarios.php");
      
}
else{
   
   ?>
   <script>
   swal("Atención", "Por favor complete todos los campos", "warning");
   </script>
   <?php
   
}



$con->cerrarConexion();
require('../View/nuevoUsuario.php');

?>
   
</body>
</html>



