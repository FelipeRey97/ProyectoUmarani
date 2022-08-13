<?php
 
require_once("../Model/M_Pedidos.php");
require_once("../Model/M_Departamentos.php");

$ped2 = new Pedido(); 

if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $ped2->inicializar($artxpag);
}else{
    $artxpag = 5;
    $ped2->inicializar($artxpag);
}

// Combinatoria de filtros y Busquedas


if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] !=""){
    $estado = $_REQUEST['estado'];

    if($_REQUEST['ordenar'] == "maytomen"){
        $where = "WHERE pedidoEstado like '%$estado%'";
        $ped2->filtrar($where);
        $orderby = "ORDER BY pedidoCostoTotal DESC";
        $ped2->ordenar($orderby);

    }
    else if($_REQUEST['ordenar'] == "mentomay"){
        $where = "WHERE pedidoEstado like '%$estado%'";
        $ped2->filtrar($where);
        $orderby = "ORDER BY pedidoCostoTotal ASC";
        $ped2->ordenar($orderby);
        
    }
    else if($_REQUEST['ordenar'] == 'antiguos'){

        $where = "WHERE pedidoEstado like '%$estado%'";
        $ped2->filtrar($where);
        $orderby = "ORDER BY pedidoId ASC";
        $ped2->ordenar($orderby);
        

    }
    else if($_REQUEST['ordenar'] == 'recientes'){

        $where = "WHERE pedidoEstado like '%$estado%'";
        $ped2->filtrar($where);
        $orderby = "ORDER BY pedidoId DESC";
        $ped2->ordenar($orderby);
        

    }


}

else if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] !="" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""  ){

    $dpto = $_REQUEST['dpto'];
    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-12-31";
    $where ="WHERE direccionDep = '$dpto' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);

}
else if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] !="" && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""  ){

    $dpto = $_REQUEST['dpto'];
    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-12-31";
    $where ="WHERE ddireccionDep = '$dpto' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);

}
else if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] !="" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != ""  ){

    $dpto = $_REQUEST['dpto'];
    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-12-31";
    $where ="WHERE direccionDep = '$dpto' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);

}

else if(isset($_REQUEST['estado']) && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != ""  ){

    $estado = $_REQUEST['estado'];
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $where ="WHERE pedidoEstado like '%$estado%' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);

}
else if(isset($_REQUEST['estado']) && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""  ){

    $estado = $_REQUEST['estado'];
    $desde = "2022-01-01";
    $hasta = $_REQUEST['fechafin'];
    $where ="WHERE pedidoEstado like '%$estado%' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);

}
else if(isset($_REQUEST['estado']) && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""  ){

    $estado = $_REQUEST['estado'];
    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-12-31";
    $where ="WHERE direccionDep like '%$estado%' AND pedidoFechaInicio BETWEEN '$desde' AND '$hasta' ";
    $ped2->filtrar($where);
    
    }

 
else if(isset($_REQUEST['estado']) && isset($_REQUEST['dpto']) && $_REQUEST['dpto'] != "" && $_REQUEST['estado'] != ""){

    $dpto = $_REQUEST['dpto'];
    $estado = $_REQUEST['estado'];
    $where = "WHERE pedidoEstado like '%$estado%' AND direccionDep like '%$dpto%'";
    $ped2->filtrar($where);

}
else if (isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] == "" && $_REQUEST['estado'] == "" && $_REQUEST['id'] == "" && $_REQUEST['dpto'] == "" && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] =="" ){

    $orderby = "ORDER BY pedidoId DESC";
    $ped2->ordenar($orderby);
    $where = "";
    $ped2->filtrar($where);
}
else if (isset($_REQUEST['id']) && $_REQUEST['id'] != ""){

    $id = $_REQUEST['id'];
    $where = "WHERE pedidoId = $id";
    $ped2->filtrar($where);

}
else if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] != "" ){

    $dpto = $_REQUEST['dpto'];
    $where = "WHERE direccionDep like '%$dpto%'";
    $ped2->filtrar($where);
   
   }
   else if (isset($_REQUEST['estado']) && $_REQUEST['estado']){
   
       $estado = $_REQUEST['estado'];
       $where = "WHERE pedidoEstado like '%$estado%'";
       $ped2->filtrar($where);
   }
   
else if (isset($_REQUEST['ordenar']) && $_REQUEST['ordenar'] != ""){

    if($_REQUEST['ordenar'] == "maytomen"){

        $orderby = "ORDER BY pedidoCostoTotal DESC";
        $ped2->ordenar($orderby);
        $where = "";
        $ped2->filtrar($where);

    }
    else if($_REQUEST['ordenar'] == "mentomay"){

        $orderby = "ORDER BY pedidoCostoTotal ASC";
        $ped2->ordenar($orderby);
        $where = "";
        $ped2->filtrar($where);
    }
    else if($_REQUEST['ordenar'] == 'antiguos'){

        $orderby = "ORDER BY pedidoId ASC";
        $ped2->ordenar($orderby);
        $where = "";
        $ped2->filtrar($where);

    }
    else if($_REQUEST['ordenar'] == 'recientes'){

        $orderby = "ORDER BY pedidoId DESC";
        $ped2->ordenar($orderby);
        $where = "";
        $ped2->filtrar($where);

    }


}

else if(isset($_REQUEST['fechainicio']) && isset($_REQUEST['fechafin'])){

    if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != ""){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $where = "WHERE pedidoFechaInicio BETWEEN '$desde' AND '$hasta'";
    $ped2->filtrar($where);
    
    }else if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""){

    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999/01/01";
    $where = "WHERE pedidoFechaInicio BETWEEN '$desde' AND '$hasta'";
    $ped2->filtrar($where);
        
    } 
    else if($_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""){

    $desde =  "2022/01/01";
    $hasta =  $_REQUEST['fechafin'];
    $where = "WHERE pedidoFechaInicio BETWEEN '$desde' AND '$hasta'";
    $ped2->filtrar($where);
    }
    else{
    $where = "";
    $ped2->filtrar($where);
    
    }
}




else {

$where = "";
$ped2->filtrar($where);
$orderby = "ORDER BY pedidoId DESC";
$ped2->ordenar($orderby);

}


$registros = $ped2->verPedido();


$resultado = $ped2->contarRegistros($where);

$res = mysqli_fetch_array($resultado);

$cantidad = $res['cantidad'];

$dpto1 = new DPTO();
$fila = $dpto1->mostrarDpto(); 

$registrosxpagina = $ped2->artporpag;
 
?>