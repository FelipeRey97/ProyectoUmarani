<?php
session_start();

?>
<?php 
    if($_SESSION['doc'] == false){

        header("Location: ../View/loginUsuario.php");
    }
?>

<?php

    if(isset($_GET['pagina'])){

        
    }else{
        $_GET['pagina'] = 1;
    }

    require_once("../Controller/mostrarProducto.php");
    
    $paginas = $cantidad/$prod1->artporpag;
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
                <form action="#">
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
                <div class="filtros" >
                 
                        <label for="">Seleccione:</label>
                        <select name="criterio" id="">
                            <option value="id">ID</option>
                            <option value="nombre">Nombre</option>
                        </select>
                        <input name="textbox" placeholder="Escribe iD o titulo" type="text" class="idpedido">
                        <label for=""> Estado: </label>
                        <select name="estado" id="">Estado
                            <option value="">Seleccione</option>
                            <option value="Disponible">Disponible</option>
                            <option value="Agotado">Agotado</option>
                        </select>
                        <label for=""> Categoria: </label>
                        <select name="categoria" id="">Categoria
                            <option value="">Seleccione</option>
                            <option value="Collares">Collares</option>
                            <option value="Pulseras">Pulseras</option>
                            <option value="Anillos">Anillos</option>
                        </select>
                        <input type="hidden" value="productos" name="v" >
                        <input class="searchButton" type="button" value="Buscar"
                        onclick="this.form.action='#';this.form.submit();"/>
                        <input class ="excel" type="button" value="Exportar" 
                        onclick="this.form.action='../Controller/exportarXslx.php';this.form.submit();" />
                    </form><br><br>
                    <a class="new" href="../View/NuevoProducto.php">Nuevo Producto</a>
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
                <a  class="prev-next"  <?php if($_GET['pagina']<=1){ ?>  style="visibility:hidden;"  <?php }else{ echo ""; } ?> href="../view/productos.php?pagina=<?php echo "$_GET[pagina]"-1;?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=id&input=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&categoria=<?php if(isset($_REQUEST['categoria'])){ echo "$_REQUEST[categoria]"; } ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a  <?php if($_GET['pagina'] == $i+1) { ?> class="active" <?php } ?> href="../view/productos.php?pagina=<?php echo"$i"+1 ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=id&input=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&categoria=<?php if(isset($_REQUEST['categoria'])){ echo "$_REQUEST[categoria]"; } ?>"><?php echo "$i"+1;  ?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> style="visibility:hidden;" <?php }else{ echo ""; } ?> href="../view/productos.php?pagina=<?php echo "$_GET[pagina]"+1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&criterio=id&input=<?php if(isset($_REQUEST['textbox'])){ echo "$_REQUEST[textbox]"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&categoria=<?php if(isset($_REQUEST['categoria'])){ echo "$_REQUEST[categoria]"; } ?>"> Siguiente</a>
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