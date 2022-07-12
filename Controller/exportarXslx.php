<?php


// Para hacer un controlador unico se identifica de donde proviene la petición para exportar

$variable = $_REQUEST['v'];


switch($variable){


case "pedido" :
   
   include_once("../Controller/mostrarPedidos.php");
   // NOMBRE DEL ARCHIVO Y CHARSET

   header('Content-Type:text/csv; charset=latin1');
   header('Content-Disposition: attachment; filename= "Reporte_Pedidos.csv"');

  // SALIDA DEL ARCHIVO
   $salida = fopen('php://output','w');
  //ENCABEZADOS
  fputcsv($salida, array('ID','Fecha','Estado','Monto','Departamento','Ciudad/Municipio'));
  //QUERY PARA CREAR EL REPORTE
    // creación de objeto de la clase pedido
  $Rpedido = new Pedido();
    // se llama al método para almacenar los registros de la tabla pedido en la variable reporte
  $artxpag = $cantidad;
  $_GET['pagina'] = 1;
  $Rpedido->inicializar($artxpag);
  $Rpedido->filtrar($where);
  $Rpedido->ordenar($orderby);  
  $reporte = $Rpedido->verPedido();
    foreach($reporte as $rep){

        fputcsv($salida, array($rep['pedidoId'],
                               $rep['pedidoFechaInicio'],
                               $rep['pedidoEstado'],
                               $rep['pedidoCostoTotal'],
                               $rep['direccionDep'],
                               $rep['direccionCiudad']));
    }

break;

case "productos" :

    echo "ha seleccionado productos";

break;

case "usuarios" :

    
break;

case "facturas" :

break;

case "pqrs" :

break;

case "clientes" :

break;



}








?>