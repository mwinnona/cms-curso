<?php 

session_start();
$session_home = $_SESSION["email"];
$session_level = $_SESSION["level"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .nav-wrapper { background-image: linear-gradient(120deg,#ffa502,#EE5A24,#ff6348, #ffa502);
            border-radius: 0 0 2px 2px;
            padding: 4px 6px;
            height: 60px; width: 100%;}
    </style>
</head>
<body>

<div class="row">
    <nav>
        <div class="nav-wrapper ">
            <a href="#" class="brand-logo "><i class="material-icons">grade</i>W E L C O M E</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="login.php">Login</a></li>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href = "sobrenosotros.php" class="tooltipped btn-floating btn tiny orange darken-3" data-position="bottom" data-tooltip="Current tab"><i class="material-icons">cloud_circle</i></a></li>
                <li><a href = "contactanos.php" class="tooltipped btn-floating btn tiny orange darken-3" data-position="bottom" data-tooltip="Contact us"><i class="material-icons">call</i></a></li>               
            </ul>
        </div>
    </nav>
        
</div>



<center> 
    <div>
        <div class="section"></div>
        <h5 class="deep-orange-text"><strong>Conócenos</strong></h5>                  
                <h2>Sobre nosotros</h2>
        <div class ="row">
                <h4>Mision</h4>
                <p>Brindar un servicio de calidad a nuestros clientes.</p>
        </div>
        <div class ="row">
                <h4>Vision</h4>
                <p>Ser la cadena de ... lider a nivel nacional, destacando por ofrecer el mejor servicio a nuestros clientes a través del mejor equipo de personas, con calidad humana y profesional.</p>
        </div>
        <div class = "row">
            <div class =  "col l2"></div>
            <div class = "col l8 posicion-carousel-1" style="margin-top: -100px;">
                <div class="carousel">
                    <a class="carousel-item" href="#one!"><img class="materialboxed" width="650" src="https://image.freepik.com/foto-gratis/grupo-personas-trabajando-plan-negocios-oficina_1303-15869.jpg"></a>
                    <a class="carousel-item" href="#two!"><img class="materialboxed" width="650" src="https://www.adeprin.org/wp-content/uploads/2019/07/personas-trabajando-en-oficinas-modernas.jpg"></a>
                    <a class="carousel-item" href="#three!"><img class="materialboxed" width="650" src="https://image.freepik.com/foto-gratis/grupo-personas-trabajando-plan-negocios-oficina_1303-15861.jpg"></a>
                    <a class="carousel-item" href="#four!"><img class="materialboxed" width="650" src="https://lamenteesmaravillosa.com/wp-content/uploads/2016/04/Personas-trabajando.jpg"></a>     
                </div>
            </div>

        </div>
            
        <div class="row">  
        </div>      
    </div>
</center>
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.materialboxed');
        var instances = M.Materialbox.init(elems);
        var elems2 = document.querySelectorAll('.carousel');
        var instances = M.Carousel.init(elems2);
        
        var elems3 = document.querySelectorAll('.tooltipped');
        var instances3 = M.Tooltip.init(elems3);
    });
</script>