<?php 
//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD



    class Clientes {

            private $cl;
            public $artporpag;
            private $sentencia;

        public function __construct()
        {
            require('../Model/ConexionBD.php');
            $this->cl = $conexionBD;
            
        }
        public function inicializar($artxpag){

            $this->artporpag = $artxpag;
        }
        public function filtrar($where){

            $this->sentencia = $where;

        }
        public function insertarCliente($cNombre,$cApellido,$cMail,$cPassword){


            $this->cl->query("INSERT INTO cliente(clienteNombre,clienteApellido,clienteEmail,clienteContraseña)
            VALUES ('$cNombre','$cApellido','$cMail','$cPassword')
            ") or die ("problemas en el select " . mysqli_error($cl));

            
        }


        public function verCliente(){

            $sentencia = $this->sentencia;
            $cantidad = $this->cl->query("SELECT COUNT(*) as cantidad FROM factura");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $query = $this->cl->query("SELECT * FROM cliente 
            $sentencia
            ORDER BY clienteId DESC
            LIMIT $inicio,$registrosxpagina ");
            
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

        public function cerrarConexion(){

            $this->cl->close();
        }
        public function contarRegistros($where){


            $registros = $this->cl->query("SELECT COUNT(*) AS cantidad FROM cliente
             $where") or die("problemas en el select");
 
             return $registros;
 
         }


    }

    ?>