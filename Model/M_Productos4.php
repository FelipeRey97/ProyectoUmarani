<?php 

//Segunda clase creada, permite lo metodos para insert, select, update set y delete de productos con conexion a la BD


    class Producto {

            private $prod; 

        public function __construct()
        {

            $this->prod = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarProducto($ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria){


            $this->prod->query("INSERT INTO articulo (artNombre,artPrecio,artVista,artCantidad,artEstado,artCategoriaId)
             values('$aNombre','$aPrecio','$ruta',$aCantidad,'$aestado','$aCategoria')")
             or die ("problemas en el insert" .mysqli_error($prod));

            
        }

        public function verProducto(){

            $query = $this->prod->query("SELECT * FROM articulo
            JOIN categoria
            ON artCategoriaId = categoriaId
            ORDER BY artId DESC");
            

            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }

        public function verInventario(){


            $cantidad = $this->prod->query("SELECT COUNT(*) as cantidad FROM articulo");

            $cant = mysqli_fetch_array($cantidad);
            $registrosxpagina = 10;

            $inicio = ($_GET['pagina']-1)*$registrosxpagina;

            $query = $this->prod->query("SELECT * FROM articulo
            JOIN categoria
            ON artCategoriaId = categoriaId
            ORDER BY artId DESC
            LIMIT $inicio,$registrosxpagina");
            

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

           
          }
 
       
        public function borrarProducto($artId){


         $this->prod->query("DELETE FROM articulo WHERE artId = '$artId'") 
         or die ("problemas en el select " . mysqli_error($prod));

         header("Location: http://localhost/UmaraniWeb/View/productos.php");
        }

        public function cerrarConexion(){

            $this->prod->close();
        }


    }



    $conexion1 = mysqli_connect('localhost','root','','proyecto') or 
    die ("problemas en la conexion" . mysqli_error($conexion1));


?>