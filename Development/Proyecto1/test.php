<?php
    
    require 'database.php';
    $mensaje='';
    
    echo 'Hola, ';
    echo $_POST["email"];
    
    echo ' tu contraseña es '.$_POST["password"];
    

    if(!empty($_post["email"])&& !empty($_post["password"])){
        
 
        $sql ="INSERT INTO (email, password) VALUES (:email, :password)";
         $statement=$conn->prepare($sql);
         $statement->bindParam(':email',$_post["email"]);
         $contraseña=password_hash($_post["password"],PASSWORD_BCRYPT );
         $statement->bindParam(':password', $password);
         if($statement->execute()){
            $mensaje='Se creo nuevo usuario';
            echo $mensaje;
        }else{
            $mensaje='Ocurrio un error al crear un usuario';
            echo $mensaje;
        }
    }
?>