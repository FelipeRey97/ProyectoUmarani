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
  if(isset($orderby))
  {
    $Rpedido->ordenar($orderby); 
  }else{
    $orderby = "";
    $Rpedido->ordenar($orderby);  
  }
  
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
 
    include_once("../Controller/mostrarProducto.php");
    //NOMBRE DEL ARCHIVO Y CHARSET
    header('Content-Type:text/csv; charset=latin1');
    header('Content-Disposition: attachment; filename= "Reporte_Inventario.csv"');
    
    //SALIDA DEL ARCHIVO
    $salida = fopen('php://output', 'w');

    //ENCABEZADOS
    fputcsv($salida, array('ID','Articulo','Precio','Cantidad','Estado','Categoria'));

    //QUERY PARA EXTRAER LOS DATOS DEL REPORTE
      //creacion de objeto de la clase producto
    $Rproducto = new Producto();
    
    $artxpag = $cantidad;
    $_GET['pagina'] = 1;

    $Rproducto->inicializar($artxpag);
    $Rproducto->filtrar($where);
    
    $reporte = $Rproducto->verInventario();

    foreach($reporte as $rep){
      fputcsv($salida, array($rep['artId'],$rep['artNombre'],$rep['artPrecio'],$rep['artCantidad'],$rep['artEstado'],$rep['categoriaNombre']));

    }


break;

case "usuarios" :

  include_once('../Controller/verUsuario.php');

  //NOMBRE DEL ARCHIVO Y CHARSET

  header('Content-Type: text/csv; charset=latin1');
  header('Content-Disposition: attachment; filename="Reporte_usuarios.csv"');

  //SALIDA DEL ARCHIVO

  $salida= fopen('php://output', 'w');

  //ENCABEZADOS

  fputcsv($salida, array('ID','Nombre','Apellido','Documento','Rol','Estado'));

  //QUERY REALIZAR CONSULTA

  $rUsuario = new Conexion ();

  $artxpag = $cantidad;
    $_GET['pagina'] = 1;

  $rUsuario->inicializar($artxpag);
  $rUsuario->filtrar($where);
    
  $reporte = $rUsuario->verUsuario();

  foreach($reporte as $rep){
      fputcsv($salida, array($rep['usuarioId'],$rep['usuarioNombre'],$rep['usuarioApellido'],$rep['usuarioDoc'],$rep['rolNombre'],$rep['usuarioEstado']));

    }

    
break;

case "pqrs" :

  include_once('../Controller/mostrarPQRS.php');

  //NOMBRE DEL ARCHIVO Y CHARSET
  header('Content-Type:text/csv; charset=latin1');
  header('Content-Disposition: attachment; filename = "Reporte_pqrs.csv"');

  //SALIDA DEL ARCHIVO

  $salida = fopen('php://output', 'w');

  //ENCABEZADOS

  fputcsv($salida, array('ID','Cliente','Telefono','Tipo','Fecha','Estado'));

  //QUERY PARA EXTRAER LOS DATOS DEL REPORTE

  $Rpqrs = new PQRS();

  $artxpag = $cantidad;
  $_GET['pagina'] = 1;

  $Rpqrs->inicializar($artxpag);
  $Rpqrs->filtrar($where);
    
    $reporte = $Rpqrs->verPqrs();

    foreach($reporte as $rep){
      fputcsv($salida, array($rep['pqrsId'],$rep['pqrsNombre'],$rep['pqrsTelefono'],$rep['pqrsTipoNombre'],$rep['pqrsFecha'],$rep['pqrsEstado']));

    }

break;

case "clientes" :

include_once('../Controller/mostrarClientes.php');

//NOMBRE DE ARCHIVO Y CHARSET
header('Content-Type:text/csv; charset=latin1');
header('Content-Disposition: attachment; filename="Reporte_Clientes.csv"');

//ARCHIVO DE SALIDA

$salida = fopen('php://output', 'w');

//ENCABEZADOS

fputcsv($salida, array('ID','Nombre','Apellido','Telefono','Email'));

//QUERY PARA OBTENER EL CONTENIDO

$rClientes = new Clientes();

$artxpag = $cantidad;
$_GET['pagina'] = 1;

$rClientes->inicializar($artxpag);
$rClientes->filtrar($where);
    
    $reporte = $rClientes->verCliente();

    foreach($reporte as $rep){
      fputcsv($salida, array($rep['clienteId'],$rep['clienteNombre'],$rep['clienteApellido'],$rep['clienteTelefono'],$rep['clienteEmail']));

    }

break;



}








?>