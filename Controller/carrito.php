<?php   
session_start();


$sesionId= $_REQUEST['sesionId'];
$artId = $_REQUEST['artId'];
$Cant = $_REQUEST['Cant'];

$conexion1 = mysqli_connect("localhost","root","","proyecto") 
or die ("problemas con la conexion"); 

$datos = mysqli_query($conexion1,"SELECT * FROM carrito 
    JOIN articulo 
    ON articuloId = artId
    WHERE articuloId = $artId AND sesionId = '$sesionId'") or die("problemas en el select" . mysqli_error($conexion1));
if(isset($datos)){

    while($dat = mysqli_fetch_array($datos)){

        $idArt = $dat['articuloId'];
        $idSesion = $dat ['sesionId'];
        $cantidad = $dat['artCarroCant'];
        $carId = $dat['carId'];
    }
  
}


if(isset($idArt) && $idArt == $artId && $idSesion == $sesionId){

    $Cant = $cantidad + 1;

    echo mysqli_query($conexion1, "UPDATE carrito SET artCarroCant = $Cant   
    WHERE articuloId = $idArt AND sesionId = '$sesionId' AND carId = $carId ");
   ?><script>
    r=1;
   </script>
 <?php   
}else if($idArt == ""){

    echo mysqli_query($conexion1,"INSERT INTO carrito (sesionId,articuloId,artCarroCant) 
    VALUES ('$sesionId',$artId,$Cant)") or die ("problemas en el insert" . mysqli_error($conexion1));

?><script>
r=1;
</script>
<?php 

}

header("location:" .$_SERVER['HTTP_REFERER']. "");
    

?>