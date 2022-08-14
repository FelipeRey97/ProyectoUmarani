<?php 

require_once('../Model/M_resolucion.php');
require_once('../Model/M_PQRS.php');

if(isset($_REQUEST['guardar'])){

if(isset($_REQUEST['respuesta']) && $_REQUEST['respuesta'] != ""){

  $mensaje = htmlentities($_REQUEST['respuesta']);
  $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

  $Vmensaje = true;

}else{

    $error = "comentario";
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
   
    $error = "aceptable";

      header("refresh:1;url=../View/PQRS.php?pagina=1");

  }if($validar_pqrs == false){


    $res1->insertarResolucion($id,$usuarioId,$usuarioNombre,$pqrsId,$mensaje,$fecha);
    $pq1->actualizarEstado($id);

    $error = "aceptable";
      header("refresh:1;url=../View/PQRS.php?pagina=1");

  }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
    
</head>
<body>
<?php    
    switch($error){

    case "comentario":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'Por favor debe ingresar los comentarios',
    'warning'
    )
    </script>
    <?php   break;
    case "aceptable":
    ?>
    <script>
    Swal.fire(
    'Completado',
    'Se ha guardado la Respuesta satisfactoriamente',
    'success'
    )
    </script>
    <?php   break;
    case "vacio":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'No se permiten campos vacíos',
    'error'
    )
    </script>
    <?php   break;
    }

  }
    ?>

</body>
</html>