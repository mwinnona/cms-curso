<?php
require_once "conexion.php";

    class ModeloBlog{
        static public function mdlMostrarBlog($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }


        static public function mdlMostrarCategorias($tabla){
            $stmt = Conexion::conectar()->prepare("SELECT *FROM $tabla");
            $stmt -> execute();
            return $stmt -> fetchAll();
            $stmt -> close();
            $stmt = null;
        }
    }