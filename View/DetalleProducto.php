<?php
include('../Controller/DetalleArticulo.php');


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

<link rel="stylesheet" href="../CSS/detalleProdEstilos.css">
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
        <!-- Carro de compras  -->
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
        <!-- Apertura para la busqueda -->
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
                <a href="#"><img src="../Uploads/logo.png" alt=""></a>
                
            </div>
            
        <div class="menu">
            <b><a href="../View/catalogo.php">Inicio</a></b>
            <b><a href="#">Collares</a></b>
            <b><a href="#">Pulseras</a></b>
            <b><a href="#">Anillos</a></b>
            <b><a href="#">Nosotros</a></b>
            <!-- <a href="#">Ofertas</a> -->

        </div>
    </header>
        <section class="section">
            <div class="producto">
                <div class="imagen">
                    <img src="<?php echo "$artVista" ?>" alt="">
                </div>
            </div>
            <div class="detalles">
                <div class="titulo">
                    <h1><?php echo "$artNombre" ?></h1> <br><br>
                    <p><b>Categoría:</b> Lorem, ipsum dolor.</p>
                    <p><b>Material:</b> Lorem, ipsum dolor.</p>
                    
                    <div class="descripcion">
                        <h2>Descripción</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic veritatis tenetur dolores incidunt, perferendis obcaecati sunt quod fugiat ducimus! Perferendis aspernatur corporis reiciendis quos nobis quis sapiente autem dolore debitis.</p>   
                    </div>
                </div>
                
            </div>
            <div class="valor">
                <div class="precio"><p href="#"> $ <?php echo "$artPrecio" ?></p><br></div>
                   <div class="estado"><p href="#"><b><?php echo "$artEstado" ?></b></p><br></div> 
                    <div class="comprar"><a href=""><i class="fas fa-cart-plus"></i> Añadir al carrito</a><br></div>
                    <div class="favoritos"><a href="<?php echo $_SERVER['HTTP_REFERER'];  ?>"> Regresar </a><br></div>
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

    
</body>
</html>