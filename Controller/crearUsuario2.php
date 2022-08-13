<?php 

require('../Model/M_conexion.php');
// controlador para crear usuario, se añaden condiciones para evitar campos vacios y controlar los formularios

$con = new Conexion();

function generatePassword($length)
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}

$length = 10;
$key = generatePassword($length);


if(isset($_REQUEST['registrar'])){


   
if(isset($_REQUEST['unombre'] ) && $_REQUEST['unombre'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['unombre'])){

   $unombre = htmlentities($_REQUEST['unombre']);
   $unombre = strtoupper($unombre);
   $vNombre= true;
}
else{

   $vNombre= false;
   

}
if(isset($_REQUEST['uapellido'] ) && $_REQUEST['uapellido'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['uapellido'])){

   $uapellido =  htmlentities($_REQUEST['uapellido']);
   $uapellido = strtoupper($uapellido);
   $vApellido= true;
}else{

   $vApellido= false;
   

}if(isset($_REQUEST['udocumento'] ) && $_REQUEST['udocumento'] != "" && preg_match("/^[0-9]{5,12}$/", $_REQUEST['udocumento'])){

   $udocumento =  htmlentities($_REQUEST['udocumento']);
   
   $doc = htmlentities($_REQUEST['udocumento']);  //Se ejecuta función para validar si el documento ya se encuentra registrado
   $val_Doc = $con->comprobarExistencia($doc);

   if($val_Doc == true){

      $vDoc= false;
     
   }
   else{

      $vDoc= true;

   }

}else{

   $vDoc= false;
   

}if(isset($_REQUEST['ucontraseña'] ) && $_REQUEST['ucontraseña'] != "" && preg_match("/^[A-Za-z0-9]{5,12}$/", $_REQUEST['uestado']) ){

   $ucontraseña =  htmlentities($_REQUEST['ucontraseña']);
   $vContraseña= true;
   
}else{

   $vContraseña= false;
   

}if(isset($_REQUEST['uestado']) && $_REQUEST['uestado'] != "" && preg_match("/^[A-Za-z]{5,12}$/", $_REQUEST['uestado'])){

   $uestado =  htmlentities($_REQUEST['uestado']);
   $uestado = ucfirst($uestado);
   $vEstado= true;
   
}else{

   $vEstado= false;
   

}if(isset($_REQUEST['urol']) && $_REQUEST['urol'] != "" && preg_match("/^[0-9]{0,1}$/", $_REQUEST['urol'])){

   $urol =  htmlentities($_REQUEST['urol']);
   $vRol= true;
   
}else{

   $vRol= false;

}
   
if($vRol == true && $vEstado == true && $vContraseña == true && $vDoc == true && $vApellido == true && $vNombre == true){

   $con->insertarUsuario($unombre,$uapellido,$udocumento,$ucontraseña,$uestado,$urol);
      

      header("refresh:1;url=../View/Usuarios.php");
      
}
   
if(empty($_REQUEST['unombre']) || empty($_REQUEST['uapellido']) || empty($_REQUEST['udocumento']) || empty($_REQUEST['ucontraseña']) || empty($_REQUEST['uestado']) || empty($_REQUEST['urol']) ){
   

   
}
}

$con->cerrarConexion();


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