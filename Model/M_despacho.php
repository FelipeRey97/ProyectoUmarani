<?php


//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Despacho {

            private $desp;

        public function __construct()
        {

            $this->desp = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarOrden($despachoId,$empresaId,$pedidoId,$usuarioId,$date){


            $this->desp->query("INSERT INTO despacho (despachoId,despachoempresaId,despachoPedidoId,despachoUsuarioId,despachoFecha)
            VALUES ('$despachoId','$empresaId','$pedidoId','$usuarioId','$date')") 
            or die ("problemas en el select " . mysqli_error($desp));

            
        }
        public function verPedido(){

            $query = $this->desp->query("SELECT * FROM despacho
            JOIN pedido
            ON pedidoId = despachoPedidoId");
           
            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
       
           public function actualizarPedido($pedidoId,$Estado){


           $this->desp->query("UPDATE pedido SET  pedidoEstado = '$Estado' 
           WHERE pedidoId = $pedidoId ") or die ("problemas en el select " . mysqli_error($desp));

           
          }


        public function cerrarConexion(){

            $this->desp->close();
        }


    }

    $conexionDespacho = mysqli_connect("localhost","root","","proyecto") 
    or die ("problemas con la conexion");

?>


