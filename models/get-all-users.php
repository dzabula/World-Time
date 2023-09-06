<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: ../index.php?pages=log-in");
    exit;
}
if($_SESSION['user']->id_role != 3){

    header("Location: ../index.php");
    exit; 

}

    include "config.php";
    include "functions.php";

    $res = GetAllUsers();

    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($res);
    
    
    
    
    
    
?>
   