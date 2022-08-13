
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>

<body> 

<?php 

include_once('../Model/M_buscador.php');


   if(isset($_REQUEST['buscar'])) {
    $prodB = new Buscador();
    $busqueda = $_REQUEST['buscar'];
    
    $resultados = $prodB->buscarProductos($busqueda);


    if(isset($resultados)){


    foreach($resultados as $res){
    ?>
        <div id="datos_buscador" class="Buscar_contenedor kartItem">  
        <div class="miniatura">
        <a href="../Controller/DetalleArticulo.php?arId=<?php echo "$res[artId]"?>">
            <img src= " <?php echo "$res[artVista]"  ?>" alt="">
        </div>
        <div class="info">
            <h3 class="title"><?php echo "$res[artNombre]"  ?></h3>
            <br> <p class="price" >$ <?php echo "$res[artPrecio]"  ?></p>
        </div>
        </a>
        </div>
        
    <?php
    }

    }

}

    ?>



    
</body>
</html>  