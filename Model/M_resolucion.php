<?php


$conexion = mysqli_connect("localhost","root","","proyecto")
or die ("problemas con la conexion");

    class Resolucion {

        private $res;
        private $pqrsId;
        private $mensaje;


        public function __construct(){


            $this->res = new mysqli("localhost","root","","proyecto");


        }
        public function insertarResolucion($id,$usuarioId,$pqrsId,$mensaje,$fecha){

            $this->res->query("INSERT INTO resolucion (resolucionId,resolucionUsuarioId,resolucionpqrsId,resolucionMensaje,resolucionFecha)
            VALUES($id,$usuarioId,$pqrsId,'$mensaje','$fecha')");


        }
        public function validarResolucion($pqrsId){

            $this->pqrsId = $pqrsId;
            $pqrsId = $this->pqrsId;

            $query = $this->res->query("SELECT * FROM resolucion WHERE resolucionId = $pqrsId");

            if($fila = $query->fetch_assoc()){

                return true;

            }else{

                return false;
            }

        }
        public function actualizarResolucion($pqrsId,$mensaje,$fecha,$usuarioId){

            $this->res->query("UPDATE resolucion SET resolucionMensaje = '$mensaje', resolucionFecha = '$fecha', resolucionUsuarioId = $usuarioId
            WHERE resolucionId = $pqrsId");
        }



    }



?>