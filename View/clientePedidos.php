<?php
    
    require_once('../Controller/mostrarPedidosCliente.php');
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
    
    <link rel="stylesheet" href="../CSS/clientePedidos.css">
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
           <nav class="areaClienteNav">
               <h1>Mi cuenta</h1>
               <a href="../View/areaCliente.php">Mi perfil</a><br><br>
               <!-- <a href="">Direcciones de Envío</a><br><br> -->
               <a href="#">Pedidos</a><br><br>
               <a href="../Controller/cerrarSesionCliente.php">Cerrar Sesión</a><br><br>
           </nav>
           
           <div class="arecClienteContent">

           <?php while($order = mysqli_fetch_array($registroPedido)) {

                ?>

            <div class="orders">
                
                <div class="orderInfo">
                    <div class="orderId" >
                        <h4>Id Pedido: <?php echo "$order[pedidoId]";  ?></h4>
                        
                    </div>
                    <div class="orderDate">
                        <h4>Fecha: <?php echo "$order[pedidoFechaInicio]"; ?></h4>
                    </div>
                    <div class="orderValue">
                        <h4>Valor total pedido: $ <?php echo "$order[pedidoCostoTotal]"; ?></h4>
                        
                    </div>
                    <div class="orderCondition">
                        <h4> Estado :  <?php echo "$order[pedidoEstado]"; ?></h4>
                    </div>
                    
                </div>
               
                <div class="orderContainer">

                    <?php   $artPedido = mysqli_query($conexion,"SELECT * FROM pedido
                            JOIN productoporpedido
                            ON pedidoId = prodPed_pedidoId
                            JOIN articulo
                            ON prodPed_artId = artId where pedidoId ='$order[pedidoId]'") 
                            or die ("problemas en el select" . mysqli_error($conexion));
                            ?>
                
                    <div class="articleOrder"> <?php
                            while($ap = mysqli_fetch_array($artPedido)) {

                        ?>
                        <div class="articleContainer">
                            <div class="articleImg">
                                <img src="<?php echo "$ap[artVista]"; ?>" alt="">
                            </div>
                            <div class="articleInfo">
                                <p>ID: <?php echo "$ap[artId]"; ?></p>
                                <h2><?php echo "$ap[artNombre]"; ?></h2>
                                <h4>Precio Unidad:</h4>
                                <p>$ <?php echo "$ap[artPrecio]"; ?></p>
                                <h4>Cantidad:</h4>
                                <p><?php echo "$ap[prodPedCant]"; ?></p>
                            </div>
                        </div>
                        <?php } ?>
                </div> 
                     
                <div class="OrderActions">
                    <a href="#">Detalle Pedido</a>
                    <a href="#">Sigue tu Pedido</a>
                    <a href="#">Necesito Ayuda</i></a>
                 </div> 
                </div>
            </div>

            <?php }  ?>
               
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