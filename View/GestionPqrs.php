<?php
session_start();
   
    require('../Controller/C_GestionPqrs.php');
    require_once('../Controller/guardarResolucion.php');
    $date = date("Y/m/d");
?>

<?php 
// se valida la sesion del usuario, en caso de no tener sesion sera redirigido al login
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
<link rel="stylesheet" href="../CSS/detallePqrs.css">
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
                <!-- muestra el rol y nombre de usuario tienda en sesion -->
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
            <h1>Solicitud No. <?php echo "$pId" ?></h1>
        </header>
        <section class="section">

            <div class="container">
                
                <div class="filtros" >
                        <h1>Datos Remitente</h1><br><br>
                        <p><b>Nombre: </b>  <?php echo "$nombre" ?></p><br>
                        <p><b>Telefono: </b>   <?php echo "$telefono" ?>   </p><br>
                        <p><b>Mail: </b> <?php echo "$Mail" ?> </p><br>
                        <p> <b> Fecha de solicitud: </b> <?php echo"$fecha" ?> </p> <br>
                        <p> <b> Estado: </b> <?php echo"$estado"; if(isset($usuario)) { echo" Por $usuario  id: $usuarioId"; } else{echo"";} ?>  </p> <br>
                        <p> <b> Tipo: </b> <?php echo"$tipo" ?> </p> <br>
                        <?php if($imagen != null){ ?>
                        <p> <b> Imagen: </b><br> </p><br>
                        <img src="<?php echo"$imagen"; ?>" alt=""> <br>  <br> 
                        <?php } else{ echo" "; }?>
                        <p><b> Descripcion: </b></p><br>  
                        <p><?php echo"$descripcion" ?></p><br> <br>
                        <h1>Respuesta</h1><br>
                        <p>Por favor Diligencie el contenido de la respuesta en el cuadro de texto que se presenta a continuacion, los demás datos serán formateados por el sistema automaticamente.</p><br><br>
                        <!-- Se prepara formulario para ingresar la respuesta a la consulta o reclamo del cliente -->
                        <form action="" method="post"> 
                        <textarea class="control" name="respuesta" id="" cols="160" rows="10"><?php if(isset($respuesta)){ echo "$respuesta"; } else{echo"";} ?></textarea>
                        <input type="hidden" value="<?php echo "$id" ?>" name="pqrsId">
                        <input type="hidden" value="<?php echo "$_SESSION[usuarioId]" ?>" name="usuarioId">
                        <input type="hidden" value="<?php echo "$date" ?>" name="date"><br><br>
                        <input class="searchButton" type="submit" name="guardar" value="Guardar">
                        </form><br><br> 
                        
                </table>
                <nav class="paginacion">

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