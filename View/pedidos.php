<?php
session_start();
    require_once('../Controller/mostrarPedidos.php');
   
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
                <!-- muestra el rol y nombre de usuario tienda en sesion -->
                <h4><?php echo "$_SESSION[rol] "; ?></h4>
                <h5><?php echo "$_SESSION[nombre] $_SESSION[apellido] "; ?></h5>
            </div>
            <nav class="secciones">
                <a href="#">Inicio</a>
                <a href="../View/Productos.php">Productos</a>
                <a href="#">Pedidos</a> 
                <?php if($_SESSION['rol'] == 'ADMINISTRADOR')  { ?>
                <a href="../View/Usuarios.php">Usuarios</a>
                <a href="../View/adminClientes.php">Clientes</a> <?php } ?>
                <a href="../View/PQRS.php?pagina=1">PQRS</a> <br><br><br>
                <a href="../Controller/cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Gestión de Pedidos</h1>
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
                    <!-- <a href="../View/nuevoUsuario.php">Nuevo Usuario</a> -->
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Estado</th>
                        <th>Estado</th>
                        <th>Monto</th>
                        <th>Departamento</th>
                        <th>Ciudad/Municipio</th>
                        <th>Acciones</th>
                    </tr>

                     <?php
                        
                        // se muestran los datos de los usuarios almacenados en la variable $usuarios
                        foreach($registros as $pedido){
                        
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $pedido['pedidoId']   ?> </td>
                        <td> <?php echo $pedido['pedidoFechaInicio']   ?></td>
                        <td> <?php echo $pedido['pedidoFechaFin']   ?></td>
                        <td> <?php echo $pedido['pedidoEstado']   ?></td>
                        <td> <?php echo "$ " . $pedido['pedidoCostoTotal']   ?></td>
                        <td> <?php echo $pedido['direccionDep']   ?></td>
                        <td> <?php echo $pedido['direccionCiudad']   ?></td>
                        <td>
                            <?php if($pedido['pedidoEstado'] == 'Pendiente'){ ?>
                                   <a class="edit" href="../Controller/mostrarDetallePedido.php?ped=<?php echo "$pedido[pedidoId]" ?>"><i class="far fa-edit"></i></i></a>
                                   <?php if($_SESSION['rol'] == 'ADMINISTRADOR'){ ?>
                                    <a class="detail" href="../Controller/mostrarDetallePedido.php?vis=<?php echo "$pedido[pedidoId]" ?>"><i class="far fa-eye"></i></a>
                                    <?php  }    ?>
                             <?php  }else { ?>
                                <?php if($_SESSION['rol'] == 'ADMINISTRADOR'){ ?>
                                    <a class="edit" href="../Controller/mostrarDetallePedido.php?ped=<?php echo "$pedido[pedidoId]" ?>"><i class="far fa-edit"></i></i></a>
                                    <?php  }    ?>
                                 <a class="detail" href="../Controller/mostrarDetallePedido.php?vis=<?php echo "$pedido[pedidoId]" ?>"><i class="far fa-eye"></i></a>
                                 
                                 <?php }?>
                            
                           
                            
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>
                <nav class="paginacion">
                <!-- <a class="prev-next" href="#">Anterior </a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a class="prev-next" href="#"> Siguiente</a> -->
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