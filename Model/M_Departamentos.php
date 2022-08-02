<?php

    class DPTO {


        private $dpto;

        public function __construct(){


            require('../Model/ConexionBD.php');

            $this->dpto = $conexionBD;

        }
        public function mostrarDpto(){

           $query = $this->dpto->query("SELECT * FROM dpto");


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