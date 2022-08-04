<?php
session_start();
    require_once('../Controller/mostrarDetallePedido.php');
    $date = date("Y/m/d");
    include_once('../Controller/ordenDespacho.php');
    
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
          <?php  if(isset($nombre)){   //Valida si existen datos, sino existen no muestra resultados y redirige a la seccion pedidos.
   
             ?>
            <h1>Pedido No. <?php echo "$id" ?></h1>
        </header>
        <section class="section">

            <div class="container">
                
                <div class="filtros" >
                        <h1>Datos Pedido</h1><br><br>
                        <p><b>Cliente: </b>  <?php echo "$nombre $apellido" ?></p><br>
                        <p><b>Telefono: </b>   <?php echo "$telefono" ?>   </p><br>
                        <p><b>Dirección: </b>  <?php echo "$direccion" ?> </p><br>
                        <!-- <p><b>Método Pago: </b>  Contado </p><br> -->
                        <p><b>Mail: </b>  <?php echo "$mail" ?> </p><br>
                        <p> <b> Ver Factura Asociada: </b><a class="cancel" href="../Controller/ImprimirFactura.php?factId=<?php echo "$id" ?>"> <i class="fas fa-file-pdf"></i></a><br> </p><br>
                        <!-- Se prepara formulario para ingresar la orden de Envio -->
                        <?php 
                        if(isset($_REQUEST['ped'])){    ?> 
                        <form action="" method="post"> 
                        <label for="">Inserte el Código de envio: </label>
                        <input type="text" value="<?php ?>" name="despachoId">
                        <select name="empresaId" id="">
                            <?php  
                             while($emp = mysqli_fetch_array($empresaenvio)) {  ?>
                            <option value="<?php echo "$emp[empresaId]"; ?> "> <?php echo "$emp[empresaNombre]"; ?> </option>
                            <?php  }  ?>
                        </select>
                        <input type="hidden" value="<?php echo "$id"; ?>" name="pedidoId">
                        <input type="hidden" value="<?php echo "$_SESSION[usuarioId]"; ?>" name="usuarioId">
                        <input type="hidden" value="<?php echo "$date"; ?>" name="date">
                        <input class="searchButton" name="Guardar" type="submit" value="Guardar">
                        </form><br><br>  <?php }
                               else if(isset($_REQUEST['vis']) && isset($cGuia) ){

                                
                            ?>
                            <h1>Datos Envío</h1><br><br>
                            <p><b>Id Despacho: </b> <?php echo "$cGuia"; ?> </p><br>
                            <p><b>Empresa: </b> <?php echo "$eLogistica"; ?> </p><br>
                            <p><b>Usuario: </b> <?php echo "$uNombre ". " ". "$uApellido"; ?> </p><br>
                            <p><b>Usuario Id: </b> <?php echo "$uCodigo"; ?> </p><br>
                            <p><b>Estado: </b> <?php echo "$pedEstado"; ?> </p><br> 
                            <p><b>Fecha de Envio: </b> <?php echo "$estadoFecha"; ?> </p><br>
                        
                    <?php  }
                   else if(isset($_REQUEST['rect'])){ ?>

                        <form action="" method="post"> 
                        <label for="">Inserte el Nuevo Código de envio: </label>
                        <input type="text" value="<?php ?>" name="despachoId">
                        <select name="empresaId" id="">
                            <?php  
                             while($emp = mysqli_fetch_array($empresaenvio)) {  ?>
                            <option value="<?php echo "$emp[empresaId]"; ?> "> <?php echo "$emp[empresaNombre]"; ?> </option>
                            <?php  }  ?>
                        </select>
                        <input type="hidden" value="<?php echo "$id"; ?>" name="pedidoId">
                        <input type="hidden" value="<?php echo "$_SESSION[usuarioId]"; ?>" name="usuarioId">
                        <input type="hidden" value="<?php echo "$date"; ?>" name="date">
                        <input class="searchButton" name="corregir" type="submit" value="Rectificar">
                        <input type="hidden" value="<?php echo "$cGuia"?>" name="old_DespachoId"><br>
                        <button onclick="this.form.submit();" class="cancel-order" name="cancelar" > Cancelar Pedido </button> <br><br> 
                        </form>  

                        <h1>Datos Envío</h1><br><br>
                            <p><b>Id Despacho: </b> <?php echo "$cGuia"; ?> </p><br>
                            <p><b>Empresa: </b> <?php echo "$eLogistica"; ?> </p><br>
                            <p><b>Usuario: </b> <?php echo "$uNombre ". " ". "$uApellido"; ?> </p><br>
                            <p><b>Usuario Id: </b> <?php echo "$uCodigo"; ?> </p><br>
                            <p><b>Estado: </b> <?php echo "$pedEstado"; ?> </p><br> 
                            <p><b>Fecha de Envio: </b> <?php echo "$estadoFecha"; ?> </p><br>
                            <?php } ?>  <!-- Detalle del pedido con los productos y su cantidad solicitada por el cliente  -->
                        <h1>Detalle Pedido</h1><br>
                    <!-- <a href="../View/nuevoUsuario.php">Nuevo Usuario</a> -->
                </div>
                <table>
                    <tr>
                        <th>Codigo</th>
                        <th>Cantidad</th>
                        <th>Imagen</th>
                        <th>Articulo</th>
                        <th>Precio Unitario</th>
                        <th>Costo Total</th>
                        <!-- <th>Ciudad/Municipio</th>
                        <th>Acciones</th> -->
                    </tr>

                     <?php
                        
                        // se muestran los datos de los usuarios almacenados en la variable $usuarios
                        while($detPed = mysqli_fetch_array($detallePedido)){
                        
            
                     ?>
                    <tr class="información" >
                        <td> <?php echo $detPed['artId']   ?></td>
                        <td> <?php echo $detPed['prodPedCant']   ?> </td>
                        <td> <img src="<?php echo $detPed['artVista']   ?>" alt=""> </td>
                        <td> <?php echo $detPed['artNombre']   ?></td>
                        <td> <?php echo "$ " . $detPed['artPrecio']   ?></td>
                        <td> <?php echo "$ " . $detPed['artPrecio'] * $detPed['prodPedCant']  ?></td>
                        <!-- <td> <?php echo $detPed['direccionCiudad']   ?></td>
                        <td> -->
                            <!-- <a class="edit" href="DetalleUsuario.php?tabla=<?php echo "$user[usuarioId]" ?>"><i class="far fa-edit"></i></i></a>
                            <a class="detail" href="detalleUsuario.php"><i class="far fa-eye"></i></a> -->
                            
                        </td>
                
                        <?php  
                            
                        }
                     ?>
                    
                </table>

                <?php  }else{

                    header("Location: ../view/pedidos.php");

                } ?>
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