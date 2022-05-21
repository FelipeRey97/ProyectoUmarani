<?php 

//Segunda clase creada, permite lo metodos para insert, select, update set y delete de productos con conexion a la BD


    class PQRS {

            private $pqrs;

        public function __construct()
        {

            $this->pqrs = new mysqli('localhost','root','','proyecto');
            
        }
        public function insertarPqrs(){


            $this->pqrs->query("INSERT INTO articulo (pqrsNombre,pqrsMail,pqrsTelefono,pqrsDescripcion,pqrsOrigenId,pqrsEstado,pqrsFecha,pqrsClienteId,pqrsImagen)
             values(  )")
             or die ("problemas en el insert" .mysqli_error($pqrs));

            
        }

        public function verPqrs(){

            $query = $this->pqrs->query("SELECT * FROM articulo
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
       
          public function actualizarProducto($artId,$ruta,$aNombre,$aPrecio,$aCantidad,$aestado,$aCategoria){


           $this->prod->query("UPDATE articulo SET  artNombre = '$aNombre' ,artPrecio = $aPrecio,
           artVista = '$ruta',artCantidad = '$aCantidad',artEstado = '$aestado',artCategoriaId = '$aCategoria'
           WHERE artId = '$artId' ") or die ("problemas en el select " . mysqli_error($pqrs));

           
          }
 
       
        public function borrarProducto($artId){


         $this->prod->query("DELETE FROM articulo WHERE artId = '$artId'") 
         or die ("problemas en el select " . mysqli_error($pqrs));

         header("Location: http://localhost/UmaraniWeb/View/productos.php");
        }

        public function cerrarConexion(){

            $this->prod->close();
        }


    }


?>