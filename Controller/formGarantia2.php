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


require_once('../Model/M_PQRS.php');

$pq = new PQRS();

$tipo = $_REQUEST['tipoId'];
echo "$tipo";

$clienteId = false;


 $conexion = mysqli_connect("localhost","root","","proyecto") 
 or die ("problemas con la conexion");

 $registros = mysqli_query($conexion,"select * from cliente where clienteEmail = '$_REQUEST[pMail]'") 
 or die ("problemas en el select" . mysqli_error($conexion));

 if(isset($registros)){

     while($reg = mysqli_fetch_array($registros)){

        $clienteId = $reg['clienteId'];

     }
 }

if(isset($_FILES['pImagen'])){

$nombre_imagen = $_FILES['pImagen']['name'];
$temporal = $_FILES['pImagen']['tmp_name'];
$carpeta = "../Uploads/ReclamoImagen";
$ruta = $carpeta.'/'.$nombre_imagen;

}


switch($tipo) {

case 1:

    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);


    if ($clienteId == false){
    
        ?>
        <script>
        swal("Atención", "El email registrado no corresponde a ningun cliente", "warning");
        </script>
        <?php
    
    }
    
    
    else if($_REQUEST['pNombre'] != "" && $_REQUEST['pMail'] != "" && $_REQUEST['ptelefono'] != "" && $_REQUEST['pComentario'] != ""
    && $_REQUEST['tipoId'] !="" && $_REQUEST['pFecha'] !="" && $_REQUEST['pNumero'] !="" && $clienteId != false ){
    
    
    $pNombre = $_REQUEST['pNombre'];
    $pMail = $_REQUEST['pMail'];
    $ptelefono = $_REQUEST['ptelefono'];
    $pComentario = $_REQUEST['pComentario'];
    $tipoId = $_REQUEST['tipoId'];
    $pFecha = $_REQUEST['pFecha'];
    $pedidoId = $_REQUEST['pNumero'];
    
    
    $pq->insertarPqrs1($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$ruta,$clienteId,$pedidoId);
    ?>
    <script>
        swal("Operación Realizada", "Se ha generado la Petición Satisfactoriamente!", "success");
    </script>
    
    <?php
     
    
    }
    else{
    
    ?>
    <script>
    swal("Atención", "Por favor complete todos los campos", "warning");
    </script>
    <?php
    
    }
    
    
    $leerPqrs = mysqli_query($conexion,"SELECT * FROM pqrs 
    JOIN pqrstipo
    ON pqrsOrigenId = pqrsTipoId
    WHERE pqrsId IN (SELECT max(pqrsId) FROM pqrs)");

    while($lpqrs = mysqli_fetch_array($leerPqrs)){

        $pqrsId = $lpqrs['pqrsId'];
        $pqrsTipo = $lpqrs['pqrsTipoNombre'];
    }

    header("refresh:1;url=http://localhost/umaraniweb/view/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");


    break;

case 2:


    if ($clienteId == false){
    
        ?>
        <script>
        swal("Atención", "El email registrado no corresponde a ningun cliente", "warning");
        </script>
        <?php
    
    }
    
    
    else if($_REQUEST['pNombre'] != "" && $_REQUEST['pMail'] != "" && $_REQUEST['ptelefono'] != "" && $_REQUEST['pComentario'] != ""
    && $_REQUEST['tipoId'] !="" && $_REQUEST['pFecha'] !="" && $_REQUEST['pNumero'] !="" && $clienteId != false ){
    
    
    $pNombre = $_REQUEST['pNombre'];
    $pMail = $_REQUEST['pMail'];
    $ptelefono = $_REQUEST['ptelefono'];
    $pComentario = $_REQUEST['pComentario'];
    $tipoId = $_REQUEST['tipoId'];
    $pFecha = $_REQUEST['pFecha'];
    $pedidoId = $_REQUEST['pNumero'];
    
    
    $pq->insertarPqrs2($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$clienteId,$pedidoId);
    ?>
    <script>
        swal("Operación Realizada", "Se ha generado la Petición Satisfactoriamente!", "success");
    </script>
    
    <?php
     
    
    }
    else{
    
    ?>
    <script>
    swal("Atención", "Por favor complete todos los campos", "warning");
    </script>
    <?php
    
    }
    
    
    $leerPqrs = mysqli_query($conexion,"SELECT * FROM pqrs 
    JOIN pqrstipo
    ON pqrsOrigenId = pqrsTipoId
    WHERE pqrsId IN (SELECT max(pqrsId) FROM pqrs)");

    while($lpqrs = mysqli_fetch_array($leerPqrs)){

        $pqrsId = $lpqrs['pqrsId'];
        $pqrsTipo = $lpqrs['pqrsTipoNombre'];
    }

    header("refresh:1;url=http://localhost/umaraniweb/view/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");



    break;



case 3:

    
    if($_REQUEST['pNombre'] != "" && $_REQUEST['pMail'] != "" && $_REQUEST['ptelefono'] != "" && $_REQUEST['pComentario'] != ""
    && $_REQUEST['tipoId'] !="" && $_REQUEST['pFecha'] !="" ){
    
    
    $pNombre = $_REQUEST['pNombre'];
    $pMail = $_REQUEST['pMail'];
    $ptelefono = $_REQUEST['ptelefono'];
    $pComentario = $_REQUEST['pComentario'];
    $tipoId = $_REQUEST['tipoId'];
    $pFecha = $_REQUEST['pFecha'];
    
    
    $pq->insertarPqrs3($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha);
    ?>
    <script>
        swal("Operación Realizada", "Se ha generado la Petición Satisfactoriamente!", "success");
    </script>
    
    <?php
     
    
    }
    else{
    
    ?>
    <script>
    swal("Atención", "Por favor complete todos los campos", "warning");
    </script>
    <?php
    
    }

    $leerPqrs = mysqli_query($conexion,"SELECT * FROM pqrs 
    JOIN pqrstipo
    ON pqrsOrigenId = pqrsTipoId
    WHERE pqrsId IN (SELECT max(pqrsId) FROM pqrs)");

    while($lpqrs = mysqli_fetch_array($leerPqrs)){

        $pqrsId = $lpqrs['pqrsId'];
        $pqrsTipo = $lpqrs['pqrsTipoNombre'];
    }

    header("refresh:1;url=http://localhost/umaraniweb/view/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");
    break;
    

}




?>

</body>
</html>
