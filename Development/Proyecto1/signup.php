<?php
    require 'database.php';
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            background-image: linear-gradient(120deg,#5858FA,#ff6348);
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
    </style>

</head>
<body>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
<center>
    <div>
        <div class="section"></div>
            <h5 class="white-text"><b>Sign up with your email address</b></h5>
            <?php if(!empty($mensaje)):?>
            <p><?= $mensaje ?></p>
            <?php endif; ?>
        <div class="container">  
            <<div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <form  class = "col" action="newuser.php" method ="post" >
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="email" placeholder ="Enter email" required class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="password" name="password" placeholder ="Enter password" required class="validate"></h4><br>
                            <label for="password">Password</label>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="input-field col s12">                    
                            <input type="password" name="cpassword" placeholder ="Confirm password"required class="validate"></h4>
                            <label for="cpassword">Confirm Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <a class="col s12 tooltipped btn btn-large orange darken-3" data-position="top" data-tooltip="Para la creación de una contraseña segura no olvide utilizar letras, números y caracteres especiales">Ayuda!</a>
                        </div>
                        <div class="input-field col s6">
                            <button type='submit' name='registrar' class='col s12 btn btn-large waves-effect orange darken-3'>REGISTER</button>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
  
    <a href="login.php" class="white-text"><b>Have an account already</b></a>
</center>     
</body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });
</script>