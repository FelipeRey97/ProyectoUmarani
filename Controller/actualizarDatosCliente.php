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

require('../Model/M_Clientes.php');


$cliente2 = new Clientes();

    //control para actualizacion de usuario, se añaden condiciones para controlar los formularios

    if($_REQUEST['cNombre'] != "" && $_REQUEST['cApellido'] != "" && $_REQUEST['cClave'] != ""){

   $cNombre =  $_REQUEST['cNombre'];
   $cApellido =  $_REQUEST['cApellido'];
   $cClave =  $_REQUEST['cClave'];
   $cTelefono =  $_REQUEST['cTelefono'];
   
   $cliente2->actualizarCliente($cNombre,$cApellido,$cClave,$cTelefono);
      ?>
      <script>
         swal("Operación Realizada", "Se han guardado los cambios Satisfactoriamente!", "success");
         
      </script>

      <?php

      header("refresh:1;url=../View/areaCliente.php");

      
}
else{
   
   ?>
   <script>
   swal("Atención", "Por favor complete todos los campos", "warning");
   </script>
   <?php
   
}

?>
</body>
</html>