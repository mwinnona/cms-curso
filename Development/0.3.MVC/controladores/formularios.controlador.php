<?php
class ControladorFormularios{
    static public function ctrRegistro(){
        if(isset($_POST["registroNombre"])){
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			   preg_match('/^[0-9a-zA-Z]+$/', $_POST["registroPassword"])){
                $token = md5($_POST["registroNombre"]."+".$_POST["registroEmail"]);
                $tabla ="registros";
                $encriptarPassword = crypt($_POST["registroPassword"],'$2a$07$usesomesillystringforsalt$');
                $datos = array("token"=> $token,"name" => $_POST["registroNombre"],"email" => $_POST["registroEmail"],
                        "password" => $encriptarPassword);
                $respuesta = ModeloFormularios::mdlRegistro($tabla,$datos);
                return $respuesta;
            }else{
                $respuesta = "error";
                return $respuesta;
            }
        }
    }

    static public function ctrSeleccionarRegistros($item, $valor){
        $tabla = "registros";
        $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
        return $respuesta;
    }

    public function ctrIngreso(){
        if(isset($_POST["ingresoEmail"])){
            $tabla = "registros";
            $item = "email";
            $valor =$_POST["ingresoEmail"];
            $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);
            $encriptarPassword = crypt($_POST["ingresoPassword"],'$2a$07$usesomesillystringforsalt$');

            if($respuesta["email"]==$_POST["ingresoEmail"] && $respuesta["password"]==$encriptarPassword){
                ModeloFormularios::mdlActualizarIntentosFallidos($tabla, 0, $respuesta["token"]);
                $_SESSION["validarIngreso"]= "ok";
                echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
                }
                window.location = "index.php?pagina=inicio";
			    </script>';
                
            }else{
                
                if( $intentos_fallidos<3){
					$tabla = "registros";

                    $intentos_fallidos = $respuesta["intentos_fallidos"]+1;
                    echo '<pre>'; print_r($intentos_fallidos); echo '</pre>';
				     ModeloFormularios::mdlActualizarIntentosFallidos($tabla, $intentos_fallidos, $respuesta["token"]);
                }else{
                    echo '<div class="alert alert-warning "> RECAPTCHA Debes validar que no eres un robot. </div>';
                }
                echo '<script>,
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
			    </script>';
			echo '<div class="alert alert-danger">Error al ingresar. Las credenciales no coinciden</div>';
            }
    
        }
    }
    

    

    static public function ctrActualizarRegistro(){

		if(isset($_POST["actualizarNombre"])){
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["actualizarNombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["actualizarEmail"])){

                $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["tokenUsuario"]);
                $compararToken = md5($usuario["name"]."+".$usuario["email"]);
                $nuevoToken = md5($_POST["actualizarNombre"]."+".$_POST["actualizarEmail"]);
                if($compararToken==$_POST["tokenUsuario"]){
                    if($_POST["actualizarPassword"] != ""){			
                        $password = crypt($_POST["actualizar Password"],'$2a$07$usesomesillystringforsalt$');

                    }else{
                        $password = $_POST["passwordActual"];
                    }
                    $tabla = "registros";
                    $datos = array("nuevoToken"=>$nuevoToken,
                                    "token" => $_POST["tokenUsuario"],
                                    "name" => $_POST["actualizarNombre"],
                                    "email" => $_POST["actualizarEmail"],
                                    "password" => $password);
                    $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);
                    return $respuesta;
                }
                else{
                $respuesta="error";
                return $respuesta;
                }
            }
        }
    }
    
    public function ctrEliminarRegistro(){
		if(isset($_POST["eliminarRegistro"])){
            $usuario = ModeloFormularios::mdlSeleccionarRegistros("registros", "token", $_POST["eliminarRegistro"]);
            $compararToken = md5($usuario["name"]."+".$usuario["email"]);
            if($compararToken==$_POST["eliminarRegistro"]){
                $tabla = "registros";
                $valor = $_POST["eliminarRegistro"];
                $respuesta = ModeloFormularios::mdlEliminarRegistros($tabla,  $valor);
                if($respuesta == "ok"){
                    echo '<script>
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    </script>';
                    echo '<div class="alert alert-success">El usuario ha sido eliminado</div>
                    <script>
                        setTimeout(function(){
                            window.location = "index.php?pagina=inicio";
                        },3000);
                    </script>
        
                    ';
        
                }
            }
			
        }
        
    }   
}















?>