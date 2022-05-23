<?php
session_start();
?>
<?php 
    if($_SESSION['cMail'] == false){

        header("Location: iniciarSesion.php");
    }

?>

<?php 
    $conexion = mysqli_connect("localhost","root","","proyecto") 
    or die ("problemas con la conexion");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <link rel="stylesheet" href="../CSS/areaClienteEstilos.css">
    <script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre">
        <header class="header">
            <div class="contacto">
               <a class="searchButton" href="#"> <i class="fas fa-search"></i></a>
                <a href="../WebUmarani/iniciarSesion.html"><i class="fas fa-user"></i></a>
                <a class="kartButton" href="#"><i class="fas fa-shopping-bag"></i></a>
            </div>
            <div class="kartOpacity ocultar">
                <div class="carrito "  > 
                    <div class="top">
                        <a href="#">Carrito de Compras</a> <a class="cerrar-carrito" href="#"> <i class="fas fa-times"></i> </a>
                    </div>
                    <div class="middle">
    
                    </div>
                    <div class="bottom">
                        <div class="infoTotal"><P class="shopTotal">$0</P>
                             <a class="buy-button" href="#">Ver Carrito</a>
                        </div>
                    </div>
               
                </div>
            </div>
            <div class="searchOpacity ocultar ">
                <div class="searchEngine "  > 
                    <div class="topSearchEngine">
                        <a href="#">BUSCAR EN EL SITIO</a> <a class="cerrar-buscador" href="#"> <i class="fas fa-times"></i></a>
                    </div>
                    <div class="middleSearchEngine">
                        <input type="text" placeholder="Buscar Productos" >
                    </div>
                    <div class="bottomSearchEngine">
                        
                    </div>
               
                </div>
            </div>
           
                <div class="logo">
                    <a href="#"><img src="../WebUmarani/imagenes/logo.png" alt=""></a>
                    
                </div>
               
            
            <div class="menu">
                <b><a href="Index.php">Inicio</a></b>
                <b><a href="Collares.php">Collares</a></b>
                <b><a href="Pulseras.php">Pulseras</a></b>
                <b><a href="anillos.php">Anillos</a></b>
                <b><a href="anillos.php">Nosotros</a></b>
                <!-- <a href="#">Ofertas</a> -->

            </div>
        </header>
        <section class="section">
           <nav class="areaClienteNav">
               <h1>Mi cuenta</h1>
               <a href="#">Mi perfil</a><br><br>
               <a href="clienteDirecciones.php">Direcciones de Envío</a><br><br>
               <a href="#">Pedidos</a><br><br>
               <a href="cerrarSesionCliente.php">Cerrar Sesión</a><br><br>
           </nav>

           <?php 

            $registroCliente = mysqli_query($conexion,"select * from cliente where clienteEmail ='$_SESSION[cMail]'") 
            or die ("problemas en el select" . mysqli_error($conexion));

            while ($reg = mysqli_fetch_array($registroCliente)){

                $nombre = $reg['clienteNombre'];
                $apellido = $reg['clienteApellido'];
                $telefono = $reg['clienteTelefono'];
                $mail = $reg['clienteEmail'];
            }

           ?>
           <div class="arecClienteContent">
               <h2>Información Personal</h2>
               <div class="nombre">
                   <div class="contents">
                       <h3>Nombre</h3>
                       <p><?php echo "$nombre"; ?> <?php echo "$apellido"; ?></p>
                   </div>
                   <div class="edit">
                       <a href="#">Editar</a>
                   </div>
               </div>
               
               <div class="password">
                <div class="contents">
                    <h3>Contraseña</h3>
                    <p>*******</p>
                </div>
                <div class="edit">
                    <a href="#">Editar</a>
                </div>
               </div>
               <h2>Información de Contacto</h2>
               <div class="telefono">
                <div class="contents">
                    <h3>Teléfono</h3>
                    <?php 
                        if($telefono == ""){
                        ?>  
                            <form action="" method="post">
                            <input type="text" placeholder="Añadir Telefono">
                            <input type="submit" value="Guardar">
                            </form>
                            </div>
                        <?php 
                        }
                        else{
                            ?>
                            <p>3154272647</p>
                            </div>
                             <div class="edit">
                             <a href="#">Editar</a>
                            </div>
                        <?php
                        }
                        ?>
                
                
               </div>
               <div class="email">
                <div class="contents">
                    <h3>E-mail</h3>
                    <p><?php echo"$mail"; ?></p>
                        
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

    <script src="../WebUmarani/JS/ShopingCart.js"></script>
    <script src="../WebUmarani/JS/SearchEngine.js"></script>
</body>
</html>