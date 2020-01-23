<?php
    //EStablece que el codigo del archivo invocado es requerido/obligatorio para el funcionamiento 
    //del programa Si el archivo no se encuentra, saltará un error y el programa se detendrá
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/formularios.controlador.php";
    require_once "modelos/formularios.modelo.php";
    
    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTaerPlantilla();
?>