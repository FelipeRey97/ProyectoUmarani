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
    
        require_once('../Model/M_Clientes.php');
       if(isset($_REQUEST['cMail'])){

        $sanitized_Mail = filter_var($_REQUEST['cMail'], FILTER_SANITIZE_EMAIL);
        $sanitized_Mail = filter_var($sanitized_Mail, FILTER_VALIDATE_EMAIL);  //desinfección y filtrado de Email
       
    }
        $cliente1 = new Clientes;

        if(isset($_REQUEST['Registrarse'])){
            

            if(isset($_REQUEST['cNombre']) && $_REQUEST['cNombre'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cNombre'])){

                $cNombre = htmlentities($_REQUEST['cNombre']);
                $cNombre = strtoupper($cNombre);
                $vcNombre = true;
            }else{
                
                $vcNombre = false;
                ?>
                <script>
                swal("Atención", "Por favor verifique el nombre", "warning");
                </script>
                <?php
            }if(isset($_REQUEST['cApellido']) && $_REQUEST['cApellido'] && preg_match("/^[a-zA-Z ]{2,50}$/",$_REQUEST['cApellido'])){

                $cApellido =  htmlentities($_REQUEST['cApellido']);
                $cApellido = strtoupper($cApellido);
                $vcApellido = true;
                
            }
            else{
               
                $vcApellido = false;
                ?>
                <script>
                swal("Atención", "Por favor verifique el apellido", "warning");
                </script>
                <?php
                
            }if(isset($_REQUEST['cMail']) && $_REQUEST['cMail'] && filter_var($sanitized_Mail, FILTER_VALIDATE_EMAIL)){

                $sanitized_Mail =  htmlentities($sanitized_Mail);
                
                $mail = $sanitized_Mail;
                $existe_Email = $cliente1->verificarEmail($mail);
                if($existe_Email == true){
                    
                    $vsanitized_Mail = false;
                    ?>
                    <script>
                    swal("Atención", "el E-mail ingresado ya está en uso", "warning");
                    </script>
                    <?php
                }else{

                    $vsanitized_Mail = true;
                    $cMail = $mail;
                }
                
            }
            else{
                
                $vsanitized_Mail = false;
                ?>
                <script>
                swal("Atención", "Por favor verifique el E-mail", "warning");
                </script>
                <?php 
            }
            if(isset($_REQUEST['cClave'])){
                
                $cPassword =  $_REQUEST['cClave'];

               function validar_clave($cPassword){

                    if(strlen($cPassword) < 6){
                        // echo strlen($cPassword);
                        ?>
                        <script>
                        swal("Atención", "La clave debe ser mayor a 6 caracteres", "info");
                        </script>
                        <?php
                       return false;
                    }
                    if(strlen($cPassword) > 10){
                        ?>
                        <script>
                        swal("Atención", "La clave no puede tener más de 10 caracteres", "info");
                        </script>
                        <?php
                       return false;
                    }
                    if (!preg_match('`[a-z]`',$cPassword)){
                        ?>
                        <script>
                        swal("Atención", "La clave debe tener al menos una letra minúscula", "info");
                        </script>
                        <?php
                       return false;
                    }
                    if (!preg_match('`[A-Z]`',$cPassword)){
                       ?>
                        <script>
                        swal("Atención", "La clave debe tener al menos una letra mayúscula", "info");
                        </script>
                        <?php
                       return false;
                    }
                    if (!preg_match('`[0-9]`',$cPassword)){
                        ?>
                        <script>
                        swal("Atención", "La clave debe tener al menos un caracter numérico", "info");
                        </script>
                        <?php
                       return false;
                    }
                    return true;
                 } 

                 $vcPassword = validar_clave($cPassword);
                       
            }else{

                $vcPassword = false;
            }
            if(isset($_REQUEST['terminos'])){

                $terminos = true;

            }else{
              
                $terminos = false;
                ?>
                <script>
                swal("Atención", "Para registrarse debe aceptar nuestros términos y condiciones", "info");
                </script>
                <?php
            }

            if($terminos == true && $vcPassword == true && $vcNombre == true && $vcApellido == true && $vsanitized_Mail == true && $vcPassword == true){
                $_SESSION['cMail'] =  $sanitized_Mail;
                $cPassword = password_hash($cPassword, PASSWORD_DEFAULT);
            $cliente1->insertarCliente($cNombre,$cApellido,$cMail,$cPassword);
            $cliente1->cerrarConexion();
            ?>
            <script>
                swal("Operación Realizada","Te has registrado correctamente", "success");
            </script>
            
            <?php
            if($_REQUEST['compra'] == 1){
            $valor = 1;
            header("refresh:1;url=../view/datosfacturacion.php?valor=$valor");
            }
            else{

            header("refresh:1;url=../View/areacliente.php?valor=0");
            }

            }

            else if(empty($_REQUEST['cNombre']) || empty($_REQUEST['cApellido']) && empty($_REQUEST['cMail']) && empty($_REQUEST['cPassword'])){

                ?>
                <script>
                swal("Atención", "Por favor complete todos los campos", "warning");
                </script>
                <?php
                
                }

        } 

        
         
       
    ?>
    
        

</body>
</html>