<?php 


require_once('../Model/M_PQRS.php');
require_once('../Model/M_resolucion.php');

$dPqrs = new PQRS ();
$resol = new Resolucion();

if(isset($_REQUEST['pqEdit'])){

$id = $_REQUEST['pqEdit'];

$detallepqrs =$dPqrs->verDetallePQRS($id);


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

  $resoluciondatos = $resol->DetalleResolucion($id);

    if(isset($resoluciondatos)){
        
        while($datosr = mysqli_fetch_array($resoluciondatos))
        
        $respuesta = $datosr['resolucionMensaje'];
        
        }

$resolucionusuario = $resol->DetalleUsuario($id); 

if(isset($resolucionusuario)){

    while($datosU = mysqli_fetch_array($resolucionusuario)) {
    
        $usuarioId = $datosU['usuarioId'];
        $usuario = $datosU['usuarioNombre'] . " " . $datosU['usuarioApellido'];
        
        }
}

}


if(isset($_REQUEST['pqVis'])){

    $id = $_REQUEST['pqVis'];
    
    $detallepqrs =$dPqrs->verDetallePQRS($id);
    
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

    $detalleResolucion = $resol->DetalleUsuario($id); 

    while($dat = mysqli_fetch_array($detalleResolucion)){

        $usuario = $dat['usuarioNombre'] ." ". $dat['usuarioApellido'];

    }
    
    
    }

 

?>