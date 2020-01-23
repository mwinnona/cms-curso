<?php 
    session_start();
    require 'database.php';

    $session_home = $_SESSION["email"];
    $session_level = $_SESSION["level"];

    if ($session_home != null || $session_home != '')
    {
        header('Location: http://localhost/homeadmin.php');
    }

    /*<link  rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">*/

    
    if(isset($_SESSION["user_id"])){
        $records=$conn->prepare('SELECT id, usuario, contraseña FROM Usuario  WHERE id=:id');
        $records->bindParam(':id', $_SESSION["user_id"]);
        $records->execute();
        $resultados=$records->FETCH(PDO::FETCH_ASSOC);
        $user =null;
        if(count($resultados)>0){
            $user=$resultados;
        }  
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
       .nav-wrapper { background-image: linear-gradient(120deg,#ffa502,#EE5A24,#ff6348, #ffa502);
            border-radius: 0 0 2px 2px;
            padding: 4px 6px;
            height: 60px; width: 100%;}
        img{
            width: 450px; height: 450px;
        }
            
    </style>

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
                    <li><a class="active" href="index.php" >Home</a></li>
                    <li><a href = "sobrenosotros.php" class="tooltipped btn-floating btn tiny orange darken-3" data-position="bottom" data-tooltip="About us"><i class="material-icons">cloud_circle</i></a></li>
                    <li><a href = "contactanos.php" class="tooltipped btn-floating btn tiny orange darken-3" data-position="bottom" data-tooltip="Contact us"><i class="material-icons">call</i></a></li>               
                </ul>
                </div>
            </nav>
        
        </div>
    
        
        <div class="row s12" >
            <div class="col s6 ">
                <div class="card">
                    <div class="card-image small">
                        <img src="imagenes/cuzco.jpg">
                        <span class="card-title white-text">Cusco</span>
                    </div>
                    <div class="card-content">
                        <p>Cuzco es una ciudad de los Andes peruanos que fue la capital del Imperio Inca y es 
                            conocida por sus restos arqueológicos y la arquitectura colonial española. 
                            La Plaza de Armas es el centro de la ciudad antigua, con galerías, balcones de madera
                            tallada y ruinas de murallas incas.</p>
                    </div>
                    
                </div>
            </div>
            <div class="col s6">
                <div class="card">
                    <div class="card-image small">
                        <img src="imagenes/cuzo.png">
                        <span class="card-title white-text">Machu Picchu</span>
                    </div>
                    <div class="card-content">
                        <p>Machu Picchu es una ciudadela inca ubicada en las alturas de las montañas de los Andes 
                            en Perú, sobre el valle del río Urubamba. Se construyó en el siglo XV y luego fue abandonada, 
                            y es famosa por sus sofisticadas paredes de piedra seca que combinan enormes bloques sin el uso 
                            de un mortero, los edificios fascinantes que se relacionan con las alineaciones astronómicas y 
                            sus vistas panorámicas. </p>
                    </div>
                
                </div>
            </div>
            
        </div>
       
</body>
</html>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.tooltipped');
        var instances = M.Tooltip.init(elems);
    });
</script>