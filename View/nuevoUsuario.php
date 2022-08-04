<?php
    session_start();
    if($_SESSION['doc'] == false){

        header("Location: ..View/loginUsuario.php");
    }
    require('../Controller/crearUsuario2.php');
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
                <h4>Nombre de Usuario</h4>
                <h5>Administrador</h5>
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
            <h1>Registro de Usuarios</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="filtros" >
                    <?php  ?>
                    <form action="" method="post">
                        <label for="unombre" >Nombres: </label><br>
                        <input placeholder="Ingrese Los Nombres" pattern="[A-Za-z ]{3,50}" value="<?php if(isset($_REQUEST['unombre'])){echo "$_REQUEST[unombre]";}  ?>" required class="control" type="text" name="unombre"><br><br>
                        <label for="upellido">Apellidos:  </label><br>
                        <input placeholder="Ingrese Los Apellidos" pattern="[A-Za-z ]{3,50}" value="<?php if(isset($_REQUEST['uapellido'])){echo "$_REQUEST[uapellido]";}  ?>" required class="control" type="text" name="uapellido"><br><br>
                        <label for="udocumento">Documento:  </label><br>
                        <input placeholder="Ingrese el Número Documento" pattern="[0-9]{5,12}" value="<?php if(isset($_REQUEST['udocumento'])){echo "$_REQUEST[unombre]";}  ?>" required class="control" name="udocumento" type="text" > <br><br>
                        <label for="ucontraseña">Contraseña:  </label><br>
                        <input disabled class="control" name="ucontraseña" pattern="[A-Za-z0-9]{6,20}" required value="<?php echo"$key"; ?>" type="text" > <br><br>
                        <input class="control" name="ucontraseña" value="<?php echo"$key"; ?>" type="hidden" >
                        <label for="uestado"> Estado: </label>
                        <select name="uestado" pattern="[A-Za-z]{5,12}" id="">Estado
                            <option value="Preactivo">Pre-activo</option>
                        </select> <br><br>
                        <label for=""> ROL: </label>
                        <select name="urol" pattern="[0-9]{0,1}">
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select><br><br>
                        <input class="registrar" type="submit" name="registrar" value="Registrar">
                        <a class="searchButton" href="../View/Usuarios.php">Volver</a>
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