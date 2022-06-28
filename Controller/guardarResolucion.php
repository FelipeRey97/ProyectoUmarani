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

require_once('../Model/M_resolucion.php');

$id = $_REQUEST['pqrsId'];
$usuarioId = $_REQUEST['usuarioId'];
$mensaje = $_REQUEST['respuesta'];
$fecha = $_REQUEST['date'];

$pqrsId = $id;

if(isset($id) && isset($usuarioId) && isset($usuarioId) && isset($mensaje) && isset($fecha)){

mysqli_query($conexion,"INSERT INTO resolucion (resolucionId,resolucionUsuarioId,resolucionpqrsId,resolucionMensaje,resolucionFecha)
VALUES($id,$usuarioId,$pqrsId,'$mensaje','$fecha')")
or die ("problemas en el select" . mysqli_error($conexion));

mysqli_query($conexion,"UPDATE pqrs SET pqrsEstado = 'Atendida' 
WHERE pqrsId = $id") 
or die ("problemas en el update" . mysqli_error($conexion));

?>
    <script>
    
    swal("Correcto", "Se ha guardado la respuesta Satisfactoriamente!", "success", {
        button: "Ok!",
      });

    
    </script>
   <?php

      header("refresh:2;url=http://localhost/umaraniweb/View/PQRS.php");
}
else{

    ?>
    <script>
    
    swal("Faltan datos por Completar", "Por Favor Complete Todos los Datos", "warning", {
        button: "Ok!",
      });

    
    </script>
   <?php
   include('../View/GestionPqrs.php');
}


?>


</body>
</html>

