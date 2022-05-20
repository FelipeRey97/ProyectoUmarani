
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
                <?php 
                
                require('../Model/M_Productos4.php');

                // Se obtiene el nombre de la imagen y el nombre de la imagen temporal
                 // se crea la ruta de la carpeta donde se guarda la imagen
                 // se mueve la imagen a la carpeta ../Uploads/ImagenPrincipal y se guarda la ruta como texto en la BD

                if($_FILES['foto1']['name'] != ""){
                    $nombre_imagen = $_FILES['foto1']['name'];
                    $temporal = $_FILES['foto1']['tmp_name'];
                    $carpeta='../Uploads/ImagenPrincipal';
                    $ruta = $carpeta.'/'.$nombre_imagen;
                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
                           
                }

                $prod2 = new Producto();
                // Se valida que los formularios del nuevo producto no se envien vacios
                $artId = $_REQUEST['aId'];

        if($_FILES['foto1']['name'] != "" && $_REQUEST['aNombre'] != "" && $_REQUEST['aPrecio'] != "" && $_REQUEST['aCantidad'] != "" && $_REQUEST['aestado'] != ""
        && $_REQUEST['aCategoria'] !=""){


            $aNombre = $_REQUEST['aNombre'];
            $aPrecio = $_REQUEST['aPrecio'];
            $aCantidad = $_REQUEST['aCantidad'];
            $aestado = $_REQUEST['aestado'];
            $aCategoria = $_REQUEST['aCategoria'];
           
                
                $prod2->actualizarProducto($artId,$ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria);
                ?>
                <script>
                    swal("Operación Realizada", "Se ha guardado el Usuario Satisfactoriamente!", "success");
                </script>
                
                <?php
            header("refresh:1;url=http://localhost/UmaraniWeb/View/Productos.php");
   
        } 
        else{
        
        ?>
        <script>
        swal("Atención", "Por favor complete todos los campos", "warning");
        </script>
        <?php
        include('../View/editarProducto.php');
        
        }

// 


                //Este codigo permite guardar una galeria de imagenes asociada a cada producto
                // Pendiente de estructurar al MVC con su respectiva tabla


                // $registros = mysqli_query($conexion,"select artId, artNombre from articulo where artId in (select max(artId) from articulo)") or die("problemas en el select" . mysqli_error($conexion));

                // while($reg = mysqli_fetch_array($registros)){
                
                //     $artId = $reg['artId'];
                //     $artNombre = $reg['artNombre'];
                // }
                // ?>

                

                <!-- <p>Los datos del articulo  Se ha guardado correctamente con id  </p> <br><br>

                <p>A continuación proceda a añadir las imagenes de Galería para el articulo: </p>
                <p>Debe añadir minimo 1 imagen hasta un maximo de 5 </p>
                <p>Las imagenes deben pesar menos de 2Mb </p> <br><br>

                <form action="NuevoProducto3.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="artId" value="">
                    <label for="foto1">Galeria 1:</label> 
                    <input type="file" name="foto2" id="foto2"><br><br>
                    <label for="foto1">Galeria 2:</label> 
                    <input type="file" name="foto3" id="foto3"><br><br>
                    <label for="foto1">Galeria 3:</label> 
                    <input type="file" name="foto4" id="foto4"><br><br>
                    <label for="foto1">Galeria 4:</label> 
                    <input type="file" name="foto5" id="foto5"><br><br>
                    <input type="submit" name="btn-agregar" value="Agregar">
                </form>  -->

            </div>
        </section>
        </div>
        
    </div>
</body>
</html>