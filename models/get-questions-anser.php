<?php
session_start();
if(!isset($_SESSION['user'])){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";

    exit;
}
if($_SESSION['user']->id_role != 3){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    exit; 
}
    try{
        include "config.php";
        include "functions.php";
    
    $res = GetAllQuestionsAnswer();
    
    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($res);
    }
    catch(PDOException $e){
        http_response_code(500);
    }
    



?>