<?php

    class Buscador {

        private $busc;
        private $busqueda;

        public function __construct(){


            require('../Model/ConexionBD.php');
            $this->busc = $conexionBD;

        }

        public function buscarProductos($busqueda){

            $this->busqueda= $busqueda;
            $busqueda = $this->busqueda;

            $query =  $this->busc->query("SELECT * FROM articulo 
            JOIN categoria
            ON artCategoriaId = categoriaId
            WHERE artNombre LIKE '%$busqueda%' OR categoriaNombre LIKE '%$busqueda%'") 
            or die ("problemas en el select ");

            $retorno = [];
            $i = 0;
            while($fila = $query->fetch_assoc()) {

                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;

        }




    }





?>