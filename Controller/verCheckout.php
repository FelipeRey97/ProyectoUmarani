<?php

    require_once('../Model/M_carrito.php');

    $checkCar = new Carrito ();

    $checkout = $checkCar->mostrarCarrito($sesionId);
  
   
?>