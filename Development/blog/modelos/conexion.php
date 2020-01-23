<?php
    
    class Conexion{
        static public function conectar(){
            $link = new PDO("mysql:host=localhost;dbname=blogbd",
                    "root","Y@xicu3029" );
            $link->exec("set names utf8");

            return $link;

        }
	}
	
?>