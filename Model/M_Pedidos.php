<?php 


//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Pedido {

            private $ped;

        public function __construct()
        {

            $this->ped = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarPedido($idFactura,$todaydate,$clienteId,$id,$total,$direccionId){


            $this->ped->query("INSERT INTO pedido(pedidoId,pedidoFechaInicio,pedidoClienteId,pedidoFacturaId,pedidoCostoTotal,pedidoDireccionId)
            VALUES ('$id','$todaydate','$clienteId','$idFactura','$total',$direccionId)
            ") or die ("problemas en el select " . mysqli_error($ped));

            
        }
        public function verPedido(){

            $query = $this->ped->query("SELECT * FROM pedido
            JOIN direccionpedido
            ON direccionId = pedidoDireccionId");
            
           
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



