
<?php
//  include("../Controller/verUsuario.php");
?>

<?php
include_once('../Controller/actualizarUsuario.php');
session_start();

?>
<?php 
    if($_SESSION['doc'] == false){

        header("Location: ../View/loginUsuario.php");
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
                <div class="filtros" >
                   
                </div>
                <table>
                     <?php
                         
                        //obtencion de datos para precargar los datos en el formulario de edicion.
                        
                        
                    if($registros){

                   
                        while($reg = mysqli_fetch_array($registros)){

            
                     ?>
                    <tr class="información" >
                  <div class="filtros">

                   
                    <form action="" method="post">
                        <label for="unombre"  >Nombres: </label><br>
                        <input class="control" type="text" required pattern="[a-zA-Z ]{3,50}" name="unombre" value="<?php echo "$reg[usuarioNombre]" ?>"><br><br>
                        <label for="upellido">Apellidos:  </label><br>
                        <input class="control" type="text" required pattern="[a-zA-Z ]{3,50}" name="uapellido"value="<?php echo "$reg[usuarioApellido]" ?>" ><br><br>
                        <label for="ucontraseña">Contraseña:  </label><br>
                        <input class="control" name="ucontraseña" type="text" required pattern="[a-zA-Z0-9]{6,20}" value="<?php echo "$key" ?>" class=""> <br><br>
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
                        if($reg['usuarioEstado'] == "Preactivo" || $reg['usuarioEstado'] == "Activo" ){
                            echo "<option value=\"Preactivo\" selected>Preactivo</option>";
                            echo "<option value=\"Inactivo\" >Inactivo</option>";
                            echo "<option value=\"Bloqueado\" >Bloqueado</option>";
                        }   
                        else if($reg['usuarioEstado'] == "Inactivo"){
                            echo "<option value=\"$reg[usuarioEstado]\" selected>$reg[usuarioEstado]</option>";
                            echo "<option value=\"Preactivo\" >Preactivo</option>";
                            echo "<option value=\"Bloqueado\" >Bloqueado</option>";
                        }  
                        else if($reg['usuarioEstado'] == "Bloqueado"){
                            echo "<option value=\"$reg[usuarioEstado]\" selected>$reg[usuarioEstado]</option>";
                            echo "<option value=\"Inactivo\" >Inactivo</option>";
                            echo "<option value=\"Preactivo\" >Preactivo</option>";
                        }  
                            ?>
                        </select> <br><br>
                        <input type="hidden" name="tabla" value="<?php echo "$_REQUEST[tabla]" ?>">
                        <input class="registrar" name="registrar" type="submit" value="Guardar Cambios">
                        <a class="searchButton" href="../View/Usuarios.php">Volver</a>
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