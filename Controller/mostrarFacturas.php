<?php 

require_once('../Model/M_facturas.php');

$fact1 = new Factura();

//Selector de cantidad de registros por pagina
 
if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $fact1->inicializar($artxpag);
}else{
    $artxpag = 5;
    $fact1->inicializar($artxpag);
}

// combinatoria para filtros y busquedas

if(isset($_REQUEST['pago']) && $_REQUEST['pago'] != "" && isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != "" ){

    if($_REQUEST['ordenar'] == "maytomen"){

    $pago = $_REQUEST['pago'];
    $where = "WHERE tipoPagoNombre like '%$pago%'";
    $fact1->filtrar($where);
    $orderby = "ORDER BY facturaCostoTotal DESC";
    $fact1->ordenar($orderby);
    
    }else if($_REQUEST['ordenar'] == "mentomay"){

        $pago = $_REQUEST['pago'];
        $where = "WHERE tipoPagoNombre like '%$pago%'";
        $fact1->filtrar($where);
        $orderby = "ORDER BY facturaCostoTotal ASC";
        $fact1->ordenar($orderby);
        }
    
}else if(isset($_REQUEST['pago']) && $_REQUEST['pago'] != ""){

    $pago = $_REQUEST['pago'];
    $where = "WHERE tipoPagoNombre LIKE'$pago'";
    $fact1->filtrar($where);

}

else if (isset($_REQUEST['ordenar']) && isset($_REQUEST['id']) && $_REQUEST['ordenar'] == "" && $_REQUEST['id'] == "" && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] =="" ){

    $orderby = "ORDER BY facturaId DESC";
    $fact1->ordenar($orderby);
    $where = "";
    $fact1->filtrar($where);
}

else if(isset($_REQUEST['id']) && $_REQUEST['id']){

    $id = $_REQUEST['id'];
    $where = "WHERE facturaId = $id";
    $fact1->filtrar($where);
}
else if (isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != ""){

    if($_REQUEST['ordenar'] == "maytomen"){

        $orderby = "ORDER BY facturaCostoTotal DESC";
        $fact1->ordenar($orderby);
        $where = "";
        $fact1->filtrar($where);

    }
    else if($_REQUEST['ordenar'] == "mentomay"){

        $orderby = "ORDER BY facturaCostoTotal ASC";
        $fact1->ordenar($orderby);
        $where = "";
        $fact1->filtrar($where);
    }
    

}
else if(isset($_REQUEST['fechainicio']) && isset($_REQUEST['fechafin'])){

    if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != ""){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $where = "WHERE facturaFecha BETWEEN '$desde' AND '$hasta'";
    $fact1->filtrar($where);
    
    }else if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""){

    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999/01/01";
    $where = "WHERE facturaFecha BETWEEN '$desde' AND '$hasta'";
    $fact1->filtrar($where);
        
    } 
    else if($_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""){

    $desde =  "2022/01/01";
    $hasta =  $_REQUEST['fechafin'];
    $where = "WHERE facturaFecha BETWEEN '$desde' AND '$hasta'";
    $fact1->filtrar($where);
    }
    else{
    $where = "";
    $fact1->filtrar($where);
    }

}
else{ 

    $where = "";
    $fact1->filtrar($where);

    $orderby = "ORDER BY facturaId DESC";
        $fact1->ordenar($orderby);

}

// extraccion de los datos en la variable $regFacturas 

$regFacturas = $fact1->verFacturas();

$resultado = $fact1->contarRegistros($where);

$res = mysqli_fetch_array($resultado);
$cantidad = $res['cantidad'];
 
$registrosxpagina = $fact1->artporpag; 
 
?> 