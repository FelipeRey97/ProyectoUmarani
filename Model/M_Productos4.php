<?php 

//Segunda clase creada, permite lo metodos para insert, select, update set y delete de productos con conexion a la BD
 

    class Producto {

            private $prod;
            public  $artporpag;
            private $sentencia;
            private $seccion;
            private $ordenCatalogo;
            private $busqueda;

        public function __construct()
        { 

            require('../Model/ConexionBD.php');
            $this->prod = $conexionBD;
            
        }
        public function inicializar($artxpag){

            $this->artporpag = $artxpag;
          
        }
        public function seccionCatalogo($seccion){

            $this->seccion = $seccion;

        }public function ordenarCatalogo($orden){

            $this->ordenCatalogo = $orden;
        }
        public function filtrar($where){

            $this->sentencia = $where;

        }
        public function insertarProducto($ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria){


            $this->prod->query("INSERT INTO articulo (artNombre,artPrecio,artVista,artCantidad,artEstado,artCategoriaId)
             values('$aNombre','$aPrecio','$ruta',$aCantidad,'$aestado','$aCategoria')")
             or die ("problemas en el insert" .mysqli_error($prod));

             
        }

        public function verProducto(){
            $seccion = $this->seccion;
            $orden = $this->ordenCatalogo;
            $query = $this->prod->query("SELECT * FROM articulo
            JOIN categoria
            ON artCategoriaId = categoriaId
            $seccion
            $orden
            ");



            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            } 
            return $retorno;
        } 

        public function verInventario(){

            $sentencia = $this->sentencia;
            $cantidad = $this->prod->query("SELECT COUNT(*) as cantidad FROM articulo");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = $this->artporpag;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $query = $this->prod->query("SELECT * FROM articulo
            JOIN categoria
            ON artCategoriaId = categoriaId
            $sentencia
            ORDER BY artId DESC
            LIMIT $inicio,$registrosxpagina
           ");
           
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
           WHERE artId = '$artId' ") or die ("problemas en el select " . mysqli_error($prod));

           
          }public function DescontarInventario($cantActual,$cantidad,$articuloId){

            $this->prod->query("UPDATE articulo SET artCantidad = $cantActual - $cantidad 
            WHERE artId = $articuloId");

          }
 
       
        public function borrarProducto($artId){


         $this->prod->query("DELETE FROM articulo WHERE artId = '$artId'") 
         or die ("problemas en el select " . mysqli_error($prod));

         header("Location: ../View/productos.php");
        }
        public function DetalleArticulo($arId){

            $detalleProducto = $this->prod->query("SELECT * FROM articulo
            JOIN categoria
            ON artCategoriaId = categoriaId WHERE artId = '$arId' ") 
            or die ("problemas en el select");


            return $detalleProducto;
        }
        public function ContarRegistros($where){

            $resultado = $this->prod->query("SELECT COUNT(*) AS cantidad FROM articulo 
            JOIN categoria
            ON categoriaId = artCategoriaId
            $where")
            or die("problemas en el select");

            return $resultado;
        }

        public function cerrarConexion(){

            $this->prod->close();
        }


    }


?>