<?php

    
    require 'database.php';

    
   
    if (!empty($_POST["email"])&& !empty($_POST["password"]) && !empty($_POST["cpassword"])) {

        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {         
            $email = $_POST["email"];
            $password_form=$_POST["password"];
            $password_confirm=$_POST["cpassword"];
            $sql = "SELECT id,email, password FROM users where email ='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $password = $row["password"];
                    $email =$row["email"];
                }
            
                if ($_POST["email"]===$email) {
                    echo "<script>alert('Usuario existente. Intentalo otra vez.'); window.location = './signup.php';</script>";
                }
            }

            else if ($password_form === $password_confirm)
            {
                $sql2 = "INSERT INTO users (email, password, level, status) values ('$email', md5('$password_form'), 1 , 0)";
                $result = $conn->query($sql2);
                
                echo ('Usuario nuevo');
                header('Location: http://localhost/home.php');
                
            }
            else
            {
                /*$message = "Credenciales incorrectas";
                echo "<script type='text/javascript'>alert('$message');</script>";
                */
                echo "<script>alert('Registro sin exito'); window.location = './signup.php';</script>";
                
                //header ('Location: http://localhost/prueba/login.php');
                //Header /login
            }
        }else{
            echo "<script>alert('Ingrese un email valido por favor'); window.location = './signup.php';</script>";
        }

    }
    
    
    ?>
