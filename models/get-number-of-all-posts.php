<?php
session_start();
header('Content-Type: application/json; charset=utf-8');
include "config.php";
include "functions.php";
if(!isset($_SESSION['user'])){
    

    exit;
}
if($_SESSION['user']->id_role != 3){
    
   
    exit; 
}

$res = GetNumberOfAllNews();
echo json_encode($res);
http_response_code(200);
?>

