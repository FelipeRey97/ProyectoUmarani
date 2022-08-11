<?php


    class Resolucion {

        private $res;
        private $pqrsId;
        private $mensaje;
        


        public function __construct(){


            $this->res = new mysqli("localhost","root","","proyecto");


        }
        public function insertarResolucion($id,$usuarioId,$usuarioNombre,$pqrsId,$mensaje,$fecha){

            $this->res->query("INSERT INTO resolucion (resolucionId,resolucionUsuarioId,Res_Unombre,resolucionpqrsId,resolucionMensaje,resolucionFecha)
            VALUES($id,$usuarioId,'$usuarioNombre',$pqrsId,'$mensaje','$fecha')");


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
        public function DetalleResolucion($id){

            $resoluciondatos = $this->res->query("SELECT * FROM resolucion
            JOIN pqrs
            ON pqrsId = resolucionpqrsId
            JOIN pqrstipo
            ON pqrsTipoId = pqrsOrigenId
            WHERE resolucionId = $id")
            or die("problemas en el select");

            return $resoluciondatos;

        }
        public function obtenerFecha($id){

            $fecha = $this->res->query("SELECT MONTH(resolucionFecha), YEAR(resolucionFecha), DAY(resolucionFecha) FROM resolucion
            WHERE resolucionId = $id") 
            or die("problemas en el select");

            return $fecha;

        }
 
    }



?>