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

    public function insertTatuador($datos){
        $this->tatuadorModel->insertarTatuador($datos["id"],$datos["nombre"],$datos["email"],$datos["password"],$datos["foto"],$datos["creado_en"]);
    }
}

?>