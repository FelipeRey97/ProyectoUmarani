<?php 

//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Factura { 

            private $fact; 
            private $sentencia;
            public $artporpag;
            private $orden;
            
        public function __construct()
        {
            require('../Model/ConexionBD.php');
            $this->fact = $conexionBD;
            
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

        public function insertarFactura($clienteId,$todaydate,$total,$clienteDoc,$tipoPago,$dirC,$impuestoId,$telefono){


            $this->fact->query("INSERT INTO factura (facturaFecha,facturaCostoTotal,facturaClienteDoc,facturaClienteId,factura_tipoPagoId,facturaClienteDireccion,facturaImpuestoId,facturaClTelefono)
            VALUES ('$todaydate','$total','$clienteDoc','$clienteId','$tipoPago','$dirC','$impuestoId','$telefono')
            ") or die ($this->fact->error);

            
        }
        public function ObtenerIdFactura(){

          $id_Factura = $this->fact->query("SELECT facturaId FROM factura
            WHERE facturaId IN (SELECT max(facturaId) FROM factura)") 
            or die ($this->fact->error);

            return $id_Factura;
        }
        public function verFacturas(){

            $sentencia = $this->sentencia;
            $orderby = $this->orden;
            $cantidad = $this->fact->query("SELECT COUNT(*) as cantidad FROM factura");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $query = $this->fact->query("SELECT * FROM factura
            JOIN tipopago
            ON tipoPagoId = factura_tipoPagoId
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
       


        public function cerrarConexion(){

            $this->fact->close();
        }
        public function cabeceraFactura($id){

            $resultado = $this->fact->query("SELECT * FROM factura 
            JOIN cliente
            ON facturaClienteId = clienteId
            WHERE facturaId = $id");

            return $resultado;

        }
        public function preciosFactura($id){

            $resultado = $this->fact->query("SELECT * FROM factura 
            JOIN impuesto
            ON impuestoId = facturaImpuestoId
            WHERE facturaId = $id");

            return $resultado;

        }

        public function contarRegistros($where){

            $resultado =  $this->fact->query("SELECT COUNT(*) AS cantidad FROM factura
            JOIN tipopago
            ON tipoPagoId = factura_tipoPagoId
            $where")
            or die($this->fact->error);

            return $resultado;

        }


    }

?>