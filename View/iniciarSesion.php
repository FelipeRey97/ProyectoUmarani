<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <link rel="stylesheet" href="../CSS/iniciarSesionEstilos.css">
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
            <div class="form-container">
                <h1>Acceso a tu cuenta</h1>
                <form action="../Controller/iniciarSesion2.php" method="post" class="iniciar-sesion">
                    <label for="">Correo electrónico:</label><br>
                    <input class="control" type="text" name="cMail" required>  <br>
                    <label for="">Contraseña:</label><br>
                    <input class="control" type="password" name="cPassword" required><br>
                    <p>¿Nuevo en Umarani? <a href="../WebUmarani/Registrarse.html"> <b>Regístrate aquí</b> </a></p><br><br>
                    <a href="../WebUmarani/recuperarContraseña.html"><b>¿Olvidaste tu contraseña?</b></a><br><br>
                    <input class="boton-iniciarSesion" type="submit" value="Iniciar Sesión">
                </form>
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
    <script src="../WebUmarani/JS/carrito.js"></script>
</body>
</html>