<?php


if(isset($_REQUEST['actualizar'])){
   
   require_once('../Model/M_conexion.php');
   $user1 = new Conexion();

   $usuario = $_SESSION['usuario'];
   $claveActual = $_REQUEST['claveActual'];

   $consulta = $user1->validarUsuario($usuario);

   $filas = mysqli_fetch_array($consulta);

   if($filas){

       if(isset($_REQUEST['nuevaClave2']) && isset($_REQUEST['nuevaClave1']) && $_REQUEST['nuevaClave2'] == $_REQUEST['nuevaClave1']){
           
   
       function validar_clave($cPassword){
   
           if(strlen($cPassword) < 6){
               // echo strlen($cPassword);
               
           return false;
           }
           if(strlen($cPassword) > 10){
               
           return false;
           }
           if (!preg_match('`[a-z]`',$cPassword)){
               
           return false;
           }
           if (!preg_match('`[A-Z]`',$cPassword)){
           
           return false;
           }
           if (!preg_match('`[0-9]`',$cPassword)){
               
               
           return false;
           }
           return true;
       } 

       $nuevaClave = $_REQUEST['nuevaClave2'];

       $vcPassword = validar_clave($nuevaClave);

           if($vcPassword == true){

              $v_existeClave = password_verify($nuevaClave, $filas['usuarioContraseña']);

            if($v_existeClave == true) {

                
                }
                else{
                    
                    $nuevaClave = password_hash($nuevaClave, PASSWORD_DEFAULT);
               $user1->asignarClave($nuevaClave,$usuario);
               
               header('refresh:1;url=../View/pedidos.php');
            }
           }
       
   }
       else{
   
           
           }

   }
   else{

      
       

   }

    if(empty($_REQUEST['nuevaClave2']) || empty($_REQUEST['nuevaClave1']) || empty($_REQUEST['claveActual'])){

      

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

