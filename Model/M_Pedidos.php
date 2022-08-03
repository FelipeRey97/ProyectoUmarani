<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD
 
    class Pedido { 

            private $ped;
            public $artporpag;
            private $sentencia;
            private $orden;

        public function __construct()
        {

            require('../Model/ConexionBD.php');
            $this->ped = $conexionBD;
            
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
       
        public function actualizarPedido($pedidoId,$Estado){


            $this->ped->query("UPDATE pedido SET  pedidoEstado = '$Estado' 
            WHERE pedidoId = $pedidoId ") or die ("problemas en el select " . mysqli_error($ped));
 
            
           }
           public function contarRegistros($where){

            $resultado =  $this->ped->query("SELECT COUNT(*) AS cantidad FROM pedido
            JOIN direccionPedido
            ON pedidoDireccionId = direccionId
            $where")
            or die("problemas en el select");

            return $resultado;

        }
        public function mostrarPedidosCliente($mail){
        
        $datos = $this->ped->query("SELECT * FROM pedido
        JOIN cliente
        ON clienteId = pedidoClienteId
        WHERE clienteEmail ='$mail'") 
        or die ("problemas en el select");

        return $datos;

        }

        public function cerrarConexion(){

            $this->ped->close();
        }

 
    }

?>



