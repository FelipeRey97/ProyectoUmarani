<?php
session_start();
require_once('../Controller/CambiarClave.php');


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
<link rel="stylesheet" href="../CSS/tiendaEstilos.css">
<script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre">

        <div class="board">
            <div class="titulo">
                <h1>Tienda Web Umarani</h1>
            </div>
            <div class="usuario">
            <h4><?php echo "$_SESSION[rol] "; ?></h4>
                <h5><?php echo "$_SESSION[nombre] $_SESSION[apellido] "; ?></h5>
            </div>
            <nav class="secciones">
            <a href="">Inicio</a>
                <a href="../View/Productos.php?pagina=1">Productos</a> 
                <a href="../View/pedidos.php?pagina=1">Pedidos</a>
                <a href="../view/facturas.php?pagina=1">Facturas</a>
                <?php if($_SESSION['rol'] == 'ADMINISTRADOR')  { ?>
                <a href="../View/Usuarios.php?pagina=1">Usuarios</a>
                <a href="../View/adminClientes.php?pagina=1">Clientes</a> <?php } ?>
                <a href="../View/PQRS.php?pagina=1">PQRS</a><br><br><br>
                <a href="../View/cambiarClave.php">Cambiar Clave</a>
                <a href="../Controller/cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Cambio de Contraseña</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="filtros" >
                    <?php  ?>
                    <form action="" method="post">
                        <label for="unombre" >Clave anterior: </label><br>
                        <input placeholder="Ingrese la Clave actual" required class="control" type="password" name="claveActual"><br><br>
                        <label for="upellido">Nueva Clave:  </label><br>
                        <input placeholder="Ingrese la nueva Clave"  required class="control" type="password" name="nuevaClave1"><br><br>
                        <label for="udocumento">Confirmar Clave:  </label><br>
                        <input placeholder="Confirme la nueva Clave" required class="control" name="nuevaClave2" type="password" > <br><br>
                        <input class="registrar" type="submit" name="actualizar" value="Cambiar Contraseña">
                        <a class="searchButton" href="../View/pedidos.php">Volver</a>
                    </form>
 
                </div>
 
            </div>
        </section>
        </div>
        
    </div>
    <footer class="footer">
        <p>copyright 2022 Todos los derechos reservados</p>
    </footer>
</body>
</html>