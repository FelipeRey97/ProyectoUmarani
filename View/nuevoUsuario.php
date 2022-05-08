
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
            <h1>Registro de Usuarios</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="filtros" >
                    <form action="../Controller/crearUsuario2.php" method="post">
                        <label for="unombre" >NOMBRE: </label>
                        <input type="text" name="unombre"><br><br>
                        <label for="upellido">APELLIDO:  </label>
                        <input type="text" name="uapellido"><br><br>
                        <label for="udocumento">DOCUMENTO:  </label>
                        <input name="udocumento" type="text" class=""> <br><br>
                        <label for="ucontraseña">CONTRASEÑA:  </label>
                        <input name="ucontraseña" type="text" class=""> <br><br>
                        <label for="uestado"> ESTADO: </label>
                        <select name="uestado" id="">Estado
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Bloqueado">Bloqueado</option>
                        </select> <br><br>
                        <label for=""> ROL: </label>
                        <select name="urol">
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select><br><br>
                        <input class="searchButton" type="submit" value="Registrar">
                        <a href="../View/Usuarios.php">Volver</a>
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