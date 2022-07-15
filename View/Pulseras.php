<?php
session_start();
$sesionId= session_id();
require "../Controller/mostrarCatalogo.php";
require('../Controller/vercarrito.php');
require_once("../Controller/buscador.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

<link rel="stylesheet" href="../CSS/estilos.css">
<script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

<div class="padre">
    <header class="header">
    <div class="contacto">
            <a class="searchButton" href="#"> <i class="fas fa-search"></i></a>
            <a class="accountButton" href="#"><i class="fas fa-user"></i></a>
            <a class="kartButton" href="#"><i class="fas fa-shopping-bag"></i></a>
        </div>
        <!-- Carro de compras  -->
        <div class="kartOpacity ocultar">
            <div class="carrito "  > 
                <div class="top">
                    <a href="#">Carrito de Compras</a> <a class="cerrar-carrito" href="#"> <i class="fas fa-times"></i> </a>
                </div>

                <div class="middle">
                <?php 
                $total = 0;
                while($dat = mysqli_fetch_array($datos)) {  

                    
                ?>
                    <div class="contenedor kartItem">
                    
                                <div class="miniatura">
                                    <img src= " <?php echo "$dat[artVista]"  ?>" alt="">
                                </div>
                                <div class="info">
                                    <h3 class="title"><?php echo "$dat[artNombre]"  ?></h3>
                                    <br> <p class="price" ><?php $costo = $dat['artPrecio'] * $dat['artCarroCant']; echo "$costo";  ?></p>
                                </div>
                                <form action="" class="cantidad">
                                    <label for="">Cantidad:</label>
                                    <p class="quantity">   <?php echo "$dat[artCarroCant]" ?></p>
                                        <a class= "delete" href="../Controller/borrarCarrito.php?artId=<?php echo "$dat[artId]"?>&sesionId=<?php echo "$sesionId" ?>"><i class="far fa-window-close"></i></a>
                                </form>

                    </div> 
                    <?php 
                    $total = $total + $costo; }
                    ?>
                </div>

                <div class="bottom">
                    <div class="infoTotal"><P class="shopTotal">TOTAL: $ <?php echo "$total" ?></P>
                            <a class="buy-button" href="../View/checkout.php">Checkout</a>
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
                    <form action="" method="post">
                    <input onkeyup="buscar_ahora($('#buscar').val());" type="text" name="buscar" id="buscar" placeholder="Buscar Productos" >
                    <div id="datos_buscador" class=" kartItem"> </div>
                    </form>
                    <script>
                        function buscar_ahora(buscar){
                        var parametros = {"buscar":buscar};
                        $.ajax({
                        data:parametros,
                        type: 'POST',
                        url: '../Controller/buscador.php',
                        success: function(data){

                            document.getElementById("datos_buscador").innerHTML = data;
                        }
                        })
                        }

                    </script>
                        

                    
                    
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
                    <a href="../View/areaCliente.php"><i class="fas fa-user-circle"></i> Mi perfil </a><br><br>
                    <a href="../View/clientePedidos.php"><i class="fas fa-dolly"></i> Mis compras </a><br><br>
                    <a href="../Controller/cerrarSesionCliente.php"><i class="fas fa-door-open"></i> cerrar Sesion </a><br><br>
                    

                    <?php
                        }
                        else{

                            ?>
                            <a href="iniciarSesion.php"><i class="fas fa-sign-in-alt"></i>  Iniciar Sesion </a><br><br>
                            <a href="registrarse.php"><i class="fas fa-user-plus"></i> Registrarse </a><br><br>
                                <a href="../View/ayudaCliente.php"><i class="fas fa-question"></i>  Ayuda </a><br><br>
                        
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
                <b><a href="../View/catalogo.php?">Inicio</a></b>
                <b><a href="../View/Collares.php?seccion=collares">Collares</a></b>
                <b><a href="#">Pulseras</a></b>
                <b><a href="../View/anillos.php?seccion=anillos">Anillos</a></b>
                <b><a href="..">Nosotros</a></b>
                <!-- <a href="#">Ofertas</a> -->

        </div>
    </header>
    <section class="section">
        <form action="">
            <input type="submit" value="Filtrar"><br>
            <input type="checkbox" name="Recientes">Recientes<br>
            <input type="checkbox" name="Antiguos">Antiguos<br>
            <input type="checkbox" name="Mayor">Precio Mayor<br>
            <input type="checkbox" name="Menor">Precio Menor<br>
            <input type="hidden" name="seccion" value="pulseras" >
        </form>
    <?php
            // Se muestra cada "producto" almacenado en productos
                    foreach($productos as $producto){
                    
                    ?>
        <article class="producto">
            <div class="imagen">
                <img class="image" src="<?php echo $producto['artVista']   ?>" alt="">
            </div>
            <div class="titulo">
                <a href="#"><?php echo $producto['artNombre']  ?></a>
            </div>
            <div class="precio">
                <p href="#"><?php echo $producto['artPrecio']   ?></p>
            </div>
            <div class="verdetalle itemId">
                    <p hidden><?php echo $producto['artId']   ?></p>
                <a href="../view/DetalleProducto.php?arId=<?php echo "$producto[artId]"?>">Ver Detalle</a>
            </div>
            <div class="comprar addToKart">
                <a href="../Controller/carrito.php?sesionId=<?php echo "$sesionId"?>&artId=<?php echo "$producto[artId]"?>&Cant=1">Comprar</a>
            </div>
        </article>
        <?php  
                        
                    }
                    ?>
                
        <nav class="navegacion">
        </nav>
    </section>
    <footer class="footer">
        <div class="informacion">
            <div class="servicio">
                <h1>Servicio al cliente</h1>
                <a href="../View/DespachosyEnvios.php">Despachos y Envíos<br><br></a>
                <a href="../View/terminosycondiciones.php">Términos y Condiciones<br><br></a>
                <a href="../View/ayudaCliente.php">Sporte a Cliente<br></a>
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


<script src="../JS/CartShop.js"></script>
<script src="../JS/SearchEngine.js"></script>
<script src="../JS/accountMenu.js"></script>
</body>
</html>