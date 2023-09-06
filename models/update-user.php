<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php?pages=log-in");
    exit;
}
if($_SESSION['user']->id_role != 3){
    header("Location: ../index.php");
    exit; 
}
if(!isset($_POST['submit'])){
    header("Location: ../index.php");
    exit; 
}
if(!is_numeric($_POST['id'])){
    header("Location: ../index.php");
    exit;
}
    include "config.php";
    include "functions.php";

    $id = $_POST['id'];

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $favorite_category = $_POST['favorite'];
    $id_role = $_POST['id_role'];
    $active = $_POST['status'];

$regName = "/([A-Z][a-z]{2,15}\s?){1,2}/";
$regEmail = "/(([^<>()[\]\\.,;:\s@]+(\.[^<>()[\]\\.,;:\s@]+)*)|(.+))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))/";

    if(preg_match($regName, $first_name)==0){
        $_SESSION['message']= "Ime ne sme da sadrzi vise od dve reci. Prvo slovo mora biti veliko! ";
        header("Location: ../index.php?pages=editUser&id=$id");
        exit; 
    }
    if(preg_match($regName, $last_name)==0){
        $_SESSION['message']= "Prezime ne sme da sadrzi vise od dve reci. Prvo slovo mora biti veliko! ";
        header("Location: ../index.php?pages=editUser&id=$id");
        exit; 
    }if(preg_match($regEmail, $email)==0){
        $_SESSION['message']= "Email mora biti u formatu example@gmail.com ! ";
        header("Location: ../index.php?pages=editUser&id=$id");
        exit; 
    }

    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
    $email = addslashes($email);

    $res = UpdateUser($first_name,$last_name,$email,$favorite_category,$id_role,$active,$id);


    http_response_code(204);
    $_SESSION['message'] = "Succesfull Update";
    header("Location: ../index.php?pages=admin");


?>