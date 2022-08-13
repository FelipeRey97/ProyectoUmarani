<?php


require_once('../Model/M_PQRS.php');

if(isset($_REQUEST['guardar'])){


$pq = new PQRS();

$tipo = $_REQUEST['tipoId'];

if(isset($_FILES['pImagen'])){

$nombre_imagen = $_FILES['pImagen']['name'];
$temporal = $_FILES['pImagen']['tmp_name'];
$carpeta = "../Uploads/ReclamoImagen";
$ruta = $carpeta.'/'.$nombre_imagen;

}


switch($tipo) {

case 1:

    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);


    if(isset($_REQUEST['pNombre']) && $_REQUEST['pNombre'] != "" && preg_match("/^[A-Za-z ]{3,100}$/",$_REQUEST['pNombre'])){
        
        $pNombre = htmlentities($_REQUEST['pNombre']);
        $pNombre = filter_var($pNombre, FILTER_SANITIZE_STRING);
        $pNombre = strtoupper($pNombre);

        $VpNombre = true;

    }
    else{

        $VpNombre = true;
       
    }
    if(isset($_REQUEST['pMail']) && $_REQUEST['pMail'] != "" && filter_var($_REQUEST['pMail'], FILTER_VALIDATE_EMAIL )){
        
        $pMail = htmlentities($_REQUEST['pMail']);
        $pMail = filter_var($pMail, FILTER_SANITIZE_EMAIL);
        $VpMail = true;

        $existe_Mail = $pq->verificarEmail($pMail);

        if($existe_Mail == true){

            $VpMail = true;
        }
        else{

            $VpMail = false;
           
        }
    }
    else{

        $VpMail = false;
        
    }if(isset($_REQUEST['ptelefono']) && $_REQUEST['ptelefono'] != "" && preg_match("/^[0-9]{10,}$/",$_REQUEST['ptelefono'])){
        
        $ptelefono =  htmlentities($_REQUEST['ptelefono']);
        $Vptelefono = true;

    }
    else{
        $Vptelefono = false;
        
    }if($_REQUEST['pComentario'] != ""){
        
        $pComentario =  htmlentities($_REQUEST['pComentario']);
        $pComentario = filter_var($pComentario, FILTER_SANITIZE_STRING);
        $VpComentario = true;

    }
    else{
        $VpComentario = false;
        
    }
    if($VpComentario == true && $VpMail == true &&  $VpNombre == true){

        $tipoId = $_REQUEST['tipoId'];
        $pFecha = $_REQUEST['pFecha'];
        $pedidoId = $_REQUEST['pNumero'];

        $pq->insertarPqrs1($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$ruta,$pedidoId);
    

    //SE OBTIENE EL ID DE LA PQRS GENERADA
    
        $leerPqrs = $pq->obtenerIdPqrs();

        foreach($leerPqrs as $lpqrs){

            $pqrsId = $lpqrs['pqrsId'];
            $pqrsTipo = $lpqrs['pqrsTipoNombre'];
        }

        header("refresh:1;url=../View/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");

    }

    else if(empty($_REQUEST['pNombre']) || empty($_REQUEST['pMail']) || empty($_REQUEST['pComentario'])){
    
    
    }
    
    break;
    
    
    
case 2:

 
    if(isset($_REQUEST['pNombre']) && $_REQUEST['pNombre'] != "" && preg_match("/^[A-Za-z ]{3,100}$/",$_REQUEST['pNombre'])){
        
        $pNombre = htmlentities($_REQUEST['pNombre']);
        $pNombre = filter_var($pNombre, FILTER_SANITIZE_STRING);
        $pNombre = strtoupper($pNombre);

        $VpNombre = true;

    }
    else{

        $VpNombre = true;
        
    }
    if(isset($_REQUEST['pMail']) && $_REQUEST['pMail'] != "" && filter_var($_REQUEST['pMail'], FILTER_VALIDATE_EMAIL )){
        
        $pMail = htmlentities($_REQUEST['pMail']);
        $pMail = filter_var($pMail, FILTER_SANITIZE_EMAIL);
        $VpMail = true;

        $existe_Mail = $pq->verificarEmail($pMail);

        if($existe_Mail == true){

            $VpMail = true;
        }
        else{

            $VpMail = false;
            
        }
    }
    else{

        $VpMail = false;
        
    }if(isset($_REQUEST['ptelefono']) && $_REQUEST['ptelefono'] != "" && preg_match("/^[0-9]{10,}$/",$_REQUEST['ptelefono'])){
        
        $ptelefono =  htmlentities($_REQUEST['ptelefono']);
        $Vptelefono = true;

    }
    else{
        $Vptelefono = false;
        
    }if($_REQUEST['pComentario'] != ""){
        
        $pComentario =  htmlentities($_REQUEST['pComentario']);
        $pComentario = filter_var($pComentario, FILTER_SANITIZE_STRING);
        $VpComentario = true;

    }
    else{
        $VpComentario = false;
        
    }
    if($VpComentario == true && $VpMail == true &&  $VpNombre == true){

        $tipoId = $_REQUEST['tipoId'];
        $pFecha = $_REQUEST['pFecha'];
        $pedidoId = $_REQUEST['pNumero'];

        $pq->insertarPqrs2($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$pedidoId);
        

        $leerPqrs = $pq->obtenerIdPqrs();

        foreach($leerPqrs as $lpqrs){

            $pqrsId = $lpqrs['pqrsId'];
            $pqrsTipo = $lpqrs['pqrsTipoNombre'];
        }

        header("refresh:1;url=../View/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");

    }

    else if(empty($_REQUEST['pNombre']) || empty($_REQUEST['pMail']) || empty($_REQUEST['pComentario'])){
    
    
    
    }
    

    break;



case 3:

    
    if(isset($_REQUEST['pNombre']) && $_REQUEST['pNombre'] != "" && preg_match("/^[A-Za-z ]{3,100}$/",$_REQUEST['pNombre'])){
        
        $pNombre = htmlentities($_REQUEST['pNombre']);
        $pNombre = filter_var($pNombre, FILTER_SANITIZE_STRING);
        $pNombre = strtoupper($pNombre);

        $VpNombre = true;

    }
    else{

        $VpNombre = true;
      
    }
    if(isset($_REQUEST['pMail']) && $_REQUEST['pMail'] != "" && filter_var($_REQUEST['pMail'], FILTER_VALIDATE_EMAIL )){
        
        $pMail = htmlentities($_REQUEST['pMail']);
        $pMail = filter_var($pMail, FILTER_SANITIZE_EMAIL);
        $VpMail = true;

    }
    else{

        $VpMail = false;
        
    }if(isset($_REQUEST['ptelefono']) && $_REQUEST['ptelefono'] != "" && preg_match("/^[0-9]{10,}$/",$_REQUEST['ptelefono'])){
        
        $ptelefono =  htmlentities($_REQUEST['ptelefono']);
        $Vptelefono = true;

    }
    else{
        $Vptelefono = false;
       
    }if($_REQUEST['pComentario'] != ""){
        
        $pComentario =  htmlentities($_REQUEST['pComentario']);
        $pComentario = filter_var($pComentario, FILTER_SANITIZE_STRING);
        $VpComentario = true;

    }
    else{
        $VpComentario = false;
      
    }
    if($VpComentario == true && $VpMail == true &&  $VpNombre == true){

        $tipoId = $_REQUEST['tipoId'];
        $pFecha = $_REQUEST['pFecha'];

        $pq->insertarPqrs3($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha);
        

        //SE OBTIENE EL ID DE LA PQRS GENERADA
    
        $leerPqrs = $pq->obtenerIdPqrs();

        foreach($leerPqrs as $lpqrs){

            $pqrsId = $lpqrs['pqrsId'];
            $pqrsTipo = $lpqrs['pqrsTipoNombre'];
        }

        header("refresh:1;url=../View/ayudaClienteFin.php?Id=$pqrsId&Tipo=$pqrsTipo");

    }

    else if(empty($_REQUEST['pNombre']) || empty($_REQUEST['pMail']) || empty($_REQUEST['pComentario'])){
    

    
    }
    

    break;


}


}

?>
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
    
</body>
</html>