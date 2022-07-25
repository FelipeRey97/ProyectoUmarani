<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Conexion {
 
            private $con;
            public $artporpag; 
            private $sentencia;
            private $documento;

        public function __construct()
        {
 
            $this->con = new mysqli('localhost','root','','proyecto');
            
        }
        public function inicializar($artxpag){

            $this->artporpag = $artxpag;
        }
        public function filtrar($where){

            $this->sentencia = $where;
        }
        public function comprobarExistencia($doc){
            $this->documento = $doc;
            $usuarioDoc = $this->documento;
            $query = $this->con->query("SELECT * FROM usuariotienda WHERE usuarioDoc = $usuarioDoc");
            
            if($fila = $query->fetch_assoc()){

                return true;
            }else{

                return false;
            }

        }
        public function insertarUsuario($unombre,$uapellido,$udocumento,$ucontraseña,$uestado,$urol){


            $this->con->query("INSERT INTO usuariotienda(usuarioNombre,usuarioApellido,usuarioDoc,usuarioContraseña,usuarioEstado,usuarioRolId)
            VALUES ('$unombre','$uapellido','$udocumento','$ucontraseña','$uestado',$urol)
            ") or die ("problemas en el select " . mysqli_error($con));

            
        }
        public function verUsuario(){

            $sentencia = $this->sentencia;
            $cantidad = $this->con->query("SELECT COUNT(*) as cantidad FROM factura");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $query = $this->con->query("SELECT * FROM usuariotienda
            JOIN rol
            ON rolId = usuarioRolId
            $sentencia
            ORDER BY usuarioId DESC
            LIMIT $inicio,$registrosxpagina");
            
           

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

         header("Location: ../View/Usuarios.php");
        }

        public function cerrarConexion(){

            $this->con->close();
        }


    }

    $conexionUsuario = mysqli_connect("localhost","root","","proyecto") 
    or die("problemas con la conexion");


?>