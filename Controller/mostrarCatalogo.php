<?php

    require('../Model/M_Productos4.php');

    $prod2 = new Producto();

    if(isset($_REQUEST['seccion'])){

        $seccion = $_REQUEST['seccion'];
    }else{

        $seccion = "inicio";
    }

    switch($seccion){

    case "inicio":
    

    $seccion = "";
    
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio DESC, artId ASC";
    }

    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio ASC, artId ASC";
    }
    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio ASC, artId DESC";
    }
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio DESC, artId DESC";
    }

   else if(isset($_REQUEST['Mayor'])){

        $orden = "ORDER BY artPrecio DESC";
    }
   else if(isset($_REQUEST['Antiguos'])){

        $orden= "ORDER BY artId ASC";
    }
   else if(isset($_REQUEST['Menor'])){

        $orden= "ORDER BY artPrecio ASC";
    }
   else if(isset($_REQUEST['Recientes'])){

        $orden= "ORDER BY artId DESC";
    }
    
    $prod2->seccionCatalogo($seccion);
    if(isset($orden)){
        $prod2->ordenarCatalogo($orden);
    }else{
        $orden = "";
        $prod2->ordenarCatalogo($orden);
    }
    $productos = $prod2->verProducto();
    
    break;

    case "collares":

        $seccion = "WHERE categoriaNombre like '%collares%'";
    
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio DESC, artId ASC";
    }

    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio ASC, artId ASC";
    }
    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio ASC, artId DESC";
    }
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio DESC, artId DESC";
    }

   else if(isset($_REQUEST['Mayor'])){

        $orden = "ORDER BY artPrecio DESC";
    }
   else if(isset($_REQUEST['Antiguos'])){

        $orden= "ORDER BY artId ASC";
    }
   else if(isset($_REQUEST['Menor'])){

        $orden= "ORDER BY artPrecio ASC";
    }
   else if(isset($_REQUEST['Recientes'])){

        $orden= "ORDER BY artId DESC";
    }
    
    $prod2->seccionCatalogo($seccion);
    if(isset($orden)){
        $prod2->ordenarCatalogo($orden);
    }else{
        $orden = "";
        $prod2->ordenarCatalogo($orden);
    }
    $productos = $prod2->verProducto();



    break;

    case "pulseras":

        $seccion = "WHERE categoriaNombre like '%pulseras%'";
    
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio DESC, artId ASC";
    }

    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio ASC, artId ASC";
    }
    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio ASC, artId DESC";
    }
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio DESC, artId DESC";
    }

   else if(isset($_REQUEST['Mayor'])){

        $orden = "ORDER BY artPrecio DESC";
    }
   else if(isset($_REQUEST['Antiguos'])){

        $orden= "ORDER BY artId ASC";
    }
   else if(isset($_REQUEST['Menor'])){

        $orden= "ORDER BY artPrecio ASC";
    }
   else if(isset($_REQUEST['Recientes'])){

        $orden= "ORDER BY artId DESC";
    }
    
    $prod2->seccionCatalogo($seccion);
    if(isset($orden)){
        $prod2->ordenarCatalogo($orden);
    }else{
        $orden = "";
        $prod2->ordenarCatalogo($orden);
    }
    $productos = $prod2->verProducto();


    break;

    case "anillos":
    
        $seccion = "WHERE categoriaNombre like '%anillos%'";
    
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio DESC, artId ASC";
    }

    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Antiguos']) ){

        $orden = "ORDER BY artPrecio ASC, artId ASC";
    }
    if(isset($_REQUEST['Menor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio ASC, artId DESC";
    }
    if(isset($_REQUEST['Mayor']) && isset($_REQUEST['Recientes'])){

        $orden = "ORDER BY artPrecio DESC, artId DESC";
    }

   else if(isset($_REQUEST['Mayor'])){

        $orden = "ORDER BY artPrecio DESC";
    }
   else if(isset($_REQUEST['Antiguos'])){

        $orden= "ORDER BY artId ASC";
    }
   else if(isset($_REQUEST['Menor'])){

        $orden= "ORDER BY artPrecio ASC";
    }
   else if(isset($_REQUEST['Recientes'])){

        $orden= "ORDER BY artId DESC";
    }
    
    $prod2->seccionCatalogo($seccion);
    if(isset($orden)){
        $prod2->ordenarCatalogo($orden);
    }else{
        $orden = "";
        $prod2->ordenarCatalogo($orden);
    }
    $productos = $prod2->verProducto();


    break;

    default:
    
       header("location: ../View/catalogo.php");
    }
?>