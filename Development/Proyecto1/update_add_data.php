<?php 
session_start();
require 'database.php';
$session_home = $_SESSION["email"];
$name = $_POST["name_user"];
$lastname =$_POST["lastname_user"];
$fecha =$_POST["date"];
if (empty($name)){
    if(empty($lastname)){
        if(empty($fecha)){
        }else{
            $sql = "UPDATE users SET fecha_nac ='$fecha' where email ='$session_home'";
        }
    }else{
        if(empty($fecha)){ $sql = "UPDATE users SET lastname_user ='$lastname' where email ='$session_home'";
        }else{
            $sql = "UPDATE users SET lastname_user ='$lastname',fecha_nac ='$fecha' where email ='$session_home'";
        }
    }
        
    
}else if(empty($lastname)){
    if(empty($fecha)){
        $sql = "UPDATE users SET name_user ='$name', where email ='$session_home'";
    }else{
        $sql = "UPDATE users SET fecha_nac ='$fecha',name_user ='$name' where email ='$session_home'";
    }
    
}else{
    $sql = "UPDATE users SET name_user ='$name',lastname_user ='$lastname',fecha_nac ='$fecha' where email ='$session_home'";  
}  

    
   
$result1 = $conn->query($sql);
$sql2 = "SELECT name_user, lastname_user, email, level, status, fecha_nac FROM users where email ='$session_home'";
$result = $conn->query($sql2);
$data = null;
                       
if ($result->num_rows > 0) 
{
    foreach ($result as $data)
    {
        /*echo "<br>";
        echo "Email: ".$data["email"]. "<br>";
        echo "Name: ".$data["name_user"]. "<br>";
        echo "Lastname: ".$data["lastname_user"]. "<br>";
        echo "Level: ";*/
        if($data["level"]==0){
            header('Location: http://localhost/homeadmin.php');
        } else{
            header('Location: ./home.php');
        }
          /*                      
        echo "Status: ";
        if($data["status"]==0){
            echo "Habilitado"."<br>";
        }else{
            echo "Deshabilitado". "<br>";
        }*/
                                                        
    }               
}else {
    echo  "<br>";'no hay datos'. "<br>";
}                   
$conn->close();

?>   
