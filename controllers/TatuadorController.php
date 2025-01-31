<?php

require_once "./models/TatuadorModel.php";

class TatuadorController{
    private $tatuadorModel;

    public function __construct(){
        $this->tatuadorModel = new TatuadorModel();
    }

    public function showAltaTatuador(){
        require_once "./views/tatuadorViews/TatuadorAltaView.php";
    }

    public function insertTatuador($datos=[]){
        //EXTRAER LOS DATOS DEL FORMULARIO Y ALMACENARLOS EN VARIABLES
        
        $input_id = $datos["input_id"] ?? "";
        $input_nombre = $datos["input_nombre"] ?? "";
        $input_email = $datos["input_email"] ?? "";
        $input_password = $datos["input_password"] ?? "";
        $input_foto = $datos["input_foto"] ?? "";
        $input_creado_en = $datos["input_creado_en"] ?? "";

        // COMPROBAMOS SI LOS DATOS DEL FORMULARIO SON CORRECTOS -> SI NO VIENEN VACIOS
        $errores = [];

         // Validación del nombre
        if (empty($input_nombre)) {
            $errores["error_nombre"] = "El campo nombre es obligatorio";
        }

        // Validación del email
        if (empty($input_email)) {
            $errores["error_email"] = "El campo email es obligatorio";
        } elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
            $errores["error_email"] = "El email no es válido";
        } else {
            // Comprobación de email único en la base de datos (suponiendo que hay una función checkEmailExists)
            if ($this->tatuadorModel->checkEmailExists($input_email)) {
                $errores["error_email"] = "El email ya está registrado";
            }           
        }

        // Validación de la contraseña
        if (empty($input_password)) {
            $errores["error_password"] = "El campo contraseña es obligatorio";
        }

        // Validación de la foto (puedes modificar esta validación según tu criterio)
        if (!empty($input_foto)) {
            $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
            $foto_extension = pathinfo($input_foto, PATHINFO_EXTENSION);
            if (!in_array(strtolower($foto_extension), $allowed_extensions)) {
                $errores["error_foto"] = "El formato de la foto no es válido. Debe ser JPG, JPEG, PNG o GIF";
            }
        }

    }
}

?>