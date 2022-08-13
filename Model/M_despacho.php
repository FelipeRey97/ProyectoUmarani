<?php


//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Despacho {

            private $desp;
            private $despachoId;

        public function __construct()
        {
            require('../Model/ConexionBD.php');
            $this->desp = $conexionBD;
            
        }
        public function insertarOrden($despachoId,$empresaId,$pedidoId,$usuarioId,$nombreUsuario,$date){


            $this->desp->query("INSERT INTO despacho (despachoId,despachoempresaId,despachoPedidoId,despachoUsuarioId,desp_Unombre,despachoFecha)
            VALUES ('$despachoId','$empresaId','$pedidoId','$usuarioId','$nombreUsuario','$date')") 
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
       public function verEmpresaEnvio(){


            $datos = $this->desp->query("SELECT * FROM empresaenvio");

            return $datos;

       }
       public function mostrarDatosDespacho($id){


        $datos = $this->desp->query("SELECT * FROM pedido
        JOIN despacho
        ON  pedidoId = despachoPedidoId 
        JOIN empresaenvio
        ON despachoEmpresaId = empresaId
        WHERE despachoPedidoId = $id")  or die("Problemas en el select");

        return $datos;

       }

        public function cerrarConexion(){

            $this->desp->close();
        }


    }

?>