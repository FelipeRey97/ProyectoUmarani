
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
                           
                }

                $prod = new Producto();
                // Se valida que los formularios del nuevo producto no se envien vacios

  if(isset($_REQUEST['registrar'])){

    if(isset($_REQUEST['aNombre']) && $_REQUEST['aNombre'] != ""  && preg_match("/^[A-Za-z ]{3,150}$/", $_REQUEST['aNombre'])){

        $aNombre = htmlentities($_REQUEST['aNombre']);
        $aNombre = ucfirst($aNombre);
        $vaNombre = true;
    }
    else{

        $vaNombre = false;
        ?>
        <script>
         swal("Atención", "Verifique el Nombre", "warning");
        </script>
        <?php
    }if(isset($_REQUEST['aPrecio']) && $_REQUEST['aPrecio'] != ""  && preg_match("/^[0-9]{3,11}$/", $_REQUEST['aPrecio'])){

        $aPrecio = htmlentities($_REQUEST['aPrecio']);
        $vaPrecio = true;
    }
    else{

        $vaPrecio = false;
        ?>
        <script>
         swal("Atención", "Verifique el Precio", "warning");
        </script>
        <?php
    }
    if(isset($_REQUEST['aCantidad']) && $_REQUEST['aCantidad'] != ""  && preg_match("/^[0-9]{1,11}$/", $_REQUEST['aCantidad'])){

        $aCantidad = htmlentities($_REQUEST['aCantidad']);
        $vaCantidad = true;
    }
    else{

        $vaCantidad = false;
        ?>
        <script>
         swal("Atención", "Verifique la Cantidad", "warning");
        </script>
        <?php
        
    }
    if(isset($_REQUEST['aestado']) && $_REQUEST['aestado'] != ""  && preg_match("/^[a-zA-Z ]{4,15}$/", $_REQUEST['aestado'])){

        $aestado = htmlentities($_REQUEST['aestado']);
        $aestado = ucfirst($aestado);
        $vaEstado = true;
    }
    else{

        $vaEstado = false;
        ?>
        <script>
         swal("Atención", "Verifique el Estado", "warning");
        </script>
        <?php

    }if(isset($_REQUEST['aCategoria']) && $_REQUEST['aCategoria'] != ""  && preg_match("/^[0-9]{1}$/", $_REQUEST['aCategoria'])){

        $aCategoria = htmlentities($_REQUEST['aCategoria']);
        $aCategoria = ucfirst($aCategoria);
        $vaCategoria = true;
    }
    else{

        $vaCategoria = false;
        ?>
        <script>
         swal("Atención", "Verifique la Categoría", "warning");
        </script>
        <?php
    }
    
    if($vaNombre == true && $vaPrecio == true && $vaCantidad == true && $vaEstado == true && $vaCategoria == true){

        $prod->insertarProducto($ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria);
        ?>
        <script>
            swal("Operación Realizada", "Se ha guardado el artículo Satisfactoriamente!", "success");
        </script>
        
        <?php
         header("refresh:1;url=../View/Productos.php?pagina=1");
    }
    else if(empty($_REQUEST['aNombre']) || empty($_REQUEST['aPrecio']) || empty($_REQUEST['aCantidad']) || empty($_REQUEST['aestado']) || empty($_REQUEST['aCategoria'])){
        
        ?>
        <script>
        swal("Atención", "Por favor complete todos los campos", "warning");
        </script>
        <?php
        
        }            
    
   
        } 
               ?>

            </div>
        </section>
        </div>
        
    </div>
</body>
</html>