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

$resoluciondatos = mysqli_query($conexionPqrs,"SELECT * FROM resolucion
JOIN pqrs
ON pqrsId = resolucionpqrsId
JOIN pqrstipo
ON pqrsTipoId = pqrsOrigenId
WHERE resolucionId = $id")
or die("problemas en el select" . mysqli_error($conexionPqrs));

    if(isset($resoluciondatos)){
        
        while($datosr = mysqli_fetch_array($resoluciondatos))
        
        $respuesta = $datosr['resolucionMensaje'];
        
        }

$resolucionusuario = mysqli_query($conexionPqrs,"SELECT * FROM resolucion
JOIN usuariotienda
ON usuarioId = resolucionUsuarioId
WHERE resolucionId = $id");
}

if(isset($resolucionusuario)){

    while($datosU = mysqli_fetch_array($resolucionusuario)) {
    {
        $usuarioId = $datosU['usuarioId'];
        $usuario = $datosU['usuarioNombre'] . " " . $datosU['usuarioApellido'];

    }
        
       
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