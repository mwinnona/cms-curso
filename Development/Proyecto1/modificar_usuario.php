<?php 

session_start();
$session_usuario = $_SESSION["email"];
$session_level = $_SESSION["level"];


if ($session_usuario== null || $session_usuario=='')
{
    header('Location: http://localhost/');
}

if ($session_level != 0){
    header('Location: http://localhost/home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .modal  {  left: 0; right: 0;  background-color: #e1f5fe;
                padding: 0; max-height: 75%; width: 55%;
                will-change: top, opacity;}


        .modal .modal-footer { border-radius: 0 0 2px 2px;
                background-color: #008873; padding: 4px 6px;
                height: 60px; width: 100%;text-align: right;}
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
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <div>
        <div class="row">
                <h2 class="white-text"><strong>EDITAR</strong></h2>
            </div> 
            
            
        <?php
        require 'database.php';
        $email = $_GET["email"];
        
        $sql = "SELECT id,email, password, level, status FROM users where email ='$email' LIMIT 1";
        $result = $conn->query($sql);
        $data = null;
        $level =null;
        $status=null;
        
        if ($result->num_rows > 0) 
        {
            foreach ($result as $data)
            {
            /* echo "<br>";
                echo "Id:" .$data["id"]. "<br";
                echo "Email: ".$data["email"]. "<br>";
                echo "Level: ".$data["level"]. "<br>";
                echo "Status: ".$data["status"]. "<br>";*/
                $level = $data["level"];
                $status =$data["status"];
            }
            
        }

        
        ?>
        <div class="container">            
             <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
                <form class="col" action="update.php" method ="post" >
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="email"  placeholder="Email" value="<?php echo $data["email"];?>" disabled>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">           
                            <select name="level">
                                <option value="0" <?php if ($level == 0) echo 'Selected' ?> >Usuario Administrador</option>
                                <option value="1" <?php if ($level == 1) echo 'Selected' ?>>Usuario Regular</option>
                            </select>
                            <label>Level</label> 
                        </div>
                    </div>  
                    <div class="row">
                        
                        <div class="input-field col s12" >
                            <select name ="status">
                                <option value="0" <?php if ($status== 0) echo 'Selected' ?> >Habilitado</option>
                                <option value="1" <?php if ($status== 1) echo 'Selected' ?>>Deshabilitado</option>
                            </select>
                            <label>Status</label>
                        </div>


                    </div>
                    <div class="row">
                        <div class="input-field col s12">    
                            <input type="hidden" name="id" value="<?php echo $data["id"];?>" >
                            <div class="row">
                                <button type= "submit" class="waves-effect waves-light btn-large orange darken-3">Guardar</button>
                            </div>
                        </div>
                        
                    </div>
                    
                    <?php 
                    if  ($result->num_rows < 0)
                    {
                        echo  "<br>";'no hay datos'. "<br>";
                    }
                    
                    $conn->close();
                    ?>
                </form>
            </div>
        </div>
    </div>
    <a href="homeadmin.php" class="white-text">Usuarios</a>
</center>
</body>
</html>

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>

$(document).ready(function(){
        $('select').formSelect();
        });


</script>

