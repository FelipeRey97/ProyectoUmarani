<?php

require('../Model/M_adminClientes.php');

$listarCliente = new Clientes();

if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $listarCliente->inicializar($artxpag);
}else{
    $artxpag = 5;
    $listarCliente->inicializar($artxpag);
}

// Combinatoria para filtros y Búsquedas

if(isset($_REQUEST['criterio']) && $_REQUEST['criterio'] != "" && isset($_REQUEST['textbox']) && $_REQUEST['textbox'] != ""){

    if($_REQUEST['criterio'] == 'id' && is_numeric($_REQUEST['textbox'])){
    
        $id = $_REQUEST['textbox'];
        $where = "WHERE clienteId = $id";
        $listarCliente->filtrar($where);
    }
    else if ($_REQUEST['criterio'] == "nombre" && is_string($_REQUEST['textbox'])){

        $nombre = $_REQUEST['textbox'];
        $where = "WHERE clienteNombre like '%$nombre%' OR clienteApellido like '%$nombre%'";
        $listarCliente->filtrar($where);
    }
    else if ($_REQUEST['criterio'] == "correo" && is_string($_REQUEST['textbox'])){

        $correo = $_REQUEST['textbox'];
        $where = "WHERE clienteEmail like '%$correo%'";
        $listarCliente->filtrar($where);
    }
    else if ($_REQUEST['criterio'] == "telefono" && is_numeric( $_REQUEST['textbox'])){


        $telefono = $_REQUEST['textbox'];
        $where = "WHERE clienteTelefono like '%$telefono%'";
        $listarCliente->filtrar($where);
    }
    else{

        $where = "";
        $listarCliente->filtrar($where);

    }

}
else{

 $where = "";
 $listarCliente->filtrar($where);

}


$registros= $listarCliente->verCliente();

$resultado = mysqli_query($conexionClientes,"SELECT COUNT(*) AS cantidad FROM cliente
$where")
    or die("problemas en el select" . mysqli_error($conexionClientes));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];

$registrosxpagina = $listarCliente->artporpag;

?> 