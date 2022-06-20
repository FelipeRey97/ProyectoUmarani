<?php 


//primera clase creada, permite lo metodos para insert, select, update set y delete de usuarios con conexion a la BD

    class Factura {

            private $fact;

        public function __construct()
        {

            $this->fact = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarFactura($clienteId,$todaydate,$total,$clienteDoc,$tipoPago,$dirC,$impuestoId){


            $this->fact->query("INSERT INTO factura (facturaFecha,facturaCostoTotal,facturaClienteDoc,facturaClienteId,factura_tipoPagoId,facturaClienteDireccion,facturaImpuestoId)
            VALUES ('$todaydate','$total','$clienteDoc','$clienteId','$tipoPago','$dirC','$impuestoId')
            ") or die ("problemas en el select " . mysqli_error($fact));

            
        }
        public function verFacturas(){

            $query = $this->fact->query("SELECT * FROM factura
            JOIN tipopago
            ON tipoPagoId = factura_tipoPagoId");
            
           

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


    }

    $conexionFactura = mysqli_connect("localhost","root","","proyecto") 
    or die("problemas con la conexion");

    


?>
