<?php 

session_start();
$session_home = $_SESSION["email"];
$session_level = $_SESSION["level"];
$session_status= $_SESSION["status"];

if ($session_home == null || $session_home=='')
{
header('Location: http://localhost/');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
    .nav-wrapper { background-image: linear-gradient(120deg,#ffa502,#EE5A24,#ff6348, #ffa502);
            border-radius: 0 0 2px 2px;
            padding: 4px 6px;
            height: 60px; width: 100%;}
    .modal  {  left: 0; right: 0;  background-color: #ffffff;
            padding: 0; max-height: 75%; width: 55%;
            will-change: top, opacity;}


    .modal .modal-footer { border-radius: 0 0 2px 2px;
            background-color: #feca57; padding: 4px 6px;
            height: 60px; width: 100%;text-align: right;}
    body{

        background-size: 100% 80%;
        background-image:url("imagenes/venecia.jpg");
        
        background-repeat:no-repeat;
        background-attachment: fixed; /* Establecemos una posicion fija para la textura */
    }
    </style>

</head>
<body>

<nav>
    <div class="nav-wrapper">
        <div class="container">      
            <a href="index.php" class="brand-logo "><i class="material-icons">grade</i>W E L C O M E</a>
            <a href="#"class="sidenav-trigger" data-target="slide_out"><i class="material-icons">menu</i></a>
  
            <ul class="hide-on-med-and-down right">
                <li><a href="index.php">Home</a></li>
                <li class ="active"><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </div>
</nav>

  

<ul class="sidenav sidenav-fixed" id="slide_out" >
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="imagenes/naranjas.jpg">
                    </div>
                    <center>
                        <a href=""> <i class = "medium material-icons" >account_circle</i></a>
                        <a href=""><span class="black-text email"><b> <?php echo $session_home ?> </b></span></a>
                    </center>
                </div>
            </li>
            <li><a class ="subheader" >Home </a></li>
            <li><div class="divider"></div></li>
            <li><a class="waves-effect waves-light modal-trigger" href="#idmodal" onclick="open_modal();" ><i class ="material-icons">cloud</i>Informacion</a></li>
            <li><a class ="subheader" href="#">Extras</a></li>         
            <li class = "no-padding">
                <ul class = "collapsible collapsible-accordion">
                    <li>
                        <a class='dropdown-trigger' href='#' data-target='dropdown1'>Despleagble</a>
                        
                        <div  class="collapsible-body">
                            <ul id= 'dropdown1' class='dropdown-content'>
                                <li><a href = "#" >Prueba1</a></li>
                                <li><a href = "#" >Prueba2</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Level</div>
                    <div class="collapsible-body"><span> <?php if($session_level==0){ echo 'Usuario Administrador';}else {echo 'Usuario Regular';} ?> </span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Status</div>
                    <div class="collapsible-body"><span><?php if($session_status==0){ echo 'Usuario Habilitado';}else {echo 'Usuario Deshabilitado';} ?></span></div>
                </li>
            </ul>
            <li><a class="waves-effect waves-light " href="sobrenosotros.php" ><i class ="material-icons">cloud_circle</i>Sobre nosotros</a></li>
            <li><a class="waves-effect waves-light " href="contactanos.php" ><i class ="material-icons">call</i>Contáctanos</a></li>
 </ul>

 <div id="idmodal" class = "modal">
                    <div class="modal-content">
                        <h1>Datos de usuario</h1>
                        <?php 
                        require 'database.php'; 
                        $sql2 = "SELECT name_user, lastname_user, email, level, status, fecha_nac FROM users where email ='$session_home'";
                        $result = $conn->query($sql2);
                        $data = null;    
                        if ($result->num_rows > 0) {
                            foreach ($result as $data){
                            echo "<br>";
                            echo "Email: ".$data["email"]. "<br>";
                            echo "Name: ".$data["name_user"]. "<br>";
                            echo "Lastname: ".$data["lastname_user"]. "<br>";
                            echo "Level: ";
                                if($data["level"]==0){
                                    echo "Usuario Administrador"."<br>";
                                } else{
                                    echo "Usuario Regular"."<br>";
                                }
                                echo "Status: ";
                                if($data["status"]==0){
                                    echo "Habilitado"."<br>";
                                }else{
                                    echo "Deshabilitado". "<br>";
                                }
                            echo "Fecha de nacimiento: ".$data["fecha_nac"]. "<br>";
                            }
                        }else {
                            echo  "<br>";'no hay datos'. "<br>";
                        }                   
                        $conn->close();
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="add_data.php" class="modal-close btn amber darken-4">actualizar</a>
                        <a href="#!" class="modal-close btn amber darken-4">Cerrar</a>
                    </div>
</div>
 

<div class="parallax-container" style="margin-left: -100px;>
    <div class="parallax">
        <img src="imagenes/venecia.jpg" style ="opacity:1; ">
    </div>
</div>
       

<div class="section white">
    <div class="row container">
        <h2 class="header">BIENVENIDO!!!</h2>
        <p class="grey-text text-darken-3 lighten-3"><?php echo $session_home ?></p>
    </div>
</div>

<div class="parallax-container">
    <div class="parallax">
    <img src="imagenes/prueba1.jpg" style ="opacity:1; transform: translate3d(-50%,292.7px, 0px); ">
    </div>
</div>




</body>
</html>


<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<script>
    var navbar;
    var collapsible;
    var dropdown;
    $(document).ready(function(){
        $(".button-collapse").sidenav();
        navbar=$('.sidenav').sidenav();
        dropdown = $('.dropdown-trigger').dropdown();
        $('.modal').modal();
        collapsible= $('.collapsible').collapsible();  
        $('.parallax').parallax();

        $(window).scroll(function(){
		    var barra = $(window).scrollTop();
		    var posicion = barra * 0.40;
 
		    $('body').css({
			    'background-position': '0 ' + posicion + 'px'
		    });
	    });     
    });
    $('.parallax').parallax('open');
    
    function open_navbar(){
        navbar.sidenav('open');
    };
   
    dropdown.dropdown('open')
    collapsible.collapsible('open');

    function open_modal(){
        $('.modal').modal('open');
    };
  
  
  </script>

