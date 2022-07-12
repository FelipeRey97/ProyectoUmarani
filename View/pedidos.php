<?php
session_start();
if($_SESSION['doc'] == false){

    header("Location: ../View/loginUsuario.php");
}

if(isset($_GET['pagina'])){

         
}else{
    $_GET['pagina'] = 1;
}

    require_once('../Controller/mostrarPedidos.php');

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
                <a href="../View/Pedidos.php?pagina=1">Pedidos</a> 
                <a href="../view/facturas.php?pagina=1">Facturas</a>
                <?php if($_SESSION['rol'] == 'ADMINISTRADOR')  { ?>
                <a href="../View/Usuarios.php?pagina=1">Usuarios</a>
                <a href="../View/adminClientes.php?pagina=1">Clientes</a> <?php } ?>
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
                
                ?>
                    
                    <input type="hidden" name="pagina" value="1">
               </select>  Registros </p>  
                </div>
                <div class="exportar">
                     <a class="excel" href="#"><i class="fas fa-file-excel"></i> Excel</a> 
                  <!-- <a class="pdf" href="#"><i class="fas fa-file-pdf"></i> PDF </a> --> 
                </div>
                <div class="filtros" >
                    <label for="">Desde:</label>
                    <input class="date" name="fechainicio" type="date" class="idpedido"><br><br>
                    <label for="">Hasta:</label>
                    <input class="date" name="fechafin" type="date" class="idpedido"><br><br>
                        <label for="id">Id Pedido: </label>
                        <input name="id" type="text" class="idpedido">
                        <label for=""> Estado: </label>
                        <select name="estado" id="">
                            <option value="">Seleccione</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="enviado">Enviado</option>
                          <option value="cancelado">Cancelado</option>
                        </select>
                        <label for=""> Ordenar: </label>
                        <select name="ordenar" >
                            <option value="">Seleccione</option>
                            <option value="maytomen">Precio Mayor a Menor</option>
                            <option value="mentomay">Precio Menor a Mayor</option>
                            <option value="antiguos">Antiguos primero</option>
                            <option value="recientes">Recientes primero</option>
                        </select>
                        <label for=""> Departamento: </label>
                        <select name="dpto" id="">Estado
                            <option value="">Seleccione</option>
                           <?php while($dep = mysqli_fetch_array($fila)){
                            ?>
                            <option value="<?php echo "$dep[dptoNombre]" ?>"><?php echo "$dep[dptoNombre]" ?> </option>
                       <?php } ?>
                        </select>
                        <input class="searchButton" type="submit" value="Buscar">
                    </form>
                    <!-- <a href="../View/nuevoUsuario.php">Nuevo Usuario</a> -->
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
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
                 <a class="prev-next" <?php if($_GET['pagina']<=1 ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/pedidos.php?pagina=<?php echo"$_GET[pagina]"-1; ?>">Anterior </a>

                 <?php for($i =0; $i < $paginas; $i++){ ?>
                <a <?php if($_GET['pagina'] == $i+1){ ?> class="active" <?php }?> href="../view/pedidos.php?pagina=<?php echo "$i"+1 ?>"><?php echo "$i"+1 ?></a>
                <?php }  ?>

                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/pedidos.php?pagina=<?php echo"$_GET[pagina]"+1; ?>"> Siguiente</a> 
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