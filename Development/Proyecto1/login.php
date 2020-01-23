<?php

    session_start();
    require 'database.php';
    
    $session_home = $_SESSION["email"];
    $session_level = $_SESSION["level"];

    if ($session_home != null || $session_home != '')
    {
        header('Location: http://localhost/homeadmin.php');
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
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <center>
        <div>
            <div class="section"></div>
            <h5 class="white-text"><b>Please, log in into your account<b/></h5>
            
            <?php if(!empty($mensaje)):?>
            <p><?= $mensaje ?></p>
            <?php endif; ?>
            
            <div class="container">            
                    <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                        <form class="col" action="HelloWorld.php" method ="post" >
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

                            <div class="row ">
                                <div class="input-field col s12">
                                <button type='submit' name='send' class='col s12 btn btn-large waves-effect orange darken-3'>START</button>
                                </div>
                            </div>
                            <div class="row">
                                
                                    <label>
                                        <input type="checkbox" checked="checked" name="remember" class="deep-orange-filled-in"/>
                                        <span>Remember me</span>
                                    </label>
                                
                            </div>              
                            
                        </form>
                    </div>
                      
                
            </div>
        </div>
        <a href="signup.php" class="white-text"><b>Create an account</b></a>
    </center>
</body> 
    
</html>