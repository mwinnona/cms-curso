<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Latest compiled Icon Awesome-->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="class container-fluid">
        <div class="class text-center py-3">LOGO</div>
    </div>

    <div class="class contanier-fluid bg-light">
        <div class="class container">
            <ul class=" nav nav-justified py-2 nav-pills">

            <?php if(isset($_GET["pagina"])): ?>
                <?php if($_GET["pagina"]=="registro"): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href= "index.php?pagina=registro" >Registro</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href= "index.php?pagina=registro" >Registro</a>
                    </li>
                <?php endif ?>


            
                <?php if($_GET["pagina"]=="ingreso"): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href= "index.php?pagina=ingreso" >Ingreso</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href= "index.php?pagina=ingreso" >Ingreso</a>
                    </li>
                <?php endif ?>

                <?php if($_GET["pagina"]=="inicio"): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href= "index.php?pagina=inicio" >inicio</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href= "index.php?pagina=inicio" >Inicio</a>
                    </li>
                <?php endif ?>

            
                <?php if($_GET["pagina"]=="salir"): ?>
                    <li class="nav-item">
                        <a class="nav-link active" href= "index.php?pagina=salir" >Salir</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href= "index.php?pagina=salir" >Salir</a>
                    </li>
                <?php endif ?>
            <?php else: ?>
                
                <li class="nav-item">
                    <a class="nav-link active" href= "registro" >Registro</a>
                </li>
                   
                <li class="nav-item">
                    <a class="nav-link" href= "index.php?pagina=ingreso" >Ingreso</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href= "index.php?pagina=inicio" >Inicio</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href= "index.php?pagina=salir" >Salir</a>
                </li>

            <?php endif ?>
               

                

            </ul>
        </div>
    </div>


    <div class="class contanier-fluid py-5">
        <div class="class container">
            <?php 

                if(isset($_GET["pagina"])){
                    if($_GET["pagina"]=="registro" ||$_GET["pagina"]=="ingreso" || $_GET["pagina"]=="inicio" 
                    ||$_GET["pagina"]=="salir"  ||$_GET["pagina"]=="editar"){
                        include "paginas/".$_GET["pagina"].".php";   
                    }else{
                        include "paginas/error404.php";  
                    }
                 
                }else{
                 include "paginas/registro.php";   
                }
            
            
            
            ?>
        </div>
    </div>

<script src = "vistas/js/script.js"></script>

    
</body>
</html>