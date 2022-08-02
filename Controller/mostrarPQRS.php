<?php

require_once('../Model/M_PQRS.php');

$pq1 = new PQRS();

 //selector de cantidad de articulos por pagina

if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $pq1->inicializar($artxpag);
}else{
    $artxpag = 5;
    $pq1->inicializar($artxpag);
}

// combinatoria de filtros y busquedas

if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != "" && $_REQUEST['tipo'] != "" ){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $estado = $_REQUEST['estado'];
    $tipo = $_REQUEST['tipo'];
    $where = "WHERE pqrsEstado like '%$estado%' AND pqrsTipoNombre like '%$tipo%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
}  

else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != "" ){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $estado = $_REQUEST['estado'];
    $where = "WHERE pqrsEstado like '%$estado%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
}  

else if(isset($_REQUEST['tipo']) && $_REQUEST['tipo'] != "" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != "" ){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $tipo = $_REQUEST['tipo'];
    $where = "WHERE pqrsTipoNombre like '%$tipo%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
} 
else if(isset($_REQUEST['tipo']) && $_REQUEST['tipo'] != "" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""){

    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-01-01";
    $tipo = $_REQUEST['tipo'];
    $where = "WHERE pqrsTipoNombre like '%$tipo%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
        
    } 
else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && $_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""){

    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999-01-01";
    $estado = $_REQUEST['estado'];
    $where = "WHERE pqrsEstado like '%$estado%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
        
    } 
else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""){

$desde = "2022-01-01";
$hasta =  $_REQUEST['fechafin'];
$estado = $_REQUEST['estado'];
$where = "WHERE pqrsEstado like '%$estado%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
$pq1->filtrar($where);

}
else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && $_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""){

$desde = "2022-01-01";
$hasta =  $_REQUEST['fechafin'];
$estado = $_REQUEST['estado'];
$where = "WHERE pqrsEstado like '%$estado%' AND pqrsFecha BETWEEN '$desde' AND '$hasta'";
$pq1->filtrar($where);

     }

else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != "" && isset($_REQUEST['tipo']) && $_REQUEST['tipo'] != ""){

$tipo = $_REQUEST['tipo'];
$estado = $_REQUEST['estado'];
$where = "WHERE pqrsEstado like '%$estado%' AND pqrsTipoNombre like '%$tipo%'";
$pq1->filtrar($where);

        }

else if(isset($_REQUEST['tipo']) && $_REQUEST['tipo'] != ""){

    $tipo = $_REQUEST['tipo'];
    $where = "WHERE pqrsTipoNombre like '%$tipo%'";
    $pq1->filtrar($where);

}else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != ""){

    $estado = $_REQUEST['estado'];
    $where = "WHERE pqrsEstado = '$estado'";
    $pq1->filtrar($where);
    
} 

else if(isset($_REQUEST['fechainicio']) && isset($_REQUEST['fechafin'])){

    if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] != ""){
    $desde = $_REQUEST['fechainicio'];
    $hasta = $_REQUEST['fechafin'];
    $where = "WHERE pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
    
    }else if($_REQUEST['fechainicio'] != "" && $_REQUEST['fechafin'] == ""){

    $desde = $_REQUEST['fechainicio'];
    $hasta = "9999/01/01";
    $where = "WHERE pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
        
    } 
    else if($_REQUEST['fechainicio'] == "" && $_REQUEST['fechafin'] != ""){

    $desde =  "2022/01/01";
    $hasta =  $_REQUEST['fechafin'];
    $where = "WHERE pqrsFecha BETWEEN '$desde' AND '$hasta'";
    $pq1->filtrar($where);
    }
    else{
    $where = "";
    $pq1->filtrar($where);
    }

}
else {

    $where = "";
    $pq1->filtrar($where);
}

$registros = $pq1->verPqrs();

$resultado = mysqli_query($conexionPqrs,"SELECT COUNT(*) AS cantidad FROM pqrs
JOIN pqrsTipo
ON pqrsTipoId = pqrsOrigenId
$where")
or die ("problemas en el select " . mysqli_error($conexionPqrs));

$reg = mysqli_fetch_array($resultado);

$cantidad = $reg['cantidad'];

$registrosxpagina = $pq1->artporpag; 

?>  