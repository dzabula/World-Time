<?php
session_start();
include "config.php";
include "functions.php";



if(isset($_POST['submit'])){

    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $id_category = $_POST['category'];
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    $rePass = trim($_POST['re-pass']);
    $vkey = md5(time().$email);
     $regName = "/([A-Z][a-z]{2,15}\s?){1,2}/";
     $regEmail = "/(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/";
     $regPass = "/(?=.*[0-9])(?=.*[!\.@$%^&*])[a-zA-Z0-9!@\.$%^&*]{8,16}/";
    
    if($pass!=$rePass || preg_match($regName, $firstName)==0 || preg_match($regName, $lastName)==0 ||preg_match($regEmail,$email) ==0 || preg_match($regPass,$pass) == 0 || $id_category==0 || !is_numeric($id_category)){
        $_SESSION['pass-error'] = "Podaci nisu u ispravnom formatu!";
        header("Location: ../index.php?pages=registration");
        exit;
    }

    try{
        $res = Registration($firstName,$lastName,$email,$pass,$id_category,$vkey);
    }
    catch(PDOException $e){
        $_SESSION['email-error'] = "Vec postoji korisnik sa istom email adresom !";
        header("Location: ../index.php?pages=registration");
        exit;
    }



    if($res){
       $_SESSION['message'] = "Uspesno ste se registrovali.";
       header("Location: ../index.php?pages=home");
    }
    else{
        echo json_encode("Neuspela registracija zao nam je.");
    }

}
else if(isset($_GET['vkey'])){

    $res = VerificationAcc($_GET['vkey']);
    header("Location: index.php?pages=log-in");
    http_response_code(302);
    if($res){
        echo json_decode("Usepsno ste aktivirali nalog");
    }
    else{
        echo json_decode("Doslo je do greske prilikom verifikacije pokusajte ponovo!");

    }
    
}