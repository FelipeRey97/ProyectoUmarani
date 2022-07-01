<?php

    require_once("../Controller/mostrarProducto.php");
    
    $paginas = $cantidad/10;
    $paginas = ceil($paginas);

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
<link rel="stylesheet" href="../CSS/productosEstilos.css">
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
            <h1>Gestión de Productos</h1>
        </header>
        <section class="section">
            <div class="container">
                <div class="registros">
                 <!-- <p> Mostrar  <select name="" id="">
                    <option value="">5</option>
                    <option value="">10</option>
                    <option value="">15</option>
               </select>  Registros </p>   -->
                </div>
                <div class="exportar">
                    <!-- <a class="excel" href="#"><i class="fas fa-file-excel"></i> Excel</a>
                  <a class="pdf" href="#"><i class="fas fa-file-pdf"></i> PDF </a> -->
                  
                </div>
                <div class="filtros" >
                    <form action="">
                        <!-- <label for="fechainicio">Desde: </label>
                        <input type="date" name="fechainicio"><br><br>
                        <label for="fechafin">Hasta:  </label>
                        <input type="date" name="fechafin"><br><br> -->
                        <label for="id">ID Articulo: </label>
                        <input name="id" type="text" class="idpedido">
                        <label for=""> Estado: </label>
                        <select name="" id="">Estado
                            <option value="">Disponible</option>
                            <option value="">Agotado</option>
                        </select>
                        <label for=""> Valor: </label>
                        <select name="" id="">Estado
                            <option value="">Menor a Mayor</option>
                            <option value="">Mayor a Menor</option>
                        </select>
                        <input class="searchButton" type="button" value="Buscar">
                    </form>
                    <a class="edit" href="../View/NuevoProducto.php">Nuevo Producto</a>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Articulo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Estado</th>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                    
                    <?php
                        
                      //  Se muestra cada "producto" almacenado en productos, se ordena en la tabla para inventario
                        foreach($productos as $producto){
                        
            
                     ?>


                    <tr class="información" >


                        <td> <?php echo $producto['artId']   ?> </td>
                        <td> <img src="<?php echo $producto['artVista']   ?>" alt=""> </td>
                        <td> <?php echo $producto['artNombre']   ?></td>
                        <td> <?php echo $producto['artPrecio']   ?></td>
                        <td> <?php echo $producto['artCantidad']   ?></td>
                        <td> <?php echo $producto['artEstado']   ?></td>
                        <td> <?php echo $producto['categoriaNombre']   ?></td>
                        <td>
                        <a class="edit" href="editarProducto.php?aId=<?php echo "$producto[artId]" ?>"><i class="far fa-edit"></i></i></a>
                        <a class="detail" href="#"><i class="far fa-eye"></i></a>
                        <?php if($_SESSION['rol'] == 'ADMINISTRADOR')  { ?>
                        <a on class="cancel" href="../Controller/borrarArticulo.php?aId=<?php echo "$producto[artId]" ?>"><i class="fas fa-ban"></i></a>
                        </td> <?php } ?>
                
                        <?php  
                            
                        }
                     ?>
                    </tr>
                    
                    
                </table>
                <nav class="paginacion">
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> hidden <?php }else{ echo ""; } ?> href="../view/productos.php?pagina=<?php echo "$_GET[pagina]"-1; ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a href="../view/productos.php?pagina=<?php echo"$i"+1 ?>"><?php echo "$i"+1;  ?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/productos.php?pagina=<?php echo "$_GET[pagina]"+1; ?>"> Siguiente</a>
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