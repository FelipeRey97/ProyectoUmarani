<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Conexion {

            private $con;

        public function __construct()
        {

            $this->con = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarUsuario(){


            $this->con->query("INSERT INTO usuariotienda(usuarioNombre,usuarioApellido,usuarioDoc,usuarioContraseña,usuarioEstado,usuarioRolId)
            VALUES ('$_REQUEST[unombre]','$_REQUEST[uapellido]','$_REQUEST[udocumento]','$_REQUEST[ucontraseña]','$_REQUEST[uestado]',$_REQUEST[urol])
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
       
          public function actualizarUsuario(){


           $this->con->query("UPDATE usuariotienda SET  usuarioNombre = '$_REQUEST[unombre]' ,usuarioApellido = '$_REQUEST[uapellido]',usuarioContraseña = '$_REQUEST[ucontraseña]',usuarioEstado = '$_REQUEST[uestado]',usuarioRolId = '$_REQUEST[urol]' 
           WHERE usuarioId = '$_REQUEST[tabla]' ") or die ("problemas en el select " . mysqli_error($con));

           
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