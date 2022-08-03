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
<?php  

require('../Model/M_conexion.php');


$con2 = new Conexion(); 

$id = $_REQUEST['tabla'];

 $registros = $con2->obtenerDatosUsuario($id);

    //control para actualizacion de usuario, se añaden condiciones para controlar los formularios

if(isset($_REQUEST['registrar'])){

   $usuarioId = htmlentities($_REQUEST['tabla']);

    if(isset($_REQUEST['unombre'] ) && $_REQUEST['unombre'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['unombre'])){
    
        $unombre = htmlentities($_REQUEST['unombre']);
        $unombre = strtoupper($unombre);
        $vNombre= true;
    }
    else{
    
        $vNombre= false;
        ?>
        <script>
        swal("Atención", "Verifique el Nombre", "warning");
        </script>
        <?php
    
    }
    if(isset($_REQUEST['uapellido'] ) && $_REQUEST['uapellido'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['uapellido'])){
    
        $uapellido =  htmlentities($_REQUEST['uapellido']);
        $uapellido = strtoupper($uapellido);
        $vApellido= true;
    }else{
    
        $vApellido= false;
        ?>
        <script>
        swal("Atención", "Verifique el Apellido", "warning");
        </script>
        <?php
    
    }if(isset($_REQUEST['ucontraseña'] ) && $_REQUEST['ucontraseña'] != "" && preg_match("/^[A-Za-z0-9]{5,12}$/", $_REQUEST['uestado']) ){
    
        $ucontraseña =  htmlentities($_REQUEST['ucontraseña']);
        $vContraseña= true;
        
    }else{
    
        $vContraseña= false;
        ?>
            <script>
            swal("Atención", "verifique la contraseña", "warning");
            </script>
            <?php
    
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
        
    if($vRol == true && $vEstado == true && $vContraseña == true && $vApellido == true && $vNombre == true){
    
        $con2->actualizarUsuario($unombre,$uapellido,$ucontraseña,$uestado,$urol,$usuarioId);
      ?>
      <script>
         swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
         
      </script>

      <?php

      header("refresh:1;url=../View/Usuarios.php?pagina=1");
            
    }
        
    if(empty($_REQUEST['unombre']) || empty($_REQUEST['uapellido']) || empty($_REQUEST['ucontraseña']) || empty($_REQUEST['uestado']) || empty($_REQUEST['urol']) ){
        
        ?>
            <script>
            swal("Atención", "Complete todos los campos", "warning");
            </script>
            <?php
        
    }
    }
    
    $con2->cerrarConexion();

?>
</body>
</html>






