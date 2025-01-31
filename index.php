<?php

    /*
    El archivo más importante en un proyecto MVC es el index.php. Todas las peticiones URL que realice el usuario pasarán por este fichero. 
    Toda acción que se ejecute en nuestra aplicación tendrá que llamar al index y este tendrá que cargar el controlador asociado a dicha acción, 
    el modelo y la vista si procede.

    Responsabilidad principal: Es el punto de entrada de la aplicación.
    Detalles:
    - Se encarga de inicializar el entorno de la aplicación, como configurar constantes, cargar librerías e incluir el archivo de 
    autoloading si se utiliza (por ejemplo, con Composer).
    - Maneja la lógica de enrutar las solicitudes al controlador correspondiente.
    - Es minimalista y delega todas las responsabilidades importantes a las capas lógicas del patrón MVC.
    */
   
    // Cargamos los controladores que necesitamos.
    require_once "./controllers/CitaController.php";
    require_once "./controllers/TatuadorController.php";

    // QUIERO OBTENER LA URL DE LA PETICIÓN
    $requestUri = $_SERVER["REQUEST_URI"] ?? "";

    // QUEREMOS LLAMAR A UN CONTROLLER U OTRO DEPENDIENDO DE LA $REQUESTURI
    switch ($requestUri) {
        case "/tattooshop_php/index":
            case "/tattooshop_php/login":
            case "/tattooshop_php/":
    
                $usuarioController = new UsuarioController();
                session_start(); // Para poder usar $_SESSION
    
                // MOSTRAMOS LA PAGINA DE LOGIN
                $requestMethod = $_SERVER["REQUEST_METHOD"]; // va a ser GET o POST
    
                if ($requestMethod == "GET") {
                    $usuarioController->showLogin();
                } elseif ($requestMethod == "POST") {
                    $datos = $_POST ?? [];
                    $usuarioController->doLogin($datos);
                }
    
                break;

        case "/tattooshop_php/citas/alta":
            session_start();
            if(isset($_SESSION) || !isset($_SESSION["usuario"])){
                // MOSTRAMOS LA PAGINA DE LOGIN
                $requestMethod = $_SERVER["REQUEST_METHOD"]; // va a ser GET o POST
    
                if ($requestMethod == "GET") {
                    $usuarioController->showLogin();
                } elseif ($requestMethod == "POST") {
                    $datos = $_POST ?? [];
                    $usuarioController->doLogin($datos);
                }
            }else{
                $citaController = new CitaController();
                $requestMethod = $_SERVER["REQUEST_METHOD"];  
                
                if($requestMethod == "GET") {
                    $citaController->showAltaCita();
                } elseif($requestMethod == "POST") {
                    $datos = $_POST ?? [];
                    $citaController->insertCita($datos);
                }
            }                      
            break;
        case "/tattooshop_php/tatuadores/alta":
            session_start();
            if(isset($_SESSION) || !isset($_SESSION["usuario"])){
                // MOSTRAMOS LA PAGINA DE LOGIN
                $requestMethod = $_SERVER["REQUEST_METHOD"]; // va a ser GET o POST
    
                if ($requestMethod == "GET") {
                    $usuarioController->showLogin();
                } elseif ($requestMethod == "POST") {
                    $datos = $_POST ?? [];
                    $usuarioController->doLogin($datos);
                }
            }else{
                $tatuadorController=new TatuadorController();
                $requestMethod = $_SERVER["REQUEST_METHOD"];

                if($requestMethod == "GET") {
                    $tatuadorController->showAltaTatuador();
                } elseif($requestMethod == "POST") {
                    $datos = $_POST ?? [];
                    $tatuadorController->insertTatuador($datos);
                }
            }

            break;
        case "/tattooshop_php/citas/confirmacion":
            $citaController->mostrarConfirmacion();
            break;  
             

        // caso por defecto -> llamamos a 404
        default:
            echo "<h1>PAGINA NO ENCONTRADA</h1>";
            break;
    }


?>