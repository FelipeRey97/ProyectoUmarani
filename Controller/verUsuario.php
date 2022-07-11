<?php

    require('../Model/M_conexion.php');

    $con1 = new Conexion();

    if(isset($_GET['artxpag'])){    
        $artxpag = $_REQUEST['artxpag'];
        $con1->inicializar($artxpag);
    }else{
        $artxpag = 5;
        $con1->inicializar($artxpag);
    }

    // combinatoria de filtros y busquedas para usuarios

    if(isset($_REQUEST['estado']) && isset($_REQUEST['rol']) && $_REQUEST['rol'] != "" && $_REQUEST['estado'] != ""){
        $rol = $_REQUEST['rol'];
        $estado = $_REQUEST['estado'];
        $where = "WHERE rolNombre like '%$rol%' AND usuarioEstado like '%$estado%'";
        $con1->filtrar($where);

    }


    else if(isset($_REQUEST['rol']) && $_REQUEST['rol'] != "" ){

        $rol = $_REQUEST['rol'];
        $where = "WHERE rolNombre like '%$rol%'";
        $con1->filtrar($where);

    }else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != ""){

        $estado = $_REQUEST['estado'];
        $where = "WHERE usuarioEstado like '%$estado%'";
        $con1->filtrar($where);

    }

   else if(isset($_REQUEST['criterio'])){

        if(isset($_REQUEST['textbox']) && $_REQUEST['criterio'] =='id' && $_REQUEST['textbox'] != "" && is_numeric($_REQUEST['textbox'])){

            $id = $_REQUEST['textbox'];
            $where = "WHERE usuarioId = $id";
            $con1->filtrar($where);

        }else if (isset($_REQUEST['textbox']) && $_REQUEST['criterio'] =='documento' && $_REQUEST['textbox'] != "" && is_numeric($_REQUEST['textbox'])){

            $doc = $_REQUEST['textbox'];
            $where = "WHERE usuarioDoc = $doc";
            $con1->filtrar($where);

        }
        else if (isset($_REQUEST['textbox']) && $_REQUEST['criterio'] =='nombre' && $_REQUEST['textbox'] != "" && is_string($_REQUEST['textbox'])){

            $nombre = $_REQUEST['textbox'];
            $where = "WHERE usuarioNombre like '%$nombre%' OR usuarioApellido like '%$nombre%'";
            $con1->filtrar($where);

        }
        
        else{

            $where="";
            $con1->filtrar($where);
        }
    }
   
    else{

        $where="";
        $con1->filtrar($where);
    }

    $usuarios = $con1->verUsuario();

    $resultado = mysqli_query($conexionUsuario,"SELECT COUNT(*) AS cantidad FROM usuariotienda
    JOIN rol
    ON usuarioRolId = rolId
    $where")
    or die("problemas en el select" . mysqli_error($conexionUsuario));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];

    $registrosxpagina = $con1->artporpag;

// se almacenan los datos de la funcion verUsuario() que contiene select en la variable $usuarios
 
?>