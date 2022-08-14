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
   $error = "nombre";
   

}
if(isset($_REQUEST['uapellido'] ) && $_REQUEST['uapellido'] != "" && preg_match("/^[A-Za-z ]{3,50}$/", $_REQUEST['uapellido'])){

   $uapellido =  htmlentities($_REQUEST['uapellido']);
   $uapellido = strtoupper($uapellido);
   $vApellido= true;
}else{

   $vApellido= false;
   $error = "apellido";
   

}if(isset($_REQUEST['udocumento'] ) && $_REQUEST['udocumento'] != "" && preg_match("/^[0-9]{5,12}$/", $_REQUEST['udocumento'])){

   $udocumento =  htmlentities($_REQUEST['udocumento']);
   
   $doc = htmlentities($_REQUEST['udocumento']);  //Se ejecuta función para validar si el documento ya se encuentra registrado
   $val_Doc = $con->comprobarExistencia($doc);

   if($val_Doc == true){

      $vDoc= false;
      $error = "docExiste";
   }
   else{

      $vDoc= true;

   }

}else{
   $error = "documento";
   $vDoc= false;
   

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
   
if($vRol == true && $vEstado == true && $vContraseña == true && $vDoc == true && $vApellido == true && $vNombre == true){

   $con->insertarUsuario($unombre,$uapellido,$udocumento,$ucontraseña,$uestado,$urol);
   $error = "aceptable";

      header("refresh:1;url=../View/Usuarios.php");
      
}
   
if(empty($_REQUEST['unombre']) || empty($_REQUEST['uapellido']) || empty($_REQUEST['udocumento']) || empty($_REQUEST['ucontraseña']) || empty($_REQUEST['uestado']) || empty($_REQUEST['urol']) ){
   

   $error = "vacio";
}


$con->cerrarConexion();


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

<?php //SALIDAS INFORMATIVAS

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

?>
</body>
</html>