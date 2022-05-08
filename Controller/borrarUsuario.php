
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
require_once('../Model/M_conexion.php');

$con3 = new Conexion();

    $con3->borrarUsuario();

    $con3->cerrarConexion();
    
      
?>
</body>
</html>



