<?php  
session_start();
require_once('../Controller/mostrarPQRS.php');
$paginas = $cantidad/$registrosxpagina;
$paginas = ceil($paginas);
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
            <h4><?php echo "$_SESSION[rol] "; ?></h4>
             <h5><?php echo "$_SESSION[nombre] $_SESSION[apellido] "; ?></h5>
            </div>
            <nav class="secciones">
                <a href="#">Inicio</a>
                <a href="../View/Productos.php">Productos</a>
                <?php if($_SESSION['rol'] == 'ADMINISTRADOR')  { ?>
                <a href="../View/Usuarios.php">Usuarios</a>
                <a href="../View/adminClientes.php">Clientes</a> <?php } ?>
                <a href="../View/Pedidos.php">Pedidos</a>
                 <a href="../View/PQRS.php">PQRS</a> <br><br><br> 
                <a href="../Controller/cerrarSesion.php">Cerrar Sesión</a>
            </nav>
        </div>
        <div class="content">
        <header class="header">
            <h1>Gestión de PQRS</h1>
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
                <div class="exportar">
                    <a class="excel" href="#"><i class="fas fa-file-excel"></i> Excel</a>
                </div>
                <div class="filtros" >
                    <form action="">
                        <label for="fechainicio">Desde: </label>
                        <input type="date" name="fechainicio"><br><br>
                        <label for="fechafin">Hasta:  </label>
                        <input type="date" name="fechafin"><br><br>
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
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Telefono</th>
                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>

                    <?php foreach($registros as $reg){

                        ?>
                    <tr class="información" >

                        <td><?php echo $reg['pqrsId'] ?></td>
                        <td><?php echo $reg['pqrsNombre'] ?></td>
                        <td><?php echo $reg['pqrsTelefono'] ?></td>
                        <td><?php echo $reg['pqrsTipoNombre'] ?></td>
                        <td><?php echo $reg['pqrsFecha'] ?></td>
                        <td><?php echo $reg['pqrsEstado'] ?></td>
                        <td>
                            <?php if($reg['pqrsEstado'] == 'Pendiente'){ ?>
                                   <a class="edit" href="../View/GestionPqrs.php?pqEdit=<?php echo "$reg[pqrsId]" ?>"><i class="far fa-edit"></i></i></a>
                                   <?php if($_SESSION['rol'] == 'ADMINISTRADOR'){ ?>
                                    <a class="detail" href="../View/detalleResolucion.php?pqVis=<?php echo "$reg[pqrsId]" ?>"><i class="far fa-eye"></i></a>
                                    <?php  }    ?>
                             <?php  }else { ?>
                                <?php if($_SESSION['rol'] == 'ADMINISTRADOR'){ ?>
                                    <a class="edit" href="../View/GestionPqrs.php?pqEdit=<?php echo "$reg[pqrsId]" ?>"><i class="far fa-edit"></i></i></a>
                                    <?php  }    ?>
                                 <a class="detail" href="../View/detalleResolucion.php?pqVis=<?php echo "$reg[pqrsId]" ?>"><i class="far fa-eye"></i></a>
                                 
                                 <?php }?>
                            
                        </td>
                    </tr>
                    <?php  } ?>
                </table>
                <nav class="paginacion">
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> hidden <?php }else{ echo""; } ?> href="../View/PQRS.php?pagina=<?php echo "$_GET[pagina]"-1 ?>">Anterior </a>

                <?php for($i=0; $i < $paginas; $i++){ ?>

                    <a href="../View/PQRS.php?pagina=<?php echo "$i"+1; ?>"><?php echo "$i"+1;  ?></a>

                  <?php     }   ?>


                <a class="prev-next" <?php if($_GET['pagina']>=$paginas){ ?> hidden <?php }else{ echo""; } ?> href="../View/PQRS.php?pagina=<?php echo "$_GET[pagina]"+1 ?>"> Siguiente</a>

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