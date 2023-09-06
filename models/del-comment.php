<?php session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php?pages=log-in");
    exit;
}
if($_SESSION['user']->id_role != 3){
    header("Location: ../index.php");
    exit; 
}
if(!is_numeric($_POST['id'])){
    header("Location: ../index.php");
    exit; 
}



    header('Content-Type: application/json; charset=utf-8');
    
    $id = $_POST['id'];
    include "config.php";
    include "functions.php";


    $res = DeleteComment($id);
    


?>