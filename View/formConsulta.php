<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <link rel="stylesheet" href="../CSS/formGarantia.css.">
    <script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre"> 
        <header class="header">
            <div class="contacto">
               <a href="#"> <i class="fas fa-search"></i></a>
                <a href="../WebUmarani/iniciarSesion.html"><i class="fas fa-user"></i></a>
                <a class="kartButton" href="#"><i class="fas fa-shopping-bag"></i></a>
            </div>
            <div class="carrito "  >
            </div>
            <!-- <div class="infoTotal"><P class="shopTotal" >$0</P>
                <a class="buy-button" href="#">Comprar</a>
            </div> -->
                
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
        <?php  
        
        $fecha=date("Y/m/d");
        
        ?>

            <div class="form-container">
                <h1>Escr??benos</h1><br>
                <!-- <p class="info" >Llena el siguiente formulario para rep??rtanos errores en tu pedido, <br> nuestra ??rea de servicio al cliente te estar?? respondiendo en un <br> lapso m??ximo de 2 d??as h??biles</p> -->
            <form action="../Controller/formGarantia2.php" method="post" class="iniciar-sesion" enctype="multipart/form-data">
                <label for="">Nombre completo*:</label><br>
                <input class="control" type="text" required name="pNombre">  <br>
                <label for="">Email*:</label><br>
                <input class="control" type="text" required name="pMail" >  <br>
                <label for="">T??lefono de contacto:</label><br>
                <input class="control" type="text" required name="ptelefono">  <br>
                <!-- <label for="">N??mero del pedido*:</label><br>
                <input class="control" type="text" name="pNumero"><br> -->
                <!-- <label for="">Imagen del producto donde se evidencie el problema de calidad:</label><br>
                <input class="control" type="file"   name="pImagen"><br> -->
                <label for="">Escribe tu mensaje*:</label><br>
                <textarea class="control" name="pComentario"></textarea><br>
                <input type="hidden" value="<?php echo "$_REQUEST[pqTipo]" ?>" name=tipoId >
                <input type="hidden" value="<?php echo "$fecha"; ?>" name=pFecha >
                <input class="boton-iniciarSesion" type="submit" value="Enviar">
            </form>
        </div>
        </section>
        <footer class="footer">
            <div class="informacion">
                <div class="servicio">
                    <h1>Servicio al cliente</h1>
                    <a href="../WebUmarani/DespachosyEnvios.html">Despachos y Env??os<br><br></a>
                    <a href="../WebUmarani/terminosycondiciones.html">T??rminos y Condiciones<br><br></a>
                    <a href="../WebUmarani/terminosycondiciones.html">Tratamiento de datos<br></a>
                </div>
                <div class="nosotros">
                    <h1>Acerca de nosotros</h1>
                    <a href="#">Vende Umarani <br><br></a>
                    <a href="#">Conoce Umarani <br><br></a>
                    <a href="#">Blog<br></a>
                </div>
                <div class="contactoinfo">
                    <h1>Cont??ctanos</h1>
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

    <script src="../WebUmarani/JS/carrito.js"></script>
</body>
</html>