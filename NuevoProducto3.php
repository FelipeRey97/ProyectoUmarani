
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="../WebUmarani/CSS/tiendaEstilos.css">
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
            <h1>Gestión de Productos</h1>
        </header>
        <section class="section">
            <div class="container">

            <?php 
            
                $conexion = mysqli_connect("localhost","root","","proyecto") 
                or die ("problemas con la conexion");

                if($_FILES['foto2']['name'] != ""){
                    $nombre_imagen = $_FILES['foto2']['name'];
                    $temporal = $_FILES['foto2']['tmp_name'];
                    $carpeta='../WebUmarani/Uploads';
                    $ruta = $carpeta.'/'.$nombre_imagen;

                    $codigo_artId = $_REQUEST['artId'];

                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

                            mysqli_query($conexion,"insert into articulogaleria (ImagenRuta,Imagen_artId)
                            values('$ruta',$_REQUEST[artId])") or die("problemas en el insert" . mysqli_error($conexion));
                }
                if($_FILES['foto3']['name'] != ""){
                    $nombre_imagen = $_FILES['foto3']['name'];
                    $temporal = $_FILES['foto3']['tmp_name'];
                    $carpeta='../WebUmarani/Uploads';
                    $ruta = $carpeta.'/'.$nombre_imagen;

                    $codigo_artId = $_REQUEST['artId'];

                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

                            mysqli_query($conexion,"insert into articulogaleria (ImagenRuta,Imagen_artId)
                            values('$ruta',$_REQUEST[artId])") or die("problemas en el insert" . mysqli_error($conexion));
                }
                if($_FILES['foto4']['name'] != ""){
                    $nombre_imagen = $_FILES['foto4']['name'];
                    $temporal = $_FILES['foto4']['tmp_name'];
                    $carpeta='../WebUmarani/Uploads';
                    $ruta = $carpeta.'/'.$nombre_imagen;

                    $codigo_artId = $_REQUEST['artId'];

                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

                            mysqli_query($conexion,"insert into articulogaleria (ImagenRuta,Imagen_artId)
                            values('$ruta',$_REQUEST[artId])") or die("problemas en el insert" . mysqli_error($conexion));
                }
                if($_FILES['foto5']['name'] != ""){
                    $nombre_imagen = $_FILES['foto5']['name'];
                    $temporal = $_FILES['foto5']['tmp_name'];
                    $carpeta='../WebUmarani/Uploads';
                    $ruta = $carpeta.'/'.$nombre_imagen;

                    $codigo_artId = $_REQUEST['artId'];

                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);

                            mysqli_query($conexion,"insert into articulogaleria (ImagenRuta,Imagen_artId)
                            values('$ruta',$_REQUEST[artId])") or die("problemas en el insert" . mysqli_error($conexion));
                }

    ?>
        <p>Se han cargado todos los datos satisfactoriamente</p>
        <a href="productos.php">Volver a productos</a>

    </div>
            </section>
            </div>
            
        </div>
        <footer class="footer">
            <p>copyright 2022 Todos los derechos reservados</p>
        </footer>
    </body>
    </html>


</body>
</html>