
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

                if(isset($_FILES['foto1']) && $_FILES['foto1']['name'] != ""){
                    $nombre_imagen = $_FILES['foto1']['name'];
                    $temporal = $_FILES['foto1']['tmp_name'];
                    $carpeta='../Uploads/ImagenPrincipal';
                    $ruta = $carpeta.'/'.$nombre_imagen;
                    move_uploaded_file($temporal,$carpeta.'/'.$nombre_imagen);
                           
                }else{

                    $ruta= $_REQUEST['rutaActual'];
                }

                $prod2 = new Producto();
                // Se valida que los formularios del nuevo producto no se envien vacios
                $artId = $_REQUEST['aId'];

        if($_REQUEST['aNombre'] != "" && $_REQUEST['aPrecio'] != "" && $_REQUEST['aCantidad'] != "" && $_REQUEST['aestado'] != ""
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
            header("refresh:1;url=../View/Productos.php?pagina=1");
   
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


            ?>


            </div>
        </section>
        </div>
        
    </div>
</body>
</html>