<?php
 require('../Model/M_Productos4.php');
 $prod1 = new Producto();

 //selector de cantidad de articulos por pagina
if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $prod1->inicializar($artxpag);
}else{
    $artxpag = 5;
    $prod1->inicializar($artxpag);
}

// Combinatoria para los filtros y búsquedas

if(isset($_REQUEST['categoria']) && $_REQUEST['categoria'] != "" ){


    $categoria = $_REQUEST['categoria'];
    $where = "WHERE categoriaNombre like '%$categoria%'";
    $prod1->filtrar($where);

}
else if(isset($_REQUEST['criterio']) && isset($_REQUEST['textbox']) && $_REQUEST['textbox'] != "" ){

    if($_REQUEST['criterio'] == 'id' && is_numeric($_REQUEST['textbox'])){
        
        $id = $_REQUEST['textbox'];
        $where = "WHERE artId = $id";
        $prod1->filtrar($where);
    }else if($_REQUEST['criterio'] == 'nombre'){

        $titulo = $_REQUEST['textbox'];
        $where = "WHERE artNombre like '%$titulo%'";
        $prod1->filtrar($where);
    }else{

        $where = "WHERE artId like '%$_REQUEST[textbox]%'";
        $prod1->filtrar($where);
        
    }
}
else if(isset($_REQUEST['estado']) && $_REQUEST['estado'] != ""){
 
       $estado = $_REQUEST['estado'];
       $where = "WHERE artEstado like '%$estado%'";
       $prod1->filtrar($where);
}

else {

    $where = "";
    $prod1->filtrar($where);
}


    $productos = $prod1->verInventario();
 
    $resultado = mysqli_query($conexion1,"SELECT COUNT(*) AS cantidad FROM articulo 
    JOIN categoria
    ON categoriaId = artCategoriaId
    $where")
    or die("problemas en el select" . mysqli_error($conexion1));

    $res = mysqli_fetch_array($resultado);
    $cantidad = $res['cantidad'];
    
    

?> 