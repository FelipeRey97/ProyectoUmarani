<?php
    session_start();
    if($_SESSION['doc'] == false){

        header("Location: ..View/loginUsuario.php");
    }

    if(isset($_GET['pagina'])){

        
    }else{
        $_GET['pagina'] = 1;
    }
    
    require_once("../Controller/verUsuario.php");
    $paginas = $cantidad/$registrosxpagina;
    $paginas = ceil($paginas);

    
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
                <!-- muestra el rol y nombre de usuario tienda en sesion -->
                <h4><?php echo "$_SESSION[rol] "; ?></h4>
                <h5><?php echo "$_SESSION[nombre] $_SESSION[apellido] "; ?></h5>
            </div>
            <nav class="secciones">
                <a href="#">Inicio</a>
                <a href="../View/Productos.php?pagina=1">Productos</a>
                <a href="../View/pedidos.php?pagina=1">Pedidos</a>
                <a href="../View/facturas.php?pagina=1">Facturas</a>
                <a href="../view/usuarios.php?pagina=1">Usuarios</a>
                <a href="../view/adminClientes.php?pagina=1">Clientes</a>
                <a href="../View/PQRS.php?pagina=1">PQRS</a> <br><br><br>
                <a href="../Controller/cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Gestión de Usuarios</h1>
        </header>
        <section class="section">
            <div class="container">
            <div class="registros">
                <form action="#" >
                 <p> Mostrar   <select name="artxpag" id="">
                 <?php $P= $_GET['artxpag']; 
                    switch ($P) {
                        case 5:
                            ?>
                    <option selected value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option> <?php
                            break;
                        
                        case 10:
                            ?>
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="20">20</option> <?php
                            
                            break;
                        case 20:

                            ?>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option selected value="20">20</option> <?php

                            break;
                        default: 
                        ?>
                        <option selected value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option> <?php
                    }  
                
                ?> <input type="hidden" name="pagina" value="1">
                </select>  Registros </p>  
                 </div>
                   <div class="filtros" >
                        <label for="">Criterio:</label>
                        <select name="criterio" id="">
                           <option value="">Seleccione</option>
                           <option value="id">ID</option>
                           <option value="nombre">Nombre</option>
                           <option value="documento">Documento</option>
                        </select>
                        <input name="textbox" type="text" placeholder="Buscar" class="idpedido">
                        <label for=""> Estado: </label>
                        <select name="estado" id="">Estado
                            <option value="">Seleccione</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Bloqueado">Bloqueado</option>
                        </select>
                        <label for=""> Rol: </label>
                        <select name="rol" id="">Estado
                            <option value="">Seleccione</option>
                            <option value="empleado">EMPLEADO</option>
                            <option value="admin">ADMINISTRADOR</option>
                        </select>
                        <input type="hidden" name="v" value="usuarios">
                        <input class="searchButton" type="button" value="Buscar"
                        onclick="this.form.action='#';this.form.submit();" />
                        <input clas="excel" type="button" value="Exportar"
                        onclick="this.form.action='../Controller/exportarXslx.php';this.form.submit()"/>
                    </form>
                    <br><br><a class="new" href="../View/nuevoUsuario.php">Nuevo Usuario</a>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Documento</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>

                     <?php
                        
                        // se muestran los datos de los usuarios almacenados en la variable $usuarios
                        foreach($usuarios as $user){
                        
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $user['usuarioId']   ?> </td>
                        <td> <?php echo $user['usuarioNombre']   ?></td>
                        <td> <?php echo $user['usuarioApellido']   ?></td>
                        <td> <?php echo $user['usuarioDoc']   ?></td>
                        <td> <?php echo $user['rolNombre']   ?></td>
                        <td> <?php echo $user['usuarioEstado']   ?></td>
                        <td>
                            <a class="edit" href="DetalleUsuario.php?tabla=<?php echo "$user[usuarioId]" ?>"><i class="far fa-edit"></i></i></a>
                            <!-- <a class="detail" href="detalleUsuario.php"><i class="far fa-eye"></i></a> -->
                            <a on class="cancel" href="../Controller/borrarUsuario.php?tabla=<?php echo "$user[usuarioId]" ?>"><i class="fas fa-ban"></i></a>
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>
                <nav class="paginacion">
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> hidden <?php }else{ echo ""; } ?> href="../view/usuarios.php?pagina=<?php echo "$_GET[pagina]"-1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=<?php if(isset($_REQUEST['criterio'])){ echo "$_REQUEST[criterio]"; } ?>&textbox=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&rol=<?php if(isset($_REQUEST['rol'])){ echo "$_REQUEST[rol]"; } ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a <?php if($_GET['pagina'] == $i+1){  ?> class="active" <?php } ?> href="../view/usuarios.php?pagina=<?php echo"$i"+1 ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=<?php if(isset($_REQUEST['criterio'])){ echo "$_REQUEST[criterio]"; } ?>&textbox=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&rol=<?php if(isset($_REQUEST['rol'])){ echo "$_REQUEST[rol]"; } ?>"><?php echo "$i"+1;  ?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/usuarios.php?pagina=<?php echo "$_GET[pagina]"+1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=<?php if(isset($_REQUEST['criterio'])){ echo "$_REQUEST[criterio]"; } ?>&textbox=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&rol=<?php if(isset($_REQUEST['rol'])){ echo "$_REQUEST[rol]"; } ?>"> Siguiente</a>
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