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

        require_once('../Model/M_Clientes.php');

        $cliente1 = new Clientes;

        if($_REQUEST['cNombre'] !="" && $_REQUEST['cApellido'] !="" && $_REQUEST['cMail'] !="" && $_REQUEST['cPassword'] !=""){

            $cNombre = $_REQUEST['cNombre'];
            $cApellido = $_REQUEST['cApellido'];
            $cMail = $_REQUEST['cMail'];
            $cPassword = $_REQUEST['cPassword'];

            $cliente1->insertarCliente($cNombre,$cApellido,$cMail,$cPassword);

            ?>
            <script>
                swal("Operación Realizada","Te has registrado correctamente", "success");
            </script>
            
            <?php
            // header('refresh:1;url=')

        }
        else{

            ?>
            <script>
            swal("Atención", "Por favor complete todos los campos", "warning");
            </script>
            <?php
            
            }

        // $conexion = mysqli_connect("localhost","root","","proyecto")
        // or die("problemas con la conexion");

        // mysqli_query($conexion,"insert into cliente (clienteNombre,clienteApellido,clienteEmail,clienteContraseña)
        // values('$_REQUEST[cNombre]','$_REQUEST[cApellido]','$_REQUEST[cMail]','$_REQUEST[cPassword]')") 
        // or die ("problemas en el select" . mysqli_error($conexion));

        // echo "Te has Registrado correctamente";

       
    ?>
    
        

</body>
</html>