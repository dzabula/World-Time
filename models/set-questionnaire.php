<?php 
session_start();
if(!isset($_SESSION['user'])) exit;

    include "config.php";
    include "functions.php";

$id_user = $_POST['id'];
$answer = $_POST['answer'];
$quest = $_POST['question'];
try{
    InsertAnswerToQuestion($answer,$quest,$id_user);


    http_response_code(200);
}catch(PDOException $e){
    http_response_code(500);
}


?>

