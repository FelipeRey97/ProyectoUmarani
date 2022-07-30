<?php 



    class PQRS { 

            private $pqrs;
            public $artporpag;
            private $sentencia;
            private $mail;
        public function __construct()
        {

            $this->pqrs = new mysqli('localhost','root','','proyecto');
            
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
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function verPqrs(){
 
            $sentencia = $this->sentencia;

            $cantidad = $this->pqrs->query("SELECT COUNT(*) as cantidad FROM pqrs");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;


            $query = $this->pqrs->query("SELECT * FROM pqrs 
            JOIN pqrsTipo
            ON pqrsOrigenId = pqrsTipoId
            $sentencia
            ORDER BY pqrsId DESC
            LIMIT $inicio,$registrosxpagina");
            
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

        public function cerrarConexion(){

            $this->pqrs->close();
        }


    }

    $conexionPqrs = mysqli_connect("localhost","root","","proyecto");


?>