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

        $error = "nombre";
        $vaNombre = false;
        
    }if(isset($_REQUEST['aPrecio']) && $_REQUEST['aPrecio'] != ""  && preg_match("/^[0-9]{3,11}$/", $_REQUEST['aPrecio'])){

        $aPrecio = htmlentities($_REQUEST['aPrecio']);
        $vaPrecio = true;
    }
    else{
        $error = "precio";
        $vaPrecio = false;
      
    }
    if(isset($_REQUEST['aCantidad']) && $_REQUEST['aCantidad'] != ""  && preg_match("/^[0-9]{1,11}$/", $_REQUEST['aCantidad'])){

        $aCantidad = htmlentities($_REQUEST['aCantidad']);
        $vaCantidad = true;
    }
    else{
        $error = "cantidad";
        $vaCantidad = false;
       
        
    }
    if(isset($_REQUEST['aestado']) && $_REQUEST['aestado'] != ""  && preg_match("/^[a-zA-Z ]{4,15}$/", $_REQUEST['aestado'])){

        $aestado = htmlentities($_REQUEST['aestado']);
        $aestado = ucfirst($aestado);
        $vaEstado = true;
    }
    else{
        $error = "estado";
        $vaEstado = false;
        
    }if(isset($_REQUEST['aCategoria']) && $_REQUEST['aCategoria'] != ""  && preg_match("/^[0-9]{1}$/", $_REQUEST['aCategoria'])){

        $aCategoria = htmlentities($_REQUEST['aCategoria']);
        $aCategoria = ucfirst($aCategoria);
        $vaCategoria = true;
    }
    else{
        $error = "categoria";
        $vaCategoria = false;
        
    }
    
    if($vaNombre == true && $vaPrecio == true && $vaCantidad == true && $vaEstado == true && $vaCategoria == true){

        $prod->insertarProducto($ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria);
        $error = "aceptable";
         header("refresh:1;url=../View/Productos.php?pagina=1");
    }
    else if(empty($_REQUEST['aNombre']) || empty($_REQUEST['aPrecio']) || empty($_REQUEST['aCantidad']) || empty($_REQUEST['aestado']) || empty($_REQUEST['aCategoria'])){
        
        $error = "vacio";
        
        }            
    
   
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>
<body>
<?php 
    
    switch($error){

        case "nombre":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Nombre',
           'warning'
           )
           </script>
        <?php   break;
        case "precio":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Apellido',
           'warning'
           )
           </script>
        <?php   break;
        case "cantidad":
           ?>
           <script>
           Swal.fire(
           'Atención',
           'Por favor verifique el Documento',
           'warning'
           )
           </script>
     <?php   break;
     case "estado":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique la clave',
        'warning'
        )
        </script>
     <?php   break;
     case "categoria":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'Verifique el estado',
        'warning'
        )
        </script>
     <?php   break;
     case "aceptable":
        ?>
        <script>
        Swal.fire(
        'Completado',
        'Se ha registrado el usuario satisfactoriamente',
        'success'
        )
        </script>
     <?php   break;
     case "vacio":
        ?>
        <script>
        Swal.fire(
        'Atención',
        'No se permiten campos vacíos',
        'error'
        )
        </script>
     <?php   break;
     }


    }
    
    $prod->cerrarConexion();

?>     
</body>
</html>