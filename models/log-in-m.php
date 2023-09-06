<?php
session_start();
    include "config.php";
    include "functions.php";
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $regEmail = "/(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/";
        $regPass = "/(?=.*[0-9])(?=.*[!\.@$%^&*])[a-zA-Z0-9!@\.$%^&*]{8,16}/";
        if(preg_match($regPass,$pass) == 0 || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['log-in-error'] = "Podaci nisu u ispravnom formatu!";
            header("Location: ../index.php?pages=log-in");
            exit;
        }

        

        $user = LogIn($email,$pass);
        $ok = true;
        if($user){
            /*if($user->active == 0){
                echo json_encode("Niste verifikovali email");
                header("Location: ../index.php?pages=log-in");
                exit;
            }*/
            if($user->ban != 0){
                $_SESSION['log-in-error']= "Vas nalog je trenutno banovan";
                header("Location: ../index.php?pages=log-in");
                exit;
            }

            if($ok){
                $_SESSION['user'] = $user;
                header("Location: ../index.php?pages=home");
                http_response_code(302);
                $_SESSION['user'] = $user;
            }
        }
        else{
            header("Location: ../index.php?pages=log-in");
            http_response_code(302);
            $_SESSION['log-in-error']="Neispravna lozinka ili email";
        }

    }


?>