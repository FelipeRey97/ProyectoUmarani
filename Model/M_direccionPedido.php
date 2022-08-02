<?php


    class Direccion {


        private $dir;

        public function __construct(){

            require '../Model/ConexionBD.php';
            $this->dir = $conexionBD;

        }

        public function guardarDireccion($direccionId,$dpto,$ciudad,$direccion){


            $this->dir->query("INSERT INTO direccionpedido (direccionId,direccionDep,direccionCiudad,direccionDomicilio)
            VALUES ($direccionId,'$dpto','$ciudad','$direccion')");



        }









    }



?>