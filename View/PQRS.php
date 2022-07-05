<?php  
session_start();
if($_SESSION['doc'] == false){

    header("Location: ../View/loginUsuario.php");
}
if(isset($_GET['pagina'])){

        
}else{
    $_GET['pagina'] = 1;
}
require_once('../Controller/mostrarPQRS.php');
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
            <h1>Gestión de PQRS</h1>
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
                <div class="exportar">
                     <a class="excel" href="#"><i class="fas fa-file-excel"></i> Excel</a> 
                  <!-- <a class="pdf" href="#"><i class="fas fa-file-pdf"></i> PDF </a> --> 
                </div>
                <div class="filtros" >
                    
                        <label for="fechainicio">Desde: </label>
                        <input type="date" name="fechainicio"><br><br>
                        <label for="fechafin">Hasta:  </label>
                        <input type="date" name="fechafin"><br><br>
                        <label for=""> Estado: </label>
                        <select name="estado" id="">Estado
                            <option value="">Seleccione</option>
                            <option value="Atendida">Atendida</option>
                            <option value="Pendiente">Pendiente</option>
                        </select>
                        <label for=""> Tipo: </label>
                        <select name="tipo" id="">
                            <option value="">Seleccione</option>
                            <option value="Consulta">Consulta</option>
                            <option value="Pedido">Pedido</option>
                            <option value="Garantia">Garantia</option>
                        </select>
                        <input class="searchButton" type="submit" value="Buscar">
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
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> hidden <?php }else{ echo ""; } ?> href="../view/PQRS.php?pagina=<?php echo "$_GET[pagina]"-1;?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&tipo=<?php if(isset($_REQUEST['tipo'])){ echo "$_REQUEST[tipo]"; } ?>&fechainicio=<?php if(isset($_REQUEST['fechainicio'])){ echo "$_REQUEST[fechainicio]"; } ?>&fechafin=<?php if(isset($_REQUEST['fechafin'])){ echo "$_REQUEST[fechafin]"; } ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a  <?php if($_GET['pagina'] == $i+1) { ?> class="active" <?php } ?> href="../view/PQRS.php?pagina=<?php echo"$i"+1 ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&tipo=<?php if(isset($_REQUEST['tipo'])){ echo "$_REQUEST[tipo]"; } ?>&fechainicio=<?php if(isset($_REQUEST['fechainicio'])){ echo "$_REQUEST[fechainicio]"; } ?>&fechafin=<?php if(isset($_REQUEST['fechafin'])){ echo "$_REQUEST[fechafin]"; } ?>"><?php echo "$i"+1;  ?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> hidden <?php }else{ echo ""; } ?> href="../view/PQRS.php?pagina=<?php echo "$_GET[pagina]"+1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo"5"; } ?>&estado=<?php if(isset($_REQUEST['estado'])){ echo "$_REQUEST[estado]"; } ?>&tipo=<?php if(isset($_REQUEST['tipo'])){ echo "$_REQUEST[tipo]"; } ?>&fechainicio=<?php if(isset($_REQUEST['fechainicio'])){ echo "$_REQUEST[fechainicio]"; } ?>&fechafin=<?php if(isset($_REQUEST['fechafin'])){ echo "$_REQUEST[fechafin]"; } ?>"> Siguiente</a>
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