<?php

    require('../Model/M_Clientes.php');

    $cliente2  = new Clientes();

    $clients = $cliente2->verCliente();

    

// se almacenan los datos de la funcion verCliente() que contiene select en la variable $usuarios

?>