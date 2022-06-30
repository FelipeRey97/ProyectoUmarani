<?php 

//Segunda clase creada, permite lo metodos para insert, select, update set y delete de productos con conexion a la BD


    class PQRS {

            private $pqrs;

        public function __construct()
        {

            $this->pqrs = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarPqrs1($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$ruta,$clienteId,$pedidoId){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsClienteId,pqrsImagen,pqrsPedidoId)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha','$clienteId','$ruta',$pedidoId)")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function insertarPqrs2($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha,$clienteId,$pedidoId){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha,pqrsClienteId,pqrsPedidoId)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha','$clienteId',$pedidoId)")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function insertarPqrs3($pNombre,$pMail,$ptelefono,$pComentario,$tipoId,$pFecha){


            $this->pqrs->query("INSERT INTO pqrs (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsFecha)
             values('$pNombre','$pMail','$ptelefono','$pComentario','$tipoId','$pFecha')")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function verPqrs(){

            $cantidad = $this->pqrs->query("SELECT COUNT(*) as cantidad FROM pqrs");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = 5;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $limit = $cant['cantidad']/2;

            $query = $this->pqrs->query("SELECT * FROM pqrs 
            JOIN pqrsTipo
            ON pqrsOrigenId = pqrsTipoId
            ORDER BY pqrsId DESC
            LIMIT $inicio,$limit");
            
            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
       
          public function actualizarProducto($artId,$ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria){


           $this->prod->query("UPDATE articulo SET  artNombre = '$aNombre' ,artPrecio = $aPrecio,
           artVista = '$ruta',artCantidad = '$aCantidad',artEstado = '$aestado',artCategoriaId = '$aCategoria'
           WHERE artId = '$artId' ") or die ("problemas en el select " . mysqli_error($pqrs));

           
          }
 

        public function cerrarConexion(){

            $this->prod->close();
        }


    }

    $conexionPqrs = mysqli_connect("localhost","root","","proyecto");


?>