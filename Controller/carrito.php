<?php   


require_once('../Model/M_carrito.php');

$car1 = new Carrito ();

if(isset($_REQUEST['Cant'])){

$sesionId= $_REQUEST['sesionId'];
$artId = $_REQUEST['artId'];
$Cant = $_REQUEST['Cant'];

}

if(isset($_REQUEST['delete'])){

    $sesionId= $_REQUEST['sesionId'];
    $artId = $_REQUEST['artId'];
    $car1->borrarCarrito($artId,$sesionId);
    header("Location:" .$_SERVER['HTTP_REFERER']."");
}

if(isset($_REQUEST['Cant'])){

    $car1->AñadirCarrito($sesionId,$artId,$Cant);
    header("location:" .$_SERVER['HTTP_REFERER']. "");
    
}

$datos = $car1->mostrarCarrito($sesionId);

?>