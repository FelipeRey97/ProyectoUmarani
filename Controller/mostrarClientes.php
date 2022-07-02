<?php

require('../Model/M_adminClientes.php');

$listarCliente = new Clientes();

$registros= $listarCliente->verCliente();

$resultado = mysqli_query($conexionClientes,"SELECT COUNT(*) AS cantidad FROM usuariotienda")
    or die("problemas en el select" . mysqli_error($conexionClientes));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];


?>