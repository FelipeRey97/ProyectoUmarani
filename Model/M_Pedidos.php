<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD
 
    class Pedido { 

            private $ped;
            public $artporpag;
            private $sentencia;
            private $orden;

        public function __construct()
        {

            $this->ped = new mysqli('localhost','root','','proyecto');
            
        }
        public function inicializar($artxpag){

            $this->artporpag = $artxpag;

        }
        public function filtrar($where){

            $this->sentencia = $where;

        }
        public function ordenar($orderby){

            $this->orden = $orderby;

        }

        public function insertarPedido($idFactura,$todaydate,$clienteId,$id,$total,$direccionId){


            $this->ped->query("INSERT INTO pedido(pedidoId,pedidoFechaInicio,pedidoClienteId,pedidoFacturaId,pedidoCostoTotal,pedidoDireccionId)
            VALUES ('$id','$todaydate','$clienteId','$idFactura','$total',$direccionId)
            ") or die ("problemas en el select " . mysqli_error($ped));
 
            
        }
        public function verPedido(){

            $sentencia = $this->sentencia;
            $orderby = $this->orden;
            $cantidad = $this->ped->query("SELECT COUNT(*) as cantidad FROM pedido");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;
            $query = $this->ped->query("SELECT * FROM pedido
            JOIN direccionpedido
            ON direccionId = pedidoDireccionId
            $sentencia
            $orderby
            LIMIT $inicio,$registrosxpagina");
            
            
            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
       
            public function actualizarPedido($unombre,$uapellido,$ucontraseña,$uestado,$urol,$usuarioId){


           $this->ped->query("UPDATE usuariotienda SET  usuarioNombre = '$unombre' ,usuarioApellido = '$uapellido',
           usuarioContraseña = '$ucontraseña',usuarioEstado = '$uestado',usuarioRolId = $urol
           WHERE usuarioId = $usuarioId ") or die ("problemas en el select " . mysqli_error($ped));

           
          }


        public function cerrarConexion(){

            $this->ped->close();
        }


    }

    $conexionPedido = mysqli_connect("localhost","root","","proyecto") 
    or die ("problemas con la conexion");

?>



