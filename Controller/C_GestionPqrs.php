<?php 


require_once('../Model/M_PQRS.php');

if(isset($_REQUEST['pqEdit'])){

$id = $_REQUEST['pqEdit'];

$detallepqrs = mysqli_query($conexionPqrs,"SELECT * FROM pqrs
JOIN pqrstipo
ON pqrsTipoId = pqrsOrigenId
WHERE pqrsId = $id")
or die("problemas en el select" . mysqli_error($conexionPqrs));

while($det = mysqli_fetch_array($detallepqrs)){

    $pId = $det['pqrsId'];
    $nombre = $det['pqrsNombre'];
    $telefono = $det['pqrsTelefono'];
    $clienteId = $det['pqrsClienteId'];
    $Mail = $det['pqrsMail'];
    $fecha = $det['pqrsFecha'];
    $estado = $det['pqrsEstado'];
    $tipo = $det['pqrsTipoNombre'];
    $imagen = $det['pqrsImagen'];
    $descripcion = $det['pqrsDescripcion'];
}


}


if(isset($_REQUEST['pqVis'])){

    $id = $_REQUEST['pqVis'];
    
    $detallepqrs = mysqli_query($conexionPqrs,"SELECT * FROM pqrs
    JOIN pqrstipo
    ON pqrsTipoId = pqrsOrigenId
    WHERE pqrsId = $id")
    or die("problemas en el select" . mysqli_error($conexionPqrs));

    $detalleResolucion = mysqli_query($conexionPqrs,"SELECT * FROM resolucion
    JOIN usuarioTienda
    ON usuarioId = resolucionUsuarioId
    JOIN pqrs
    ON pqrsId = resolucionpqrsId
    WHERE resolucionpqrsId = $id") or die ("problemas en el select" . mysqli_error($conexionPqrs));
    
    while($det = mysqli_fetch_array($detallepqrs)){
    
        $pId = $det['pqrsId'];
        $nombre = $det['pqrsNombre'];
        $telefono = $det['pqrsTelefono'];
        $clienteId = $det['pqrsClienteId'];
        $Mail = $det['pqrsMail'];
        $fecha = $det['pqrsFecha'];
        $estado = $det['pqrsEstado'];
        $tipo = $det['pqrsTipoNombre'];
        $imagen = $det['pqrsImagen'];
        $descripcion = $det['pqrsDescripcion'];


    }

    while($dat = mysqli_fetch_array($detalleResolucion)){

        $usuario = $dat['usuarioNombre'] ." ". $dat['usuarioApellido'];

    }
    
    
    }



?>