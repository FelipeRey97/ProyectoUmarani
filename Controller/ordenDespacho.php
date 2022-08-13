<?php

require_once('../Model/M_despacho.php');
require_once('../Model/M_Pedidos.php');



if(isset($_REQUEST['Guardar'])){

if(isset($_REQUEST['despachoId']) && $_REQUEST['despachoId'] != "" && preg_match("/^[a-zA-Z0-9]{4,250}$/", $_REQUEST['despachoId'])){

    $despachoId = htmlentities($_REQUEST['despachoId']);
    $despachoId = filter_var($despachoId, FILTER_SANITIZE_STRING);
    $VdespachoId = true;
     
}
else{

    $VdespachoId = false;


}
if(isset($_REQUEST['empresaId'])){

    $empresaId = $_REQUEST['empresaId'];

    $vempresaId = true;

}
else{

    $vempresaId = true;
   

}
if($vempresaId == true && $VdespachoId == true){
 
    $pedidoId = htmlentities($_REQUEST['pedidoId']);
    $usuarioId = htmlentities($_REQUEST['usuarioId']);
    $nombreUsuario = htmlentities($_REQUEST['nombreUsuario']);
    $date = $_REQUEST['date'];
        $envio = new Despacho();
        $envio_ = new Pedido();
        $envio->insertarOrden($despachoId,$empresaId,$pedidoId,$usuarioId,$nombreUsuario,$date);
        $Estado ="Enviado";
        $envio_->actualizarPedido($pedidoId,$Estado);

        $envio->cerrarConexion();
       
    
        
    header("refresh:1;url=../View/pedidos.php?pagina=1");

}
else if (empty($_REQUEST['despachoId']) || empty($_REQUEST['empresaId'])){

   
}


}


if(isset($_REQUEST['corregir'])){


    if(isset($_REQUEST['despachoId']) && $_REQUEST['despachoId'] != "" && preg_match("/^[a-zA-Z0-9]{4,250}$/", $_REQUEST['despachoId'])){

        $despachoId = htmlentities($_REQUEST['despachoId']);
        $despachoId = filter_var($despachoId, FILTER_SANITIZE_STRING);
        $VdespachoId = true;
         
    }
    else{
    
        $VdespachoId = false;
    
    
    }
    if(isset($_REQUEST['empresaId'])){
    
        $empresaId = $_REQUEST['empresaId'];
    
        $vempresaId = true;
    
    }
    else{
    
        $vempresaId = true;
        
    
    }
    if($vempresaId == true && $VdespachoId == true){
    
        $pedidoId = $_REQUEST['pedidoId'];
        $usuarioId = htmlentities($_REQUEST['usuarioId']);
        $nombreUsuario = htmlentities($_REQUEST['nombreUsuario']);
        $date = $_REQUEST['date'];
        $old_DespachoId = $_REQUEST['old_DespachoId'];
            $envio = new Despacho();
            $envio_ = new Pedido();
            $envio->eliminarDespacho($old_DespachoId);
            $envio->insertarOrden($despachoId,$empresaId,$pedidoId,$usuarioId,$nombreUsuario,$date);
            $Estado ="Enviado";
            $envio_->actualizarPedido($pedidoId,$Estado);
    
            $envio->cerrarConexion();
           
        
            
        header("refresh:1;url=../View/pedidos.php?pagina=1");
    
    }
    else if (empty($_REQUEST['despachoId']) || empty($_REQUEST['empresaId'])){
    
    
    }



}

if(isset($_REQUEST['cancelar'])){


    $pedidoId = $_REQUEST['pedidoId'];
    $usuarioId = $_REQUEST['usuarioId'];
    $date = $_REQUEST['date'];
    $old_DespachoId = $_REQUEST['old_DespachoId'];

    $envio = new Despacho();
            $envio_ = new Pedido();
            $envio->eliminarDespacho($old_DespachoId);
            $Estado ="Cancelado";
            $envio_->actualizarPedido($pedidoId,$Estado);
    
            $envio->cerrarConexion();

            
        header("refresh:1;url=../View/pedidos.php?pagina=1");


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
</body>
</html>