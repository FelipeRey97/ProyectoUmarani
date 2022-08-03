<?php

require_once('../Model/M_Pedidos.php');
require_once('../Model/M_art_ped_factura.php');

$mail = $_SESSION['cMail'];

        $pedidoCliente = new Pedido();

        $registroPedido = $pedidoCliente->mostrarPedidosCliente($mail);

        $artpedCliente = new articuloPorPedido();
        


?> 