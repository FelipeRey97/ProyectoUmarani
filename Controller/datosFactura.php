<?php

 require_once '../Model/M_Clientes.php';

 $client2 = new Clientes();


if(isset($_SESSION['cMail'])){
     $mail = $_SESSION['cMail'];
     $registroCliente = $client2->DetalleCliente($mail);

     if(isset($registroCliente)){
 
         while ($reg = mysqli_fetch_array($registroCliente)){
 
         
          $nombre = $reg['clienteNombre'];
          $apellido = $reg['clienteApellido'];
          $mail = $reg['clienteEmail'];
          $clave = $reg['clienteContraseña'];
          $tel = $reg['clienteTelefono'];
          $clienteId = $reg['clienteId'];
         
             }
 
     }

}else{

     header("Location: ../view/iniciarsesion.php?valor=1");
}

if(isset($_REQUEST['Confirmar'])){

   if(isset($_REQUEST['cmail']) && filter_var($_REQUEST['cmail'], FILTER_VALIDATE_EMAIL)){

        $cmail = filter_var($_REQUEST['cmail'], FILTER_SANITIZE_EMAIL);
        $cmail = filter_var($cmail, FILTER_VALIDATE_EMAIL);

        $vmail = true;

   }
   else{
        $error = "mail";
        $vmail = false;
        
   }
   if(isset($_REQUEST['cnombre']) && $_REQUEST['cnombre'] != "" && preg_match("/^[a-zA-Z ]{3,50}$/",$_REQUEST['cnombre'])){

        $cnombre = htmlentities($_REQUEST['cnombre']);
        $cnombre = filter_var($cnombre, FILTER_SANITIZE_STRING);
        $cnombre = strtoupper($cnombre);

        $vnombre = true;

   }
   else{
        $error = "nombre";
        $vnombre = false;

   }if(isset($_REQUEST['capellido']) && $_REQUEST['capellido'] != "" && preg_match("/^[a-zA-Z ]{3,50}$/",$_REQUEST['capellido'])){

        $capellido = htmlentities($_REQUEST['capellido']);
        $capellido = filter_var($capellido, FILTER_SANITIZE_STRING);
        $capellido = strtoupper($capellido);

        $vapellido = true;

   }
   else{
        $error = "apellido";
        $vapellido = false;

   }if(isset($_REQUEST['cdoc']) && $_REQUEST['cdoc'] != "" && preg_match("/^[0-9]{6,12}$/",$_REQUEST['cdoc'])){

        $cdoc = htmlentities($_REQUEST['cdoc']);
        $vdoc = true;

   }
   else{

        $vdoc = false;

   }if(isset($_REQUEST['ctelefono']) && $_REQUEST['ctelefono'] != "" && preg_match("/^[0-9]{5,12}$/",$_REQUEST['ctelefono'])){

        $ctelefono = htmlentities($_REQUEST['ctelefono']);
        $vtelefono = true;

   }
   else{
        $error = "telefono";
        $vtelefono = false;

   }if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] != "" && preg_match("/^[a-zA-Z ]{4,50}$/",$_REQUEST['dpto'])){

        $dpto = htmlentities($_REQUEST['dpto']);
        $dpto = filter_var($dpto, FILTER_SANITIZE_STRING);
        $vdpto = true;

   }
   else{
     $error = "dpto";
        $vdpto = false;

   }
   if(isset($_REQUEST['ciudad']) && $_REQUEST['ciudad'] != "" && preg_match("/^[a-zA-Z ]{4,50}$/",$_REQUEST['ciudad'])){

        $ciudad = htmlentities($_REQUEST['ciudad']);
        $ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING);
        $ciudad = ucfirst($ciudad);
        $vciudad = true;

   }
   else{
     $error = "ciudad";
        $vciudad = false;

   }if(isset($_REQUEST['direccion']) && $_REQUEST['direccion'] != ""){

        $direccion = htmlentities($_REQUEST['direccion']);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
        $direccion = ucfirst($direccion);
        $vdireccion = true;

   }
   else{
     $error = "direccion";
        $vdireccion = false;

   }
   if(isset($_REQUEST['detdireccion']) && $_REQUEST['detdireccion'] != ""){

        $detdireccion = htmlentities($_REQUEST['detdireccion']);
        $detdireccion = filter_var($detdireccion, FILTER_SANITIZE_STRING);
        $vdetdireccion = true;

   }
   else{
     $error = "detalledir";
        $vdetdireccion = false;

   }if(isset($_REQUEST['tipoPago']) && $_REQUEST['tipoPago'] != "" && preg_match("/^[0-9]{1,1}$/",$_REQUEST['tipoPago'])){

        $tipoPago = htmlentities($_REQUEST['tipoPago']);
        $vtipoPago = true;

   }
   else{
     $error = "tipopago";
        $vtipoPago = false;

   }


   if($vtipoPago == true && $vdireccion == true && $vciudad == true && $vdpto == true && $vtelefono == true && $vdoc = true && $vapellido == true && $vnombre == true){

     
        header("Location: ../View/confirmarPedido.php");

        $_SESSION['mail'] = $cmail;
        $_SESSION['nombre'] = $cnombre;
        $_SESSION['apellido'] = $capellido;
        $_SESSION['doc'] = $cdoc;
        $_SESSION['telefono'] = $ctelefono;
        $_SESSION['dpto'] = $dpto;
        $_SESSION['ciudad'] = $ciudad;
        $_SESSION['direccion'] = $direccion . " " . $detdireccion;
        $_SESSION['clienteId'] = $_REQUEST['clienteId'];
        $_SESSION['tipoPago'] = $tipoPago;
        $_SESSION['direccionCompleta'] = $direccion ." ". $detdireccion . " " . $ciudad . " - " . $dpto;

   }
   else if (empty($_REQUEST['cmail']) || empty($_REQUEST['cnombre']) || empty($_REQUEST['capellido']) || empty($_REQUEST['cdoc']) || empty($_REQUEST['ctelefono']) || empty($_REQUEST['dpto']) || empty($_REQUEST['ciudad']) || empty($_REQUEST['direccion'])){

     $error = "vacio";

   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        case "telefono":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el telefono',
           'warning'
           )
           </script>
     <?php   break;
     case "dpto":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Por favor Verifique el Departamento',
        'warning'
        )
        </script>
  <?php   break;
  case "ciudad":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'Por favor verifique la ciudad',
    'warning'
    )
    </script>
<?php   break;
case "direccion":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'Por favor verifique la dirección',
    'warning'
    )
    </script>
<?php   break;
case "detalledir":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'Solo permiten los caracteres especiales #, -, ° en la direccion ',
    'warning'
    )
    </script>
<?php   break;
case "tipopago":
    ?>
    <script>
    Swal.fire(
    'Atención',
    'por favor seleccione un método de pago válido',
    'warning'
    )
    </script>
<?php   break;
     case "aceptable":
        ?>
        <script>
        Swal.fire(
        'Completado',
        'Se han guardado los cambios satisfactoriamente',
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