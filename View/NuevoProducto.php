<?php
session_start();
// sesion del usuario iniciada desde el login (para usuarios de la tienda)
?>
<?php 
// se valida la sesion del usuario, en caso de no tener sesion sera redirigido al login
    if($_SESSION['doc'] == false){

        header("Location: http://localhost/UmaraniWeb/View/loginUsuario.php");
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
                <a href="#">Inicio</a>
                <a href="#">Productos</a>
                <a href="#">Pedidos</a>
                <a href="#">Usuarios</a>
                <a href="#">Dashboard</a>
                <a href="#">PQRS</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Ingresar Producto</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="filtros" >
                    <form action="../Controller/NuevoProducto2.php" method="post" enctype="multipart/form-data">
                        <label for="aNombre" >Nombre: </label>
                        <input type="text" name="aNombre"><br><br>
                        <label for="aPrecio">Precio:  </label>
                        <input type="text" name="aPrecio"><br><br>
                        <label for="aCantidad">Cantidad:  </label>
                        <input name="aCantidad" type="text" class=""> <br><br>
                        <label for="aestado"> Estado: </label>
                        <select name="aestado" id="">Estado
                            <option value="Disponible">Disponible</option>
                            <option value="Agotado">Agotado</option>
                        </select> <br><br>
                        <label for="aCategoria"> Categoria </label>
                        <select name="aCategoria">
                            <option value="1">Collar</option>
                            <option value="2">Pulsera</option>
                            <option value="3">Anillo</option>
                        </select><br><br>
                        <label for="foto1">Imagen Principal:</label> 
                        <input type="file" name="foto1" id="foto1"><br><br>
                        <input class="searchButton" type="submit" value="Registrar">
                    </form>
                    <a href="../View/Productos.php">Volver</a>
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