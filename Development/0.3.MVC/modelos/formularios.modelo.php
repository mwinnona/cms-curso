<?php 
    require_once "conexion.php";
    class ModeloFormularios{
        //Registro

        static public function mdlRegistro($tabla, $datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(token ,name, email, password) 
                                                    values(:token, :name, :email, :password)");
            $stmt->bindParam(":token", $datos["token"],PDO:: PARAM_STR);
            $stmt->bindParam(":name", $datos["name"],PDO:: PARAM_STR);
            $stmt->bindParam(":email", $datos["email"],PDO:: PARAM_STR);
            $stmt->bindParam(":password", $datos["password"],PDO:: PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt -> close();
            $stmt = null;
        }

       static public function mdlSeleccionarRegistros($tabla, $item, $valor){

        if($item == null && $valor == null){
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $tabla order by id desc");
           $stmt->execute();
           return $stmt -> fetchAll();
        }else{
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(date, '%d/%m/%Y') AS date FROM $tabla where $item = :$item order by id desc");
            $stmt->bindParam(":".$item, $valor, PDO:: PARAM_STR);
            $stmt->execute();
           return $stmt -> fetch();
        }
           
           $stmt -> close();
           $stmt = null;
       }

       

       static public function mdlActualizarRegistro($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET name=:name, email=:email,token =:nuevoToken, password=:password WHERE token  = :token");
        $stmt->bindParam(":nuevoToken", $datos["nuevoToken"], PDO::PARAM_STR);
		$stmt->bindParam(":name", $datos["name"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":token", $datos["token"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
            return "error";
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt = null;	
    }

    static public function mdlActualizarIntentosFallidos($tabla, $valor, $token){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos_fallidos=:intentos_fallidos WHERE token  = :token");
        $stmt->bindParam(":intentos_fallidos", $valor, PDO::PARAM_INT);
		$stmt->bindParam(":token", $token, PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
            return "error";
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt = null;	
    }
    
    public function mdlEliminarRegistros($tabla,  $valor){
        $stmt = Conexion::conectar()->prepare("DELETE from  $tabla  WHERE token = :token");
		$stmt->bindParam(":token", $valor, PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			print_r(Conexion::conectar()->errorInfo());
		}
		$stmt->close();
		$stmt = null;	

    }
    }







?>