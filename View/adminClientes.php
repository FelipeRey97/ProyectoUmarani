<?php
session_start();
?>

<?php 
    $conexion = mysqli_connect("localhost","root","","proyecto") 
    or die ("problemas con la conexion");

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
                <h4><?php echo $_SESSION['nombre'] ." ".  $_SESSION['apellido']; ?></h4>
                <h5><?php echo $_SESSION['rol']; ?></h5>
            </div>
            <nav class="secciones">
                <a href="#">Inicio</a>
                <a href="#">Productos</a>
                <a href="#">Pedidos</a>
                <a href="Usuarios.php">Usuarios</a>
                <a href="#">Clientes</a>
                <a href="#">PQRS</a> <br><br><br>
                <a href="cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Gestión de Clientes</h1>
        </header>
        <section class="section">

            <div class="container">
                <div class="registros">
                 <p> Mostrar  <select name="" id="">
                    <option value="">5</option>
                    <option value="">10</option>
                    <option value="">15</option>
               </select>  Registros </p>  
                </div>
                <div class="filtros" >
                    <form action="">
                        <label for="id">ID Usuario: </label>
                        <input name="id" type="text" class="idpedido">
                        <label for=""> Estado: </label>
                        <select name="" id="">Estado
                            <option value="">Activo</option>
                            <option value="">Inactivo</option>
                            <option value="">Bloqueado</option>
                        </select>
                        <label for=""> Rol: </label>
                        <select name="" id="">Estado
                            <option value="">Todos</option>
                            <option value="">Mayor a Menor</option>
                        </select>
                        <input class="searchButton" type="button" value="Buscar">
                    </form>
                    
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>

                     <?php
                        
                        
                        $regClientes = mysqli_query($conexion, "select clienteId,clienteNombre,clienteApellido,clienteTelefono,clienteEmail
                        from cliente") 
                        or die ("problemas en el select" . mysqli_error($conexion)); 

                        while($reg = mysqli_fetch_array($regClientes)){
                        
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $reg['clienteId']   ?> </td>
                        <td> <?php echo $reg['clienteNombre']   ?></td>
                        <td> <?php echo $reg['clienteApellido']   ?></td>
                        <td> <?php echo $reg['clienteTelefono']   ?></td>
                        <td> <?php echo $reg['clienteEmail']   ?></td>
                        <td>
                            <!-- <a class="edit" href="#"><i class="far fa-edit"></i></i></a> -->
                            <a class="detail" href="#"><i class="far fa-eye"></i></a>
                            <!-- <a class="cancel" href="#"><i class="fas fa-ban"></i></a> -->
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>
                <nav class="paginacion">
                <a class="prev-next" href="#">Anterior </a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a class="prev-next" href="#"> Siguiente</a>
                </nav>
            </div>
        </section>
        </div>
        
    </div>
    <footer class="footer">
        <p>copyright 2022 Todos los derechos reservados</p>
    </footer>
</body>
</html>