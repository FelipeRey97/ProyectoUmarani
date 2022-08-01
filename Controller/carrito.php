<?php   
session_start();

require_once('../Model/M_carrito.php');

$sesionId= $_REQUEST['sesionId'];
$artId = $_REQUEST['artId'];
$Cant = $_REQUEST['Cant'];

$car1 = new Carrito ();

if(isset($_REQUEST['delete'])){

    $car1->borrarCarrito($artId,$sesionId);
    header("Location:" .$_SERVER['HTTP_REFERER']."");
}

if(isset($_REQUEST['Cant'])){

    $car1->AñadirCarrito($sesionId,$artId,$Cant);

header("location:" .$_SERVER['HTTP_REFERER']. "");
    
}

?>