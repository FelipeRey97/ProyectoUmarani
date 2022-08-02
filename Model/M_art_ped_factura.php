<?php

    class articuloPorFactura{

        private $artxfact;

        public function __construct(){

            require('../Model/ConexionBD.php');

            $this->artxfact = $conexionBD;


        }

        public function guardarDatos($articuloId,$idFactura,$cantidad,$precio){


           $this->artxfact->query("INSERT INTO productoporfactura (prodFact_ArtId,prodFact_FactId,prodFactCantidad,prodFactPrecio)
           VALUES ($articuloId,$idFactura,$cantidad,$precio)") or die ("problemas en el insert");


        }

    }


    class articuloPorPedido {


        private $artxped;

        public function __construct(){

            require('../Model/ConexionBD.php');

            $this->artxped = $conexionBD;


        }

        public function guardarDatos($articuloId,$id,$cantidad,$precio){


           $this->artxped->query("INSERT INTO productoporpedido (prodPed_artId,prodPed_pedidoId,prodPedCant,prodPedValorArt)
           VALUES ($articuloId,$id,$cantidad,$precio)") or die ("problemas en el insert");


        }


    }



?>