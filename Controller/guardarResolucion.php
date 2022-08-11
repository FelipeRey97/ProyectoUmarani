<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Document</title>
    
</head>
<body>

<?php 

require_once('../Model/M_resolucion.php');
require_once('../Model/M_PQRS.php');

if(isset($_REQUEST['guardar'])){

if(isset($_REQUEST['respuesta']) && $_REQUEST['respuesta'] != ""){

  $mensaje = htmlentities($_REQUEST['respuesta']);
  $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

  $Vmensaje = true;

}else{

  ?>
    <script>
    swal("Faltan datos por Completar", "Por Favor Complete Todos los Datos", "warning", {
        button: "Ok!",
      });
    </script>
   <?php
    $Vmensaje = false;

}
  
if($Vmensaje == true){

  $res1 = new Resolucion();
  $pq1 = new PQRS();

  $id =  htmlentities($_REQUEST['pqrsId']);
  $usuarioId = htmlentities($_REQUEST['usuarioId']);
  $usuarioNombre = ($_REQUEST['usuarioNombre']);
  $fecha = htmlentities($_REQUEST['date']);
  $pqrsId = $id;

  $validar_pqrs = $res1->validarResolucion($pqrsId);

  if($validar_pqrs == true){

    $res1->actualizarResolucion($pqrsId,$mensaje,$fecha,$usuarioId);
    ?>
    <script>
    
    swal("Correcto", "Se ha corregido la respuesta Satisfactoriamente!", "success", {
        button: "Ok!",
      });

    </script>
   <?php

      header("refresh:1;url=../View/PQRS.php?pagina=1");

  }if($validar_pqrs == false){


    $res1->insertarResolucion($id,$usuarioId,$usuarioNombre,$pqrsId,$mensaje,$fecha);
    $pq1->actualizarEstado($id);

    ?>
    <script>
    
    swal("Correcto", "Se ha guardado la respuesta Satisfactoriamente!", "success", {
        button: "Ok!",
      });

    </script>
   <?php

      header("refresh:1;url=../View/PQRS.php?pagina=1");

  }

  

  

}

}



?>


</body>
</html>

