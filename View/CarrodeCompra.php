<?php session_start(); 

session_id();

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
    
    <link rel="stylesheet" href="../CSS/carroDeCompras.css">
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
                    <a href="#"><img src="../Uploads/logo.png" alt=""></a>
                    
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
           <div class="shopCartTitle">
               <h1>Carrito de compras</h1>
           </div>
           <div class="productos">
               <div class="articleContainer">
                   <div class="articleImg">
                       <img src="../WebUmarani/imagenes/Collares/collar6.jpg" alt="">
                   </div>
                   <div class="articleInfo">
                       <p>ID: 321548932</p>
                       <h2>Violet Collar</h2>
                   </div>
                   <div class="articlePrice">
                       <h4 >precio Unidad:</h4>
                       <p>$15000</p>
                   </div>
                   <div class="articleQuantity">
                       <div class="articleQuantityInput">
                           <label for="">Cantidad:</label>
                           <input type="number" value="1">
                       </div>
                       <div class="articleDelete">
                           <a href="#"><i class="far fa-window-close"></i></a>
                       </div>
                   </div>
               </div>
           </div>
           <div class="totalPagar">
               <h1>Mi Carrito</h1>
               <div class="subtotal">
                   <div class="valorSubtotal">
                       <h4>Subtotal</h4>
                       <p>$15000</p>
                   </div>
                   <div class="valorEnvio">
                       <h4>Costo Envío </h4>
                       <p>$0</p>
                   </div>
               </div>
               <div class="descuentos">
                   <div class="totaldescuentos">
                       <h4>Total descuentos</h4>
                       <p>$0</p>
                   </div>
               </div>
               <div class="costoFinal">
                   <div class="valorCostoFinal">
                       <h4>Total</h4>
                       <p>$15000</p>
                   </div>
               </div>
               <div class="irPagos">
                   <a href="#">Ir a Pagar</a>
               </div>
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