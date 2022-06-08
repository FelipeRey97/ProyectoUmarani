<?php 
session_start(); 
require_once('../Controller/vercarrito.php');
require_once('../Controller/verCheckout.php');
require('../Controller/datosFactura.php');
?>

<?php
 if($_SESSION['cMail'] == ""){
    $value = $_REQUEST['valor'];
    header("Location: http://localhost/UmaraniWeb/View/iniciarSesion.php?valor=$value");
 }
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
                <form action="../View/confirmarPedido.php" method="post">
                    <label for="">Email:</label><br>
                    <input class="ctrl" type="text" value="<?php echo"$mail"?>" name="cmail" ><br><br>
                    <label for="">Nombre:</label><br>
                    <input class="ctrl" type="text" value="<?php echo"$nombre"?>" name="cnombre" ><br><br>
                    <label for="">Apellido:</label><br>
                    <input class="ctrl" type="text" value="<?php echo"$apellido"?>" name="capellido"><br><br>
                    <label for="">Documento:</label><br>
                    <input class="ctrl" type="text" name="cdoc"><br><br>
                    <label for="">Telefono:</label><br>
                    <input class="ctrl" type="text" value="<?php echo"$tel"?>" name="ctelefono"><br><br>
            <div class="shopCartTitle">
                 <h1>Datos de Envío</h1>
             </div>
                    <label for="">Departamento:</label><br>
                    <select class="ctrl" name="dpto" id="">
                        <option value="">Seleccione</option>
                        <option value="AMAZONAS">Amazonas</option>
                        <option value="ANTIOQUIA">Antioquia</option>
                        <option value="ARAUCA">Arauca</option>
                        <option value="ATLANTICO">Atlántico</option>
                        <option value="BOLIVAR">Bolívar</option>
                        <option value="BOYACA">Boyacá</option>
                        <option value="CALDAS">Caldas</option>
                        <option value="CAQUETA">Caquetá</option>
                        <option value="CASANARE">Casanare</option>
                        <option value="CAUCA">Cauca</option>
                        <option value="CESAR">Cesar</option>
                        <option value="CHOCO">Chocó</option>
                        <option value="CORDOBA">Córdoba</option>
                        <option value="CUNDINAMARCA">Cundinamarca</option>
                        <option value="GUAINIA">Guainía</option>
                        <option value="GUAVIARE">Guaviare</option>
                        <option value="HUILA">Huila</option>
                        <option value="LA GUAJIRA">La Guajira</option>
                        <option value="MAGDALENA">Magdalena</option>
                        <option value="META">Meta</option>
                        <option value="NARIÑO">Nariño</option>
                        <option value="NORTE DE SANTANDER">Norte de Santander</option>
                        <option value="PUTUMAYO">Putumayo</option>
                        <option value="QUINDIO">Quindío</option>
                        <option value="RISARALDA">Risaralda</option>
                        <option value="SAN ANDRES Y PROVIDENCIA">San Andrés y Providencia</option>
                        <option value="SANTANDER">Santander</option>
                        <option value="SUCRE">Sucre</option>
                        <option value="TOLIMA">Tolima</option>
                        <option value="VALLE DEL CAUCA">Valle del Cauca</option>
                        <option value="VAUPES">Vaupés</option>
                        <option value="VICHADA">Vichada</option>
                    </select><br><br>  
                    <label for="">Ciudad:</label><br>
                    <input class="ctrl" type="text" name="ciudad"><br><br>
                    <label for="">Dirección:</label><br>
                    <input class="ctrl" type="text" name="direccion"><br><br>
                    <label for="">Detalle Direccion:</label><br>
                    <input class="ctrl" placeholder="Conjuto, Torre, Apartamento" name="detdireccion" type="text"><br><br>
                    <div class="shopCartTitle">
                         <h1>Datos de Pago</h1>
                    </div><br>
                    <select class="ctrl" name="tipoPago" id="">
                        <option value="1">DEBITO</option>
                        <option value="2">CONTRA-ENTREGA</option>
                    </select><br><br>
                    <input type="hidden" name="clienteId" value="<?php echo "$clienteId" ?>">
                    <input class="ctrl" type="submit" value="Confirmar Datos">
                    
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