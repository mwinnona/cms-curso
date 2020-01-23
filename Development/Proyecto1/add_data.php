<?php 

session_start();
require 'database.php';
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
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            background-image: linear-gradient(120deg,#f9ca24,#ff6348);
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
    </style>
</head>
<body>
<center>
    <div>
        <div class="section"></div>
        <h5 class="white-text">Edit your account information</h5>

            
    <div class="container"> 
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">  
            <form class="col" action ="update_add_data.php" method ="post" >
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" name="email"  placeholder="Email" value="<?php echo $session_home;?>" disabled></h4>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">           
                        <input type="text" name="name_user" placeholder ="Enter your name" class="validate">
                        <label for="name_user">Name</label>
                    </div>
                </div>  
                <div class="row">
                    <div class="input-field col s12" >
                        <input type="text" name="lastname_user" placeholder ="Enter your lastname" class="validate">
                        <label for="lastname_user">Lastname</label>              
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12" >
                        <input type="date" name="date" class="validate">
                        <label for="date">Fecha de nacimiento</label>              
                    </div>
                </div>
                <div class="row">
                    <button type= "submit" onclick="return confirm('Are you sure you want to add this item?');" class='btn-large waves-effect amber darken-4'>Guardar</button>
                    <button type= "submit" class='btn-large waves-effect amber darken-4'>Cancelar</button>       
                </div>                   
            </form>
        </div>
    </div>
</center>
</body>
</html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
});

  function open_navbar(){
      navbar.sidenav('open');
   };
  
   dropdown.dropdown('open')

  collapsible.collapsible('open');

  function open_modal(){
    $('.modal').modal('open');
   };

   $("#datepicker").datepicker({
       autoclose: true,
       todayHighlight: true
    }).datepicker('update', new Date());

  
  </script>
