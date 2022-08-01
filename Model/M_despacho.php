<?php


//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Despacho {

            private $desp;
            private $despachoId;

        public function __construct()
        {
            require_once('../Model/ConexionBD.php');
            $this->desp = $conexionBD;
            
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
       public function eliminarDespacho($old_DespachoId){

            $this->desp->query("DELETE FROM despacho WHERE despachoId = '$old_DespachoId'");

       }
           


        public function cerrarConexion(){

            $this->desp->close();
        }


    }

    $conexionDespacho = mysqli_connect("localhost","root","","proyecto") 
    or die ("problemas con la conexion");

?>


