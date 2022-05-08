<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <link rel="stylesheet" href="../WebUmarani/CSS/formGarantia.css">
    <script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre">
        <header class="header">
            <div class="contacto">
               <a href="#"> <i class="fas fa-search"></i></a>
                <a href="../WebUmarani/iniciarSesion.html"><i class="fas fa-user"></i></a>
                <a class="kartButton" href="#"><i class="fas fa-shopping-bag"></i></a>
            </div>
            <div class="carrito "  >
            </div>
            <!-- <div class="infoTotal"><P class="shopTotal" >$0</P>
                <a class="buy-button" href="#">Comprar</a>
            </div> -->
                
                <div class="logo">
                    <a href="#"><img src="../WebUmarani/imagenes/logo.png" alt=""></a>
                    
                </div>
               
            
            <div class="menu">
                <b><a href="#">Inicio</a></b>
                <b><a href="../WebUmarani/Collares.html">Collares</a></b>
                <b><a href="../WebUmarani/Pulseras.html">Pulseras</a></b>
                <b><a href="../WebUmarani/anillos.html">Anillos</a></b>
                <b><a href="../WebUmarani/anillos.html">Nosotros</a></b>
                <!-- <a href="#">Ofertas</a> -->

            </div>
        </header>
        <section class="section">
            <?php

                $conexion = mysqli_connect("localhost","root","","proyecto") 
                or die ("problemas con la conexion");

                $registros = mysqli_query($conexion,"select * from cliente where clienteEmail = '$_REQUEST[pMail]'") 
                or die ("problemas en el select" . mysqli_error($coneixon));

                if(isset($registros)){


                    while($reg = mysqli_fetch_array($registros)){

                        $clienteId = $reg['clienteId'];

                    }
                }
                else{

                    $clienteId = null;

                }

                $nombre_imagen = $_FILES['pImagen']['name'];
                $temporal = $_FILES['pImagen']['tmp_name'];
                $carpeta = "../WebUmarani/Uploads/ReclamoImagen";
                $ruta = $carpeta.'/'.$nombre_imagen;

                move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);


                mysqli_query($conexion,"insert into pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsClienteId,pqrsPedidoId,pqrsImagen)
                values('$_REQUEST[pNombre]','$_REQUEST[pMail]','$_REQUEST[ptelefono]','$_REQUEST[pComentario]',$_REQUEST[tipoId],'$_REQUEST[pFecha]',
                $clienteId,$_REQUEST[pNumero],'$ruta')");
     

            ?>




           
        </div>
        </section>
        <footer class="footer">
            <div class="informacion">
                <div class="servicio">
                    <h1>Servicio al cliente</h1>
                    <a href="../WebUmarani/DespachosyEnvios.html">Despachos y Envíos<br><br></a>
                    <a href="../WebUmarani/terminosycondiciones.html">Términos y Condiciones<br><br></a>
                    <a href="../WebUmarani/terminosycondiciones.html">Tratamiento de datos<br></a>
                </div>
                <div class="nosotros">
                    <h1>Acerca de nosotros</h1>
                    <a href="#">Vende Umarani <br><br></a>
                    <a href="#">Conoce Umarani <br><br></a>
                    <a href="#">Blog<br></a>
                </div>
                <div class="contactoinfo">
                    <h1>Contáctanos</h1>
                    <a href="#"><i class="far fa-envelope"></i> Umarani@gmail.com<br><br></a>
                    <a href="#"><i class="fab fa-facebook-square"></i> Umarani@Facebook<br><br></a>
                    <a href="#"><i class="fab fa-instagram"></i> @Umarani<br></a>
                </div>
            </div>
            <div class="pie">
                <div class="desarrollado">
                    <p>Desarrollado por Andres Felipe Rey</p>
                </div>
            </div>
        </footer>

    </div>

    <script src="../WebUmarani/JS/carrito.js"></script>
</body>
</html>