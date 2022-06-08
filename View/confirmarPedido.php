<?php 
session_start(); 
$sesionId= session_id();
require_once('../Controller/vercarrito.php');
require_once('../Controller/verCheckout.php');

?>

<?php
 if($_SESSION['cMail'] == ""){
    $value = $_REQUEST['valor'];
    header("Location: http://localhost/UmaraniWeb/View/iniciarSesion.php?valor=$value");
 }

$mail= $_REQUEST['cmail'];
$nombre= $_REQUEST['cnombre'];
$apellido= $_REQUEST['capellido'];
$documento= $_REQUEST['cdoc'];
$telefono= $_REQUEST['ctelefono'];
$dpto= $_REQUEST['dpto'];
$ciudad= $_REQUEST['ciudad'];
$direccion= $_REQUEST['direccion'] ." ". $_REQUEST['detdireccion'];
$clienteId = $_REQUEST['clienteId'];
$todaydate = date('Y/m/d');
$tipoPago = $_REQUEST['tipoPago'];
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
    
    <link rel="stylesheet" href="../CSS/datosFacturaEslitos.css">
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
                        <div class="infoTotal"><P class="shopTotal">$ <?php echo "$total" ?></P>
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
                <b><a href="#">Inicio</a></b>
                <b><a href="../WebUmarani/Collares.html">Collares</a></b>
                <b><a href="../WebUmarani/Pulseras.html">Pulseras</a></b>
                <b><a href="../WebUmarani/anillos.html">Anillos</a></b>
                <b><a href="../WebUmarani/anillos.html">Nosotros</a></b>
                <!-- <a href="#">Ofertas</a> -->

            </div>
        </header>
        <section class="section">
            
         <div class="datosFactura">
           <div class="shopCartTitle">
               <h1>Datos de Contacto</h1><br>
           </div>
                <form action="../Controller/FinalizarCompra.php" method="post">
                    <p class="ctrl"> <?php echo"$mail"?> </p> 
                    <p class="ctrl"> <?php echo"$nombre"?> </p> 
                    <p class="ctrl"> <?php echo"$apellido"?> </p> 
                    <p class="ctrl"> <?php echo"$documento"?> </p> 
                    <p class="ctrl"> <?php echo"$telefono"?> </p> 
            <div class="shopCartTitle">
                 <h1>Datos de Envío</h1>
             </div>
             <p class="ctrl"> <?php echo"$dpto"?> </p> 
                    <p class="ctrl"> <?php echo"$ciudad"?> </p> 
                    <p class="ctrl"> <?php echo"$direccion"?> </p> <br><br>
                        
                     <input type="hidden" name="clienteId" value="<?php echo "$clienteId" ?>"  >
                     <input type="hidden" name="date" value="<?php echo "$todaydate" ?>">
                     <input type="hidden" name="costoTotal" value="<?php echo "$total" ?>">
                     <input type="hidden" name="clienteDoc" value="<?php echo "$documento" ?>">
                     <input type="hidden" name="tipoPago" value="<?php echo "$tipoPago" ?>">
                     <input type="hidden" name="sesionId" value="<?php echo "$sesionId" ?>">
                     <input type="hidden" name="" value="">
                    <input class="ctrl" type="submit" value="Realizar Pedido">
                </form>
            </div>
            <div class="productos">

<?php  
     $totalpagar = 0;
      while($check = mysqli_fetch_array($checkout)) { 

?>
    <div class="articleContainer">
        
        <div class="articleImg">
            <img src="<?php echo "$check[artVista]" ?>" alt="">
        </div>
        <div class="articleInfo">
            <p>ID: <?php echo "$check[artId]" ?> </p>
            <h2> <?php echo "$check[artNombre]" ?></h2>
        </div>
        <div class="articlePrice">
            <h4 >precio Unidad:</h4>
            <p>$ <?php echo "$check[artPrecio]" ?></p>
        </div>
        <div class="articleQuantity">
            <div class="articleQuantityInput">
                <label for="">Cantidad:</label>
                <input type="text" disabled value="<?php echo "$check[artCarroCant]" ?>">
            </div>
            <div class="articleDelete">
                <p><?php $costo = $check['artPrecio'] * $check['artCarroCant']; echo "$costo"; ?></p>
            </div>
        </div>
    </div>
    <?php 
            $totalpagar = $totalpagar + $costo; }
         ?>
          <div class="totalPagar">
               
               <h1>Total</h1>
               <div class="subtotal">
                   <div class="valorSubtotal">
                       <h4>Subtotal</h4>
                       <p><?php echo "$totalpagar" ?></p>
                   </div>
                   <div class="valorEnvio">
                       <h4>Costo Envío </h4>
                       <p>$0</p>
                   </div>
               </div>
               <!-- <div class="descuentos">
                   <div class="totaldescuentos">
                       <h4>Total descuentos</h4>
                       <p>$0</p>
                   </div>
               </div> -->
               <div class="costoFinal">
                   <div class="valorCostoFinal">
                       <h4>Total</h4>
                       <p><?php echo "$totalpagar" ?></p>
                   </div>
               </div>
               <!-- <div class="irPagos">
                   <a href="#">Continuar</a>
               </div> -->
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

    <script src="../JS/CartShop.js"></script>
    <script src="../JS/SearchEngine.js"></script>
</body>
</html>