<?php

include_once('../Controller/loginUsuario2.php');



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
    
    <link rel="stylesheet" href="../CSS/LogInUsuario.css">
    <script src="https://kit.fontawesome.com/f243ce0afc.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Lobster&family=Shadows+Into+Light&display=swap" rel="stylesheet">

    <div class="padre">
       
        <section class="section">
            <div class="form-container">
                <h1>Bienvenido a Umarani</h1>
                <form action="#" method="post" class="iniciar-sesion">
                    <label for="">Usuario:</label><br>
                    <input class="control" type="text" name="usuario" required>  <br>
                    <label for="">Contraseña:</label><br>
                    <input class="control" type="password" name="contraseña" required><br>
                    <input class="boton-iniciarSesion" type="submit" name="iniciar-sesion" value="Iniciar Sesión">
                </form>
        </div>
        </section>


        
        