<?php  


    class Carrito {


        private $car;

        public function __construct(){


            require_once('../Model/ConexionBD.php');
            $this->car = $conexionBD;


        }
        public function AñadirCarrito($sesionId,$artId,$Cant){


            $datos = $this->car->query("SELECT * FROM carrito 
            JOIN articulo 
            ON articuloId = artId
            WHERE articuloId = $artId AND sesionId = '$sesionId'");

            if(isset($datos)){

             while($dat = mysqli_fetch_array($datos)){

             $idArt = $dat['articuloId'];
             $idSesion = $dat ['sesionId'];
             $cantidad = $dat['artCarroCant'];
             $carId = $dat['carId'];
            
                 }
  
            }

            if(isset($idArt) && $idArt == $artId && $idSesion == $sesionId){

                $Cant = $cantidad + 1;
            
                $this->car->query("UPDATE carrito SET artCarroCant = $Cant   
                WHERE articuloId = $idArt AND sesionId = '$sesionId' AND carId = $carId ");
                
            }else if($idArt == ""){
            
                $this->car->query("INSERT INTO carrito (sesionId,articuloId,artCarroCant) 
                VALUES ('$sesionId',$artId,$Cant)") or die ("problemas en el insert" . mysqli_error($conexion1));
            
            }

        }

        public function borrarCarrito($artId,$sesionId){

            $this->car->query("DELETE FROM carrito 
            WHERE articuloId = $artId AND sesionId = '$sesionId' ");

        }


    }



?>