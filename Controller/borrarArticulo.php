
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
require_once('../Model/M_Productos4.php');

$artId= $_REQUEST['aId'];

$prod3 = new Producto();

    $prod3->borrarProducto($artId);

    $prod3->cerrarConexion();
    
      
?>
</body>
</html>