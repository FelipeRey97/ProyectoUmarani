<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Conexion {

            private $con;

        public function __construct()
        {

            $this->con = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarUsuario($unombre,$uapellido,$udocumento,$ucontraseña,$uestado,$urol){


            $this->con->query("INSERT INTO usuariotienda(usuarioNombre,usuarioApellido,usuarioDoc,usuarioContraseña,usuarioEstado,usuarioRolId)
            VALUES ('$unombre','$uapellido','$udocumento','$ucontraseña','$uestado',$urol)
            ") or die ("problemas en el select " . mysqli_error($con));

            
        }
        public function verUsuario(){

            $query = $this->con->query("SELECT * FROM usuariotienda
            JOIN rol
            ON rolId = usuarioRolId");
            
           

            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
       
          public function actualizarUsuario($unombre,$uapellido,$ucontraseña,$uestado,$urol,$usuarioId){


           $this->con->query("UPDATE usuariotienda SET  usuarioNombre = '$unombre' ,usuarioApellido = '$uapellido',
           usuarioContraseña = '$ucontraseña',usuarioEstado = '$uestado',usuarioRolId = $urol
           WHERE usuarioId = $usuarioId ") or die ("problemas en el select " . mysqli_error($con));

           
          }

        
       
        public function borrarUsuario(){


         $this->con->query("DELETE FROM  usuarioTienda WHERE usuarioId = '$_REQUEST[tabla]'") 
         or die ("problemas en el select " . mysqli_error($con));

         header("Location: http://localhost/UmaraniWeb/View/Usuarios.php");
        }

        public function cerrarConexion(){

            $this->con->close();
        }


    }


?>