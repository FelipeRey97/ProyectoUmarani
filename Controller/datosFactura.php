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

<?php

if(isset($_SESSION['cMail'])){

$conexion = mysqli_connect('localhost','root','','proyecto') or 
        die ("problemas en la conexion" . mysqli_error($conexion));

        $registroCliente = mysqli_query($conexion,"select * from cliente where clienteEmail ='$_SESSION[cMail]'") 
        or die ("problemas en el select" . mysqli_error($conexion));

while ($reg = mysqli_fetch_array($registroCliente)){

        
$nombre = $reg['clienteNombre'];
$apellido = $reg['clienteApellido'];
$mail = $reg['clienteEmail'];
$clave = $reg['clienteContraseña'];
$tel = $reg['clienteTelefono'];
$clienteId = $reg['clienteId'];

}

mysqli_close($conexion);

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

        $vmail = false;
        ?>
        <script>
        swal("Atención", "Verifique el E-mail", "warning");
        </script>
        <?php
        
   }
   if(isset($_REQUEST['cnombre']) && $_REQUEST['cnombre'] != "" && preg_match("/^[a-zA-Z ]{3,50}$/",$_REQUEST['cnombre'])){

        $cnombre = htmlentities($_REQUEST['cnombre']);
        $cnombre = filter_var($cnombre, FILTER_SANITIZE_STRING);
        $cnombre = strtoupper($cnombre);

        $vnombre = true;

   }
   else{

        $vnombre = false;
        ?>
        <script>
        swal("Atención", "Verifique el Nombre", "warning");
        </script>
        <?php

   }if(isset($_REQUEST['capellido']) && $_REQUEST['capellido'] != "" && preg_match("/^[a-zA-Z ]{3,50}$/",$_REQUEST['capellido'])){

        $capellido = htmlentities($_REQUEST['capellido']);
        $capellido = filter_var($capellido, FILTER_SANITIZE_STRING);
        $capellido = strtoupper($capellido);

        $vapellido = true;

   }
   else{

        $vapellido = false;
        ?>
        <script>
        swal("Atención", "Verifique el Apellido", "warning");
        </script>
        <?php

   }if(isset($_REQUEST['cdoc']) && $_REQUEST['cdoc'] != "" && preg_match("/^[0-9]{6,12}$/",$_REQUEST['cdoc'])){

        $cdoc = htmlentities($_REQUEST['cdoc']);
        $vdoc = true;

   }
   else{

        $vdoc = false;
        ?>
        <script>
        swal("Atención", "Verifique el documento", "warning");
        </script>
        <?php

   }if(isset($_REQUEST['ctelefono']) && $_REQUEST['ctelefono'] != "" && preg_match("/^[0-9]{5,12}$/",$_REQUEST['ctelefono'])){

        $ctelefono = htmlentities($_REQUEST['ctelefono']);
        $vtelefono = true;

   }
   else{

        $vtelefono = false;
        ?>
        <script>
        swal("Atención", "Verifique el telefono", "warning");
        </script>
        <?php

   }if(isset($_REQUEST['dpto']) && $_REQUEST['dpto'] != "" && preg_match("/^[a-zA-Z ]{4,50}$/",$_REQUEST['dpto'])){

        $dpto = htmlentities($_REQUEST['dpto']);
        $dpto = filter_var($dpto, FILTER_SANITIZE_STRING);
        $vdpto = true;

   }
   else{

        $vdpto = false;
        ?>
        <script>
        swal("Atención", "Verifique el departamento", "warning");
        </script>
        <?php

   }
   if(isset($_REQUEST['ciudad']) && $_REQUEST['ciudad'] != "" && preg_match("/^[a-zA-Z ]{4,50}$/",$_REQUEST['ciudad'])){

        $ciudad = htmlentities($_REQUEST['ciudad']);
        $ciudad = filter_var($ciudad, FILTER_SANITIZE_STRING);
        $ciudad = ucfirst($ciudad);
        $vciudad = true;

   }
   else{

        $vciudad = false;
        ?>
        <script>
        swal("Atención", "Verifique la ciudad, no se permiten caracteres especiales", "warning");
        </script>
        <?php

   }if(isset($_REQUEST['direccion']) && $_REQUEST['direccion'] != ""){

        $direccion = htmlentities($_REQUEST['direccion']);
        $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
        $direccion = ucfirst($direccion);
        $vdireccion = true;

   }
   else{

        $vdireccion = false;
        ?>
        <script>
        swal("Atención", "Verifique la dirección", "warning");
        </script>
        <?php


   }
   if(isset($_REQUEST['detdireccion']) && $_REQUEST['detdireccion'] != ""){

        $detdireccion = htmlentities($_REQUEST['detdireccion']);
        $detdireccion = filter_var($detdireccion, FILTER_SANITIZE_STRING);
        $vdetdireccion = true;
        ?>
        <script>
        swal("Atención", "solo se permiten caracteres especiales # y - para el detalle de dirección", "warning");
        </script>
        <?php
   }
   else{

        $vdetdireccion = false;

   }if(isset($_REQUEST['tipoPago']) && $_REQUEST['tipoPago'] != "" && preg_match("/^[0-9]{1,1}$/",$_REQUEST['tipoPago'])){

        $tipoPago = htmlentities($_REQUEST['tipoPago']);
        $vtipoPago = true;

   }
   else{

        $vtipoPago = false;
        ?>
        <script>
        swal("Atención", "Error en el tipo de pago", "warning");
        </script>
        <?php

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

        ?>
        <script>
        swal("Atención", "Por favor complete los campos requeridos", "warning");
        </script>
        <?php

   }












}


?>

        
</body>
</html>

