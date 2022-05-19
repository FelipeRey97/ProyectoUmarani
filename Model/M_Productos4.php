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
            ON artCategoriaId = categoriaId");
            

            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
       
          public function actualizarProducto($ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria){


           $this->prod->query("UPDATE articulo SET  artNombre = '$aNombre' ,artPrecio = $aPrecio,
           artVista = '$ruta',artCantidad = '$aCantidad',artEstado = '$aestado',artCategoriaId = '$aCategoria'
           WHERE artId = '$artId' ") or die ("problemas en el select " . mysqli_error($prod));

           
          }
 
        
       
        public function borrarProducto(){


         $this->prod->query("DELETE FROM  usuarioTienda WHERE usuarioId = '$_REQUEST[tabla]'") 
         or die ("problemas en el select " . mysqli_error($prod));

         header("Location: http://localhost/UmaraniWeb/View/productos.php");
        }

        public function cerrarConexion(){

            $this->prod->close();
        }


    }


?>