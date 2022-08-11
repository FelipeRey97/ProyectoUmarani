
<?php

 $arId = $_REQUEST['arId'];

require('../Model/M_Productos4.php');


$art = new Producto();

$detalleProducto = $art->DetalleArticulo($arId);

while ($det = mysqli_fetch_array($detalleProducto)){

    $artNombre = $det['artNombre'];
    $artPrecio = $det['artPrecio'];
    $artVista = $det['artVista'];
    $artCantidad = $det['artCantidad'];
    $artEstado = $det['artEstado'];
    $artId = $det['artId'];
    $artCat = $det['categoriaNombre'];

}

 
    

 



?>