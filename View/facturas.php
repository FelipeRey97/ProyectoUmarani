<?php

    require_once("../Controller/mostrarFacturas.php");
    $paginas = $cantidad/10;
    $paginas = ceil($paginas);
   
?>

<?php
// sesion del usuario iniciada desde el login (para usuarios de la tienda)
session_start();

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
                <a href="../View/pedidos.php">Pedidos</a>
                <a href="#">Facturas</a>
                <a href="../View/Usuarios.php">Usuarios</a>
                <a href="../View/adminClientes.php">Clientes</a>
                <a href="../View/PQRS.php">PQRS</a> <br><br><br>
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
                    <a href="../View/nuevoUsuario.php">Nuevo Usuario</a>
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Valor Total</th>
                        <th>Método Pago</th>
                        <th>Acciones</th>
                    </tr>

                     <?php
                        
                        // se muestran los datos de los usuarios almacenados en la variable $usuarios
                        foreach($regFacturas as $row){
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $row['facturaId']   ?> </td>
                        <td> <?php echo $row['facturaFecha']   ?></td>
                        <td> <?php echo $row['facturaCostoTotal']   ?></td>
                        <td> <?php echo $row['tipoPagoNombre']   ?></td>
                        <td>
                            <a on class="cancel" href="../Controller/ImprimirFactura.php?factId=<?php echo "$row[facturaId]" ?>"><i class="fas fa-file-pdf"></i></a>
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>
                <nav class="paginacion">
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> hidden <?php }else{ echo ""; } ?> href="../view/facturas.php?pagina=<?php echo "$_GET[pagina]"-1; ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a href="../view/facturas.php?pagina=<?php echo"$i"+1 ?>"><?php echo "$i"+1;  ?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/facturas.php?pagina=<?php echo "$_GET[pagina]"+1; ?>"> Siguiente</a>
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