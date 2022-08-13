<?php 



    class PQRS { 

            private $pqrs;
            public $artporpag;
            private $sentencia;
            private $mail;
            private $id;

        public function __construct()
        {

            require('../Model/ConexionBD.php');
            $this->pqrs = $conexionBD;
            
        }  

        public function inicializar($artxpag){

            $this->artporpag = $artxpag;


        }
        public function filtrar($where){

            $this->sentencia = $where;

        }
        public function insertarPqrs1($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$ruta,$pedidoId){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsImagen,pqrsPedidoId)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha','$ruta',$pedidoId)")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function insertarPqrs2($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$pedidoId){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsPedidoId)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha',$pedidoId)")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function insertarPqrs3($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha')")
             or die ($this->pqrs->error);

            
        }
        public function obtenerIdPqrs(){

        $resultado = $this->pqrs->query("SELECT * FROM pqrs 
        JOIN pqrstipo
        ON pqrsOrigenId = pqrsTipoId
        WHERE pqrsId IN (SELECT max(pqrsId) FROM pqrs)");

        $retorno = [];
        $i = 0;
        while($fila = $resultado->fetch_assoc()) {

            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;

        }

        public function verPqrs(){
 
            $sentencia = $this->sentencia;

            $cantidad = $this->pqrs->query("SELECT COUNT(*) as cantidad FROM pqrs")
            or die($this->pqrs->error);

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;


            $query = $this->pqrs->query("SELECT * FROM pqrs 
            JOIN pqrstipo
            ON pqrsOrigenId = pqrsTipoId
            $sentencia
            ORDER BY pqrsId DESC
            LIMIT $inicio,$registrosxpagina") or die($this->pqrs->error);
            
            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
        public function verificarEmail($mail){

            $this->mail = $mail;
            $mail = $this->mail;
            $query = $this->pqrs->query("SELECT * FROM cliente WHERE clienteEmail = '$mail'");

            if($fila = $query->fetch_assoc()){

                return true;
            }else{

                return false;
            }

        }
        public function actualizarEstado($id){

            $this->pqrs->query("UPDATE pqrs SET pqrsEstado = 'Atendida' 
            WHERE pqrsId = $id");

        }
        public function verDetallePQRS($id){

            $this->id = $id;
            $id = $this->id;
            $detallepqrs =  $this->pqrs->query("SELECT * FROM pqrs
            JOIN pqrstipo
            ON pqrsTipoId = pqrsOrigenId
            WHERE pqrsId = $id")
            or die("problemas en el select");

            return $detallepqrs;

        }

        public function cerrarConexion(){

            $this->pqrs->close();
        }

        public function contarRegistros($where){


          $datos = $this->pqrs->query("SELECT COUNT(*) AS cantidad FROM pqrs
            JOIN pqrstipo
            ON pqrsTipoId = pqrsOrigenId
            $where")
            or die ("problemas en el select ");

            return $datos;

        }


    }


?>