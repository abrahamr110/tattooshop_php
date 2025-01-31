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


        // MÉTODO PARA OBTENER TODOS LOS TATUADORES EN LA BASE DE DATOS
        public function getAllTatuadores() {
            $this->conexion = $this->dbHandler->conectar();
            $sql = "SELECT nombre FROM " . $this->nombreTabla; // Solo seleccionamos el nombre
            $resultado = $this->conexion->query($sql); // Ejecutamos la consulta directamente
        
            $tatuadores = [];
            while ($fila = $resultado->fetch_assoc()) {
                $tatuadores[] = $fila['nombre']; // Almacenamos solo el nombre de cada tatuador
            }
        
            return $tatuadores; // Devolvemos el array de nombres
        }
        


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

        public function checkEmailExists($email) {
            $this->conexion = $this->dbHandler->conectar();

            // Preparar la consulta para verificar si el email existe
            $sql = "SELECT COUNT(*) as count FROM $this->nombreTabla WHERE email = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();

            // Obtener el resultado
            $resultado = $stmt->get_result();
            $fila = $resultado->fetch_assoc();

            // Cerrar la conexión y devolver si existe o no
            $this->dbHandler->desconectar();

            return $fila['count'] > 0; // Devuelve true si el email existe, false si no
        }

    }

?>