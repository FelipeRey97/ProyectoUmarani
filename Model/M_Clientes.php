<?php
session_start();

       
?>

<?php
if(isset($_SESSION['cMail'])){

}else{

if(isset($_REQUEST['compra'])){
    if($_REQUEST['compra'] == 1){
        $valor= 1;
        header("refresh:20;url=../View/iniciarSesion.php?valor=$valor");
        }
        else{

            header("refresh:20;url=..View/iniciarSesion.php?valor=0");
        }

    }else{
        header("location: ../View/iniciarSesion.php");
    }

}
 
    
    

 
?>


<?php 
//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD



    class Clientes {

            private $cl;

        public function __construct()
        {

            $this->cl = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarCliente($cNombre,$cApellido,$cMail,$cPassword){


            $this->cl->query("INSERT INTO cliente(clienteNombre,clienteApellido,clienteEmail,clienteContraseña)
            VALUES ('$cNombre','$cApellido','$cMail','$cPassword')
            ") or die ("problemas en el select " . mysqli_error($cl));

            
        }

        


        public function verCliente(){

            $query = $this->cl->query("SELECT * FROM cliente 
            ORDER BY clienteId DESC  ");
            
            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;

        }
       
          public function actualizarCliente($cNombre,$cApellido,$cClave,$cTelefono){


           $this->cl->query("UPDATE cliente SET  clienteNombre = '$cNombre' ,clienteApellido = '$cApellido',
           clienteContraseña = '$cClave',clienteTelefono = '$cTelefono'
           WHERE clienteEmail = '$_SESSION[cMail]'") or die ("problemas en el select " . mysqli_error($cl));

          
          }

        
       
        public function borrarUsuario(){


         $this->cl->query("DELETE FROM  usuarioTienda WHERE usuarioId = '$_REQUEST[tabla]'") 
         or die ("problemas en el select " . mysqli_error($cl));

         header("Location: ../View/Usuarios.php");
        }

        public function cerrarConexion(){

            $this->cl->close();
        }


    }

    $conexion = mysqli_connect('localhost','root','','proyecto') or 
        die ("problemas en la conexion" . mysqli_error($conexion));

        if(isset($_SESSION['cMail'])){
            $registroCliente = mysqli_query($conexion,"select * from cliente where clienteEmail ='$_SESSION[cMail]'") 
            or die ("problemas en el select" . mysqli_error($conexion));
        }

        

?>