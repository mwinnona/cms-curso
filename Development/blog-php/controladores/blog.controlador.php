<?php
    class ControladorBlog{

        static public function ctrMostrarBlog() {
            $tabla = "blog";
            $respuesta = ModeloBlog::mdlMostrarBlog($tabla);
            return $respuesta;

        }

        static public function ctrMostrarCategorias() {
            $tabla = "categorias";
            $respuesta = ModeloBlog::mdlMostrarCategorias($tabla);
            return $respuesta;

        }
    }