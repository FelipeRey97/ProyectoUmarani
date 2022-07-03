<?php
 require('../Model/M_Productos4.php');
 $prod1 = new Producto();

if(isset($_GET['artxpag'])){    
    $artxpag = $_REQUEST['artxpag'];
    $prod1->inicializar($artxpag);
}else{
    $artxpag = 5;
    $prod1->inicializar($artxpag);
}

if(isset($_REQUEST['categoria'])){


    $categoria = $_REQUEST['categoria'];
    $where = "WHERE categoriaNombre like '%$categoria%'";
    $prod1->filtrar($where);
}
else{
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