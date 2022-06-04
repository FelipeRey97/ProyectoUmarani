<?php   
session_start();


$sesionId= $_REQUEST['sesionId'];
$artId = $_POST['artId'];
$Cant = $_POST['Cant'];


$conexion1 = mysqli_connect("localhost","root","","proyecto") 
or die ("problemas con la conexion");

$datos = mysqli_query($conexion1,"SELECT * FROM carrito 
    JOIN articulo 
    ON articuloId = artId
    WHERE sesionId = '$sesionId'") or die("problemas en el select" . mysqli_error($conexion1));
if(isset($datos)){

    while($dat = mysqli_fetch_array($datos)){

        $idArt = $dat['articuloId'];
        $idSesion = $dat ['sesionId'];
        $cantidad = $dat['artCarroCant'];

    }

}
if($idArt == $artId && $idSesion == $sesionId){

    $Cant = $cantidad + 1;

    mysqli_query($conexion1, "UPDATE carrito SET artCarroCant = $Cant   
    WHERE articuloId = '$idArt' AND sesionId = '$sesionId' ");

}else{

    mysqli_query($conexion1,"INSERT INTO carrito (sesionId,articuloId,artCarroCant) 
    VALUES ('$sesionId',$artId,$Cant)") or die ("problemas en el insert" . mysqli_error($conexion1));

    mysqli_close($conexion1);


}
    



header("Location:" .$_SERVER['HTTP_REFERER']."");

?>