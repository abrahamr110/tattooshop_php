<?php

    require_once "./models/UsuarioModel.php";
    

    class UsuarioController {

        /*
        ATRIBUTOS DE CLASE.
        En este caso tenemos CitaModel -> Para poder acceder a la Base de Datos
        */
        private $usuarioModel;

        /*
        CONSTRUCTOR DE CLASE
        El constructor de clase lo utilizamos para inicializar el atributo
        $citaModel. (Recordemos que con Model realizaremos las operaciones CRUD con la Base de Datos)
        */
        public function __construct() {
            $this->usuarioModel = new UsuarioModel();
        }

        /**
         * Método para mostrar el view de AltaCita -> Contiene la página para dar de alta una cita
         */
        public function showLogin($errores = []) {
            
            require_once "./views/citasViews/LoginView.php";
        }

        public function doLogin($datos = []) {

            // EXTRAER LOS DATOS DEL FORMULARIO Y ALMACENARLOS EN VARIABLES
           
            $input_email = $datos["input_email"] ?? "";
            $input_password = $datos["input_password"] ?? "";

            // COMPROBAMOS SI LOS DATOS DEL FORMULARIO SON CORRECTOS -> SI NO VIENEN VACIOS
            $errores = [];
            if($input_email == "" || $input_password == "" ) {
                $errores["error_email"] = "El campo email es obligatorio";
                $errores["error_password"] = "El campo password es obligatorio";
            }
               

            // SI $errores NO ESTÁ EMPTY, SIGNIFICA QUE HA HABIDO ERRORES
            if(!empty($errores)) {
                $this->showLogin($errores);
            } else {

                // REGISTRAMOS LA CITA
                // PARA REGISTRAR LA CITA NECESITAMOS ACCEDER A LA BASE DE DATOS -> NECESITAMOS LLAMAR A UN METODO QUE ACCEDA A LA BASE DE DATOS
                // ¿A QUÉ CLASE LLAMAMOS? -> CitaModel.php
                // ¿A QUÉ MÉTODO DE LA CLASE LLAMAMOS? -> insertCita($datosDeLaCita)
                
                $operacionExitosa = $this->usuarioModel->login($input_email, $input_password);


                if($operacionExitosa) {
                    // LLAMAR A UNA PÁGINA QUE MUESTRE UN MENSAJE DE ÉXITO
                    session_start();
                    $_SESSION["usuario"] = $input_email;

                    $citaController = new CitaController();
                    $citaController->showAltaCita();
                    
                } else {
                    // LLAMAR A ALGÚN SITIO Y MOSTRAR UN MENSAJE DE ERROR
                    $errores["error_db"] = "Error, intentelo de nuevo más tarde";
                    $this->showLogin($errores);
                }

            }

        }
    }

?>