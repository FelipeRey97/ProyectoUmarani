<?php
session_start();
// sesion del usuario iniciada desde el login (para usuarios de la tienda)
?>
<?php 
// se valida la sesion del usuario, en caso de no tener sesion sera redirigido al login
    if($_SESSION['doc'] == false){

        header("Location: ../View/loginUsuario.php");
    }
    include('../Controller/NuevoProducto2.php');
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
                <a href="../Controller/cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Ingresar Producto</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="filtros" >
                    <form action="#" method="post" enctype="multipart/form-data">
                        <label for="aNombre" >Nombre: </label><br>
                        <input placeholder="Ingrese el Nombre del Artículo" class="control" type="text" name="aNombre"><br><br>
                        <label for="aPrecio">Precio:  </label><br>
                        <input placeholder="Ingrese en valor numérico el precio del artículo" class="control" type="text" name="aPrecio"><br><br>
                        <label for="aCantidad">Cantidad:  </label><br>
                        <input placeholder="Ingrese en valor numérico la cantidad disponible" class="control" name="aCantidad" type="text" class=""> <br><br>
                        <label for="aestado"> Estado: </label>
                        <select class="control" name="aestado" id="">Estado
                            <option class="control" value="Disponible">Disponible</option>
                            <option class="control"  value="Agotado">Agotado</option>
                        </select> <br><br>
                        <label for="aCategoria"> Categoria </label>
                        <select class="" name="aCategoria">
                            <option value="1">Collar</option>
                            <option value="2">Pulsera</option>
                            <option value="3">Anillo</option>
                        </select><br><br>
                        <label for="foto1">Imagen:</label> <br><br>
                        <input class="" type="file" name="foto1" id="foto1"><br><br>
                        <input class="registrar" type="submit" name="registrar" value="Registrar">
                        <a class="searchButton" href="../View/Productos.php">Volver</a>
                    </form><br><br>
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