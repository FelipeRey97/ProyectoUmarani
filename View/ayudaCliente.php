<?php
session_start();
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
    <!-- Hola mundo -->
    <link rel="stylesheet" href="../CSS/ayudaCliente.css">
    <script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre">
        <header class="header">
            <div class="contacto">
                <a class="accountButton"  href="#"> <i class="fas fa-user"></i></a>
               <a class="searchButton" href="#"> <i class="fas fa-search"></i></a>
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
            <div class="accountOpacity ocultar">
                <div class="accountMenu "  > 
                    <div class="topAccountMenu">
                        <a href="#"></a> <a class="cerrar-menuCuenta" href="#"> <i class="fas fa-times"></i></a>
                    </div>
                    <div class="middleAccountMenu">
                    <?php
                         if(isset($_SESSION['cMail'])){

                            
                         
                    ?>
                        <a href="areaCliente.php">Mi perfil </a><br><br>
                        <a href="#">Mis compras </a><br><br>
                        <a href="#">cerrar Sesion </a><br><br>
                        

                        <?php
                            }
                            else{

                                ?>
                                <a href="iniciarSesion.php">Iniciar Sesion </a><br><br>
                                <a href="registarse.php">Registrarse </a><br><br>
                                 <a href="#">Ayuda </a><br><br>
                            
                            <?php

                                }   
                                ?>
                            
                    </div>
                    <div class="bottomAccountMenu">
                        
                    </div>
               
                </div>
            </div>
           
                <div class="logo">
                    <a href="#"><img src="../Uploads/logo.png" alt=""></a>
                    
                </div>
               
            
            <div class="menu">
                <b><a href="#">Inicio</a></b>
                <b><a href="Collares.php">Collares</a></b>
                <b><a href="Pulseras.php">Pulseras</a></b>
                <b><a href="anillos.php">Anillos</a></b>
                <b><a href="Nosotros.php">Nosotros</a></b>
                <!-- <a href="#">Ofertas</a> -->

            </div>
        </header>
        <section class="section">

             <h1>Hola, ¿Cómo te podemos ayudar?</h1><br><br>
             <div class="contentLinks">
                <a href="../View/formGarantia.php?pqTipo=1">Necesito reportar una <br><br> <b>Garantia </b> </a>
                <a href="../view/formErrorPedido.php?pqTipo=2">Necesito reportar un<br><br> <b>Error en mi Pedido</b></a>
                <!-- <a href="">Quiero comprar<br><br> <b>Al por Mayor</b></a> -->
                <a href="../View/formConsulta.php?pqTipo=3">Quiero hacer una <br><br> <b>Pregunta General</b></a>

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
    <script src="../WebUmarani/JS/accountMenu.js"></script>
</body>
</html>