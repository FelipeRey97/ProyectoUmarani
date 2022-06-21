
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

$conexion1 = mysqli_connect('localhost','root','','proyecto') or 
    die ("problemas en la conexion" . mysqli_error($conexion1));


   if(isset($_REQUEST['buscar'])) {

    $busqueda = $_REQUEST['buscar'];

    $resultados = mysqli_query($conexion1,"SELECT * FROM articulo 
    JOIN categoria
    ON artCategoriaId = categoriaId
    WHERE artNombre LIKE '%$busqueda%' OR categoriaNombre LIKE '%$busqueda%'") 
    or die ("problemas en el select " . mysqli_error($conexion1));

}
    if(isset($resultados)){



    while($res = mysqli_fetch_array($resultados)){
    ?>
        <div id="datos_buscador" class="Buscar_contenedor kartItem"> 
        <div class="miniatura">
            <img src= " <?php echo "$res[artVista]"  ?>" alt="">
        </div>
        <div class="info">
            <h3 class="title"><?php echo "$res[artNombre]"  ?></h3>
            <br> <p class="price" ><?php echo "$res[artPrecio]"  ?></p>
        </div>
        </div>
        
    <?php
    }

    }

    ?>



    
</body>
</html>
<?php   

                           