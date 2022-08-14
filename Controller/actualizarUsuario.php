<?php  

require('../Model/M_conexion.php');


$con2 = new Conexion(); 

$id = $_REQUEST['tabla'];

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
        $error = "nombre";
        $vNombre= false;
        
    
    }
    if(isset($_REQUEST['uapellido'] ) && $_REQUEST['uapellido'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['uapellido'])){
    
        $uapellido =  htmlentities($_REQUEST['uapellido']);
        $uapellido = strtoupper($uapellido);
        $vApellido= true;
    }else{
        $error = "apellido";
        $vApellido= false;
        
    
    }if(isset($_REQUEST['ucontraseña'] ) && $_REQUEST['ucontraseña'] != "" && preg_match("/^[A-Za-z0-9]{5,12}$/", $_REQUEST['uestado']) ){
    
        $ucontraseña =  htmlentities($_REQUEST['ucontraseña']);
        $vContraseña= true;
        
    }else{
        $error = "clave";
        $vContraseña= false;
        
    
    }if(isset($_REQUEST['uestado']) && $_REQUEST['uestado'] != "" && preg_match("/^[A-Za-z]{5,12}$/", $_REQUEST['uestado'])){
    
        $uestado =  htmlentities($_REQUEST['uestado']);
        $uestado = ucfirst($uestado);
        $vEstado= true;
        
    }else{
        $error = "estado";
        $vEstado= false;
        
    
    }if(isset($_REQUEST['urol']) && $_REQUEST['urol'] != "" && preg_match("/^[0-9]{0,1}$/", $_REQUEST['urol'])){
    
        $urol =  htmlentities($_REQUEST['urol']);
        $vRol= true;
        
    }else{
        $error = "rol";
        $vRol= false;
    
    }
        
    if($vRol == true && $vEstado == true && $vContraseña == true && $vApellido == true && $vNombre == true){
    
        $ucontraseña = password_hash($ucontraseña, PASSWORD_DEFAULT);

        $con2->actualizarUsuario($unombre,$uapellido,$ucontraseña,$uestado,$urol,$usuarioId);
      
        $error = "aceptable";
      header("refresh:1;url=../View/Usuarios.php?pagina=1");
            
    }
        
    if(empty($_REQUEST['unombre']) || empty($_REQUEST['uapellido']) || empty($_REQUEST['ucontraseña']) || empty($_REQUEST['uestado']) || empty($_REQUEST['urol']) ){
        
        $error = "vacio";
        
    }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
<?php 
    
    switch($error){

        case "nombre":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Nombre',
           'warning'
           )
           </script>
        <?php   break;
        case "apellido":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Apellido',
           'warning'
           )
           </script>
        <?php   break;
        case "documento":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Documento',
           'warning'
           )
           </script>
        <?php   break;
        case "docExiste":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'El documento ya existe',
        'error'
        )
        </script>
     <?php   break;
     case "clave":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique la clave',
        'warning'
        )
        </script>
     <?php   break;
     case "estado":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique el estado',
        'warning'
        )
        </script>
     <?php   break;
     case "rol":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique el Rol',
        'warning'
        )
        </script>
     <?php   break;
     case "rol":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique el Rol',
        'warning'
        )
        </script>
     <?php   break;
     case "aceptable":
        ?>
        <script>
        Swal.fire(
        'Completado',
        'Se ha registrado el usuario satisfactoriamente',
        'success'
        )
        </script>
     <?php   break;
     case "vacio":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'No se permiten campos vacíos',
        'error'
        )
        </script>
     <?php   break;
     }


    }
    
    $con2->cerrarConexion();

?>
</body>
</html>