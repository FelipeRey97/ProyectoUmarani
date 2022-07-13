<?php
session_start();
if($_SESSION['doc'] == false){

    header("Location: ..View/loginUsuario.php");
}

if(isset($_GET['pagina'])){

        
}else{
    $_GET['pagina'] = 1;
}
require_once('../Controller/mostrarClientes.php');
$paginas = $cantidad/$registrosxpagina;
$paginas = ceil($paginas);
?>

<?php 
    

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
                <h4><?php echo $_SESSION['nombre'] ." ".  $_SESSION['apellido']; ?></h4>
                <h5><?php echo $_SESSION['rol']; ?></h5>
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
            <h1>Gestión de Clientes</h1>
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
                    <form action="">
                        <label for="">Criterio:</label>
                        <select name="criterio" id="">
                            <option value="">Seleccione</option>
                            <option value="id">Id</option>
                            <option value="nombre">Nombre</option>
                            <option value="correo">Correo Electronico</option>
                            <option value="telefono">Teléfono</option>
                        </select>
                        <input type="hidden" value="clientes" name="v">
                        <input name="textbox" type="text" class="idpedido">
                        <input class="searchButton" type="button" value="Buscar"
                        onclick="this.form.action='#';this.form.submit();" />
                        <input class="excel" type="button" value="Exportar"
                        onclick="this.form.action='../Controller/exportarXslx.php';this.form.submit();" />
                    </form>
                    
                </div>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>

                     <?php

                        foreach($registros as $reg){
                        
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $reg['clienteId']   ?> </td>
                        <td> <?php echo $reg['clienteNombre']   ?></td>
                        <td> <?php echo $reg['clienteApellido']   ?></td>
                        <td> <?php echo $reg['clienteTelefono']   ?></td>
                        <td> <?php echo $reg['clienteEmail']   ?></td>
                        <td>
                            <!-- <a class="edit" href="#"><i class="far fa-edit"></i></i></a> -->
                            <a class="detail" href="#"><i class="far fa-eye"></i></a>
                            <!-- <a class="cancel" href="#"><i class="fas fa-ban"></i></a> -->
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>
                <nav class="paginacion">
                <a class="prev-next" <?php if($_GET['pagina']<=1){ ?> style="visibility:hidden;" <?php }else{ echo ""; } ?> href="../view/adminClientes.php?pagina=<?php echo "$_GET[pagina]"-1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo "5";}?>&criterio=<?php if(isset($_GET['criterio'])){ echo "$_GET[criterio]"; } else { echo ""; }?>&textbox=<?php if(isset($_GET['textbox'])){ echo "$_GET[textbox]";}else{ echo "";} ?>">Anterior </a>
                <?php for($i=0; $i < $paginas; $i++){

                  ?> <a <?php if($_GET['pagina'] == $i+1){ ?> class= "active" <?php }  ?> href="../view/adminClientes.php?pagina=<?php echo"$i"+1 ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo "5";}?>&criterio=<?php if(isset($_GET['criterio'])){ echo "$_GET[criterio]"; } else { echo ""; }?>&textbox=<?php if(isset($_GET['textbox'])){ echo "$_GET[textbox]";}else{ echo "";} ?>"><?php echo "$i"+1;?> </a>   
               
                <?php  } ?>
               
                <a class="prev-next" <?php if($_GET['pagina']>=$paginas ){ ?> style="visibility:hidden;" <?php }else{ echo ""; } ?> href="../view/adminClientes.php?pagina=<?php echo "$_GET[pagina]"+1; ?>&artxpag=<?php if(isset($_GET['artxpag'])){ echo "$_GET[artxpag]"; }else{ echo "5";}?>&criterio=<?php if(isset($_GET['criterio'])){ echo "$_GET[criterio]"; } else { echo ""; }?>&textbox=<?php if(isset($_GET['textbox'])){ echo "$_GET[textbox]";}else{ echo "";} ?>"> Siguiente</a>
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