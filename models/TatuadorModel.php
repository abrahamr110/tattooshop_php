<?php

    require_once "./database/DBHandler.php";
    class TatuadorModel {
        private $nombreTabla = "tatuadores"; // NOMBRE DE LA TABLA DE LA BASE DE DATOS
        private $conexion;              // ATRIBUTO QUE ALMACENARÁ LA CONEXIÓN A LA BASE DE DATOS
        private $dbHandler;             // ATRIBUTO QUE ALMACENA LA INSTANCIA DE DBHAndler

        public function __construct() {
            // CONECTARSE A LA BASE DE DATOS
            /*
            1º NECESITAMOS SABER LOS PARÁMETROS DE CONEXION A LA BASE DE DATOS
            - IP (localhost o la IP que sea)
            - usuario
            - contraseña
            - nombre de la base de datos
            - puerto
            Inicializamos un objeto DBHandler (el de la clase que hemos construído) que va a ser
            el encargado de conectar y desconectar la base de datos
            */
            $this->dbHandler = new DBHandler("localhost","root","1234","tattoos_bd","3306");
        }
        /**
         * MÉTODO PARA INSERTAR UN TATUADOR EN LA BASE DE DATOS
         * @param mixed $id
         * @param mixed $nombre
         * @param mixed $email
         * @param mixed $password
         * @param mixed $foto
         * @param mixed $creado_en
         * @return bool
         */
        public function insertarTatuador($id,$nombre,$email,$password,$foto,$creado_en){
            $this->conexion = $this->dbHandler->conectar();
            $sql = "INSERT INTO ".$this->nombreTabla." (id,nombre,email,password,foto,creado_en) VALUES (?,?,?,?,?,?,?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("issss",$id,$nombre,$email,$password,$foto,$creado_en);

            try {
                return $stmt->execute(); // EXECUTE DEVUELVE UN TRUE O FALSE -> SI HA SIDO EXITOSA LA OPERACION O NO
            } catch(Exception $e) {
                return $e;
            } finally {
                $this->dbHandler->desconectar(); // USAMOS FINALLY PARA ASEGURARNOS QUE HEMOS CERRADO LA CONEXIÓN A LA BASE DE DATOS
            }
        }

    }

?>