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
    header('Content-Type: application/json; charset=utf-8');

    $id = $_POST['id'];

    if(!is_numeric($id)) {
        http_response_code(400);
        echo json_encode("Invalid Id");
        exit;
    }


    include "config.php";
    include "functions.php";

    $res = SetBanComm($id);
    echo json_encode("succes");

   ?> 
