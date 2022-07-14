
<?php

 $arId = $_REQUEST['arId'];

require('../Model/M_Productos4.php');


$detalleProducto = mysqli_query($conexion1,"select * from articulo where artId = '$arId' ") 
or die ("problemas en el select" . mysqli_error($conexion1));

while ($det = mysqli_fetch_array($detalleProducto)){

    $artNombre = $det['artNombre'];
    $artPrecio = $det['artPrecio'];
    $artVista = $det['artVista'];
    $artCantidad = $det['artCantidad'];
    $artEstado = $det['artEstado'];
    $artId = $det['artId'];

}

 
    





?>