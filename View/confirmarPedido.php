<?php 
session_start(); 
$sesionId= session_id();
require_once('../Controller/carrito.php');
require_once('../Controller/verCheckout.php');
include_once('../Controller/datosFactura.php')

?>

<?php
 if($_SESSION['cMail'] == ""){
    $value = $_REQUEST['valor'];
    header("Location: ../view/iniciarSesion.php?valor=$value");
 }

 $todaydate = date('Y/m/d');
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
    foreach($datos as $dat) {  
 
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
                            <a class= "delete" href="../Controller/carrito.php?delete=1&artId=<?php echo "$dat[artId]"?>&sesionId=<?php echo "$sesionId" ?>"><i class="far fa-window-close"></i></a>
                    </form>

        </div> 
        <?php 
        $total = $total + $costo; }
        if($total == 0){

            header("Location: ../view/catalogo.php");

        }else{
        
            
        } ?>
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
<b><a href="../View/catalogo.php">Inicio</a></b>
<b><a href="../View/collares.php?seccion=collares">Collares</a></b>
<b><a href="../View/pulseras.php?seccion=pulseras">Pulseras</a></b>
<b><a href="../View/anillos.php?seccion=anillos">Anillos</a></b>
<b><a href="../View/terminosycondiciones.php">Nosotros</a></b>
<!-- <a href="#">Ofertas</a> -->

</div>
</header>
        <section class="section">
            
         <div class="datosFactura">
           <div class="shopCartTitle">
               <h1>Datos de Contacto</h1><br>
           </div>
                <form action="../Controller/FinalizarCompra.php" method="post">
                    <p class="ctrl"> <?php echo"$_SESSION[mail]";?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[nombre]";?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[apellido]"?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[doc]"?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[telefono]"?> </p> 
            <div class="shopCartTitle">
                 <h1>Datos de Envío</h1>
             </div>
             <p class="ctrl"> <?php echo"$_SESSION[dpto]"?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[ciudad]"?> </p> 
                    <p class="ctrl"> <?php echo"$_SESSION[direccion]"?> </p> <br><br>
                        
                     <input type="hidden" name="clienteId" value="<?php echo "$_SESSION[clienteId]"; ?>"  >
                     <input type="hidden" name="date" value="<?php echo "$todaydate"; ?>">
                     <input type="hidden" name="costoTotal" value="<?php echo "$total"; ?>">
                     <input type="hidden" name="clienteDoc" value="<?php echo "$_SESSION[doc]"; ?>">
                     <input type="hidden" name="tipoPago" value="<?php echo "$_SESSION[tipoPago]" ?>">
                     <input type="hidden" name="sesionId" value="<?php echo "$sesionId" ?>">
                     <input type="hidden" name="direccionC" value="<?php echo "$_SESSION[direccionCompleta]" ?>">
                     <input type="hidden" name="dpto" value="<?php echo "$_SESSION[dpto]" ?>">
                     <input type="hidden" name="ciudad" value="<?php echo "$_SESSION[ciudad]" ?>">
                     <input type="hidden" name="direccion" value="<?php echo "$_SESSION[direccion]" ?>">
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
    <script src="../JS/accountMenu.js"></script>
</body>
</html>