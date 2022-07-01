
<?php
//  include("../Controller/verUsuario.php");
?>

<?php
session_start();

?>
<?php 
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
            <h1>Edicion de Usuario</h1>
        </header>
        <section class="section">

            <div class="container">
                <div class="registros">

                <!-- a continuacion filtros para paginacion, busqueda y ordenamiento,  pdte de programar. -->

                 <!-- <p> Mostar  <select name="" id="">
                    <option value="">5</option>
                    <option value="">10</option>
                    <option value="">15</option>
               </select>  Registros </p>   -->
                </div>
                <div class="filtros" >
                    <!-- <form action="">
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
                    </form> -->
                    <!-- <a href="nuevoUsuario.php">Nuevo Usuario</a> -->
                </div>
                <table>
                    <!-- <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr> -->

                     <?php
                        
                        //obtencion de datos para precargar los datos en el formulario de edicion.
                        $conexion = mysqli_connect("localhost","root","","proyecto");

                        $registros = mysqli_query($conexion,"select * from usuariotienda join rol
                        on rolId = usuarioRolId where usuarioId = '$_REQUEST[tabla]' ");
                        
                    if($registros){

                   
                        while($reg = mysqli_fetch_array($registros)){

            
                     ?>
                    <tr class="información" >
                  <div class="filtros">

                   
                    <form action="../Controller/actualizarUsuario.php" method="post">
                        <label for="unombre"  >NOMBRE: </label>
                        <input type="text" name="unombre" value="<?php echo "$reg[usuarioNombre]" ?>"><br><br>
                        <label for="upellido">APELLIDO:  </label>
                        <input type="text" name="uapellido"value="<?php echo "$reg[usuarioApellido]" ?>" ><br><br>
                        <!-- <label for="udocumento">DOCUMENTO:  </label>
                        <input name="udocumento" type="text" value="<?php echo "$reg[usuarioDoc]" ?>" class=""> <br><br> -->
                        <label for="ucontraseña">CONTRASEÑA:  </label>
                        <input name="ucontraseña" type="text" value="<?php echo "$reg[usuarioContraseña]" ?>" class=""> <br><br>
                        <label for=""> ROL: </label>
                        <select name="urol">
                        <?php if($reg['rolNombre'] == "ADMINISTRADOR"){
                            echo "<option value=\"$reg[usuarioRolId]\" selected>$reg[rolNombre]</option>";
                            echo "<option value=\"2\" >EMPLEADO</option>";
                            
                        }   
                        else if($reg['rolNombre'] == "EMPLEADO"){
                            echo "<option value=\"$reg[usuarioRolId]\" selected>$reg[rolNombre]</option>";
                            echo "<option value=\"1\" >ADMINISTRADOR</option>";
                        }   
                        ?>
                        </select><br><br>
                        <label for="uestado"> ESTADO: </label>
                        <select name="uestado"  id="">Estado
                        <?php
                        if($reg['usuarioEstado'] == "Activo"){
                            echo "<option value=\"$reg[usuarioEstado]\" selected>$reg[usuarioEstado]</option>";
                            echo "<option value=\"Inactivo\" >Inactivo</option>";
                            echo "<option value=\"Bloqueado\" >Bloqueado</option>";
                        }   
                        else if($reg['usuarioEstado'] == "Inactivo"){
                            echo "<option value=\"$reg[usuarioEstado]\" selected>$reg[usuarioEstado]</option>";
                            echo "<option value=\"Activo\" >Activo</option>";
                            echo "<option value=\"Bloqueado\" >Bloqueado</option>";
                        }  
                        else if($reg['usuarioEstado'] == "Bloqueado"){
                            echo "<option value=\"$reg[usuarioEstado]\" selected>$reg[usuarioEstado]</option>";
                            echo "<option value=\"Inactivo\" >Inactivo</option>";
                            echo "<option value=\"Activo\" >Activo</option>";
                        }  
                            ?>
                        </select> <br><br>
                        <input type="hidden" name="tabla" value="<?php echo "$_REQUEST[tabla]" ?>">
                        <input class="searchButton" type="submit" value="Guardar Cambios">
                        <a href="../View/Usuarios.php">Volver</a>
                    </form>
                    </div>     
                        <?php  
                            
                        }
                    }
                    else {

                        echo 'El usuario no existe';
                    }

                     ?>
                    
                </table>
                
            </div>
        </section>
        </div>
        
    </div>
    <footer class="footer">
        <p>copyright 2022 Todos los derechos reservados</p>
    </footer>
</body>
</html>