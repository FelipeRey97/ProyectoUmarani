<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php


require('../Model/M_PQRS');

$pq = new PQRS();

// $conexion = mysqli_connect("localhost","root","","proyecto") 
// or die ("problemas con la conexion");

// $registros = mysqli_query($conexion,"select * from cliente where clienteEmail = '$_REQUEST[pMail]'") 
// or die ("problemas en el select" . mysqli_error($coneixon));

// if(isset($registros)){


//     while($reg = mysqli_fetch_array($registros)){

//         $clienteId = $reg['clienteId'];

//     }
// }
// else{

//     $clienteId = null;

// }

$clienteId = null;

$nombre_imagen = $_FILES['pImagen']['name'];
$temporal = $_FILES['pImagen']['tmp_name'];
$carpeta = "../Uploads/ReclamoImagen";
$ruta = $carpeta.'/'.$nombre_imagen;

move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);


// Se obtiene el nombre de la imagen y el nombre de la imagen temporal
 // se crea la ruta de la carpeta donde se guarda la imagen
 // se mueve la imagen a la carpeta ../Uploads/ImagenPrincipal y se guarda la ruta como texto en la BD
// Se valida que los formularios del nuevo producto no se envien vacios


if($_REQUEST['pNombre'] != "" && $_REQUEST['pMail'] != "" && $_REQUEST['ptelefono'] != "" && $_REQUEST['pComentario'] != ""
&& $_REQUEST['tipoId'] !="" && $_REQUEST['pFecha'] !="" && $_REQUEST['pNumero'] !="" ){


$pNombre = $_REQUEST['pNombre'];
$pMail = $_REQUEST['pMail'];
$ptelefono = $_REQUEST['ptelefono'];
$pComentario = $_REQUEST['pComentario'];
$tipoId = $_REQUEST['tipoId'];
$pFecha = $_REQUEST['pFecha'];
$pNumero = $_REQUEST['pNumero'];


$pq->insertarPqrs($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$pNumero);
?>
<script>
    swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
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



mysqli_query($conexion,"insert into pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsClienteId,pqrsPedidoId,pqrsImagen)
values('$_REQUEST[pNombre]','$_REQUEST[pMail]','$_REQUEST[ptelefono]','$_REQUEST[pComentario]',$_REQUEST[tipoId],'$_REQUEST[pFecha]',
$clienteId,$_REQUEST[pNumero],'$ruta')");


include_once('../View/formGarantia.php');

?>

</body>
</html>
