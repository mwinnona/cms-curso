<?php

    
    require 'database.php';

    $id=null;


   
    if (!empty($_POST["email"])&& !empty($_POST["password"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {   
    
            $email = $_POST["email"];
            $password_form=md5($_POST["password"]);
            $sql = "SELECT id,email, password, level, status FROM users where email ='$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $password = $row["password"];
                    $email =$row["email"];
                    $level =$row["level"];
                    $status=$row["status"];
                }

                
            
            } else {
                echo "ERROR";
            }
            $conn->close();

            if ($password_form === $password)
            {
                session_start();
                $_SESSION["email"]= $email;
                $_SESSION["level"]= $level;
                $_SESSION["status"]=$status;
                if($status==0)
                {

                    if($level==0){
                        header('Location: ./homeadmin.php');

                    }else{
                        // Session
                        header('Location: http://localhost/home.php');
                        //Header /home -> Hola Mundo -> btn cerrar sesión -> session destroy //Header /login
                    }
                }else{
                    echo "<script>alert('Usuario Deshabilitado'); window.location = './login.php';</script>";
                                
                }
                

            }
            else
            {
                /*$message = "Credenciales incorrectas";
                echo "<script type='text/javascript'>alert('$message');</script>";
                */
                echo "<script>alert('Las credenciales no coinciden'); window.location = './login.php';</script>";
                
                //header ('Location: http://localhost/prueba/login.php');
                //Header /login
            }
        }
        else{
                echo "<script>alert('Ingrese un email valido por favor'); window.location = './login.php';</script>";
        }
    }
    
    
    ?>

