<?php
    require_once "../controladores/formularios.controlador.php";
    require_once "../modelos/formularios.modelo.php";
    

    class AjaxFormularios{
        public $validarEmail;

        public function ajaxValidarEmail(){
    
            $item = "email";
            $valor = $this->validarEmail;
            //la variable respuesta es un bool, cuando capta informacion , esta se encuentra en true
            $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
            //toma el array para convertirlo a dato json y poder imprimirlo como javascript
            echo json_encode($respuesta);
        }

        public $validarToken;

	    public function ajaxValidarToken(){
            $item = "token";
            $valor = $this->validarToken;
            $respuesta = ControladorFormularios::ctrSeleccionarRegistros($item, $valor);
            echo json_encode($respuesta);
	    }
    }

    if(isset($_POST["validarEmail"])){
        //iniciliza la clase 
        $valEmail = new AjaxFormularios();
        //asigna valor , ya no se pone el signo de pesos 
        $valEmail -> validarEmail = $_POST["validarEmail"];
        //ejecuta el método
        $valEmail -> ajaxValidarEmail();

    }
    if(isset($_POST["validarToken"])){

        $valToken = new AjaxFormularios();
        $valToken -> validarToken = $_POST["validarToken"];
        $valToken -> ajaxValidarToken();
    
    }
?>