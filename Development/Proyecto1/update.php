<?php 

session_start();
$session_usuario = $_SESSION["email"];
$session_level = $_SESSION["level"];
$id =$_POST["id"];
$level =$_POST["level"];
$status =$_POST["status"];
$email = $_POST["email"];

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <center>
        <div>
            <div class="section"></div>
                    <h2 class="indigo-text">ACTUALIZACION</h2>
                    <div class="row">
                        <div class = "col s6">
                            <span>
                                <a href="logout.php" class="blue-text">Logout </a>or
                            </span>
                        </div>
                        <div class = "col s6">
                            <span>
                                <a href="homeadmin.php" class="blue-text">Usuarios</a>
                            </span>
                        </div>
                    </div>
            </div>
                    

   
   
    
    <?php
    require 'database.php';
    
    $sql = "UPDATE users SET level ='$level',status ='$status' where id ='$id'";
    $result1 = $conn->query($sql);
    

    $sql2 = "SELECT email, level, status FROM users where id ='$id'";
    $result = $conn->query($sql2);
    $data = null;
    
    
    
    
    if ($result->num_rows > 0) 
    {
        foreach ($result as $data)
        {
            echo "<br>";
            echo "Email: ".$data["email"]. "<br>";
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
            

    
        }
        
    }else {
        echo  "<br>";'no hay datos'. "<br>";
    }
    
        
    
    
    $conn->close();
    ?>
    
   



    
        </div>  
    </center>  
</body>
</html>

<script type="text/javascript" src="js/materialize.min.js"></script>