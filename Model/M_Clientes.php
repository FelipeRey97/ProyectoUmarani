
<?php
// session_start();
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
         //header("location: ../View/iniciarSesion.php");
    }

}
  
?>


<?php 

    class Clientes {

            private $cl;
            private $mail;

        public function __construct()
        {

            require('../Model/ConexionBD.php');
            $this->cl = $conexionBD;
            
        }
        public function verificarEmail($mail){

            $this->mail = $mail;
            $mail = $this->mail;
            $query = $this->cl->query("SELECT * FROM cliente WHERE clienteEmail = '$mail'");

            if($fila = $query->fetch_assoc()){

                return true;
            }else{

                return false;
            }

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

        public function DetalleCliente(){

            $registroCliente = $this->cl->query("SELECT * FROM cliente WHERE clienteEmail ='$_SESSION[cMail]'") 
            or die ("problemas en el select" );
    
            return $registroCliente;
    
        }

    } 

        

        

?>