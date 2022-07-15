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

<link rel="stylesheet" href="../CSS/condicionesEstilos.css">
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
            <b><a href="../View/catalogo.php">Inicio</a></b>
            <b><a href="../View/collares.php?seccion=collares">Collares</a></b>
            <b><a href="../View/pulseras.php?seccion=pulseras">Pulseras</a></b>
            <b><a href="../View/anillos.php?seccion=anillos">Anillos</a></b>
            <b><a href="../View/terminosycondiciones.php">Nosotros</a></b>
            <!-- <a href="#">Ofertas</a> -->

        </div>
    </header>
        <section class="section">
            <div>
            <h1> Proteccion de datos </h1><br>
            <h2>POLITICA DE PRIVACIDAD</h2><br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque omnis eum aperiam! Laboriosam, iusto. Nulla dolore, necessitatibus deleniti odit nesciunt excepturi! Repellendus nulla sapiente doloremque expedita vitae laboriosam harum dolore?:</p> 
            <h2>Responsable del Fichero</h2><br>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Natus possimus optio nobis?: <br><br>

                UMARANI ACCESORIOS <br>
                
                Tel. : +57(7) 6000000 / Tel. : +57 (7) 6555555 <br>
                Umarani@gmail.com</p>
            <h2>Usos y Finalidades de los Datos Recogidos</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non repellendus, porro eveniet repellat reiciendis ex?: <br><br>

                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam dolores exercitationem aspernatur laboriosam dolore, temporibus laudantium culpa ex ipsam sunt, impedit quod dolor esse ut.</li> <br>

                <li> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos voluptate voluptatem ab magnam odio. Quam obcaecati dolorem temporibus esse maxime hic. Error corrupti nam odit, quaerat facilis nobis dolor consequuntur!</li> <br>
                 
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis odio tempora, temporibus reprehenderit aliquam id nam ea! Error, exercitationem. Perferendis quas qui odit eos amet nisi eius corporis.</li><br>
               
                <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error pariatur quisquam recusandae nostrum nemo ex, aspernatur consequatur sit alias, vel dolore blanditiis cumque, ratione explicabo!</li><br>

                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem ab atque eligendi fuga voluptas sed illum fugiat voluptatibus voluptates, at nihil nesciunt blanditiis? Magnam veritatis quia aliquid dignissimos maiores beatae? </li><br>

                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus tempore aliquam fugiat itaque id accusamus nesciunt laboriosam, hic quo? Accusantium, assumenda.</li><br>
                </p>

            <h2>Comunicación de Datos a Terceros</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur ducimus laboriosam aliquid cumque ut quo culpa esse molestias?: <br><br>

               <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minus, exercitationem eveniet odio sunt quaerat nisi possimus.</li> <br>
                <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis maiores harum ducimus incidunt hic adipisci temporibus enim recusandae!</li> <br>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt magni aut eaque provident est quod eligendi! Autem, cumque vel.</li> <br>
               <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, cum est? Architecto, dolorem perspiciatis, dolores in nostrum minus aspernatur nemo quisquam eum labore modi.</li> <br>
            </p>
            <h2>Confidencialidad</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique quidem itaque fuga eius quibusdam obcaecati amet voluptates fugiat, earum illum, aut aspernatur atque natus. Eveniet, reprehenderit aperiam!</p>
            <h2>Ejercicio de Derechos</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos excepturi obcaecati error debitis quis, consectetur voluptates dolor similique alias placeat unde voluptate aut, soluta sapiente explicabo at quo consequuntur neque!</p>
            </div>
            
        </section>
        <footer class="footer">
            <div class="informacion">
                <div class="servicio">
                    <h1>Servicio al cliente</h1>
                    <a href="../WebUmarani/DespachosyEnvios.html">Despachos y Envíos<br><br></a>
                    <a href="#">Términos y Condiciones<br><br></a>
                    <a href="#">Tratamiento de datos<br></a>
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