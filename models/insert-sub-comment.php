<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    
    if(!isset($_SESSION['user'])) {
        http_response_code(400);
        echo json_encode("Sesija je istekla ulogujte se ponovo!");



    }
    
    
    if(strlen($_POST['content']) == 0){
        http_response_code(400);
        echo json_encode("Ne mozete uneti prazan komentar");
        exit;
    }
    #echo json_encode("CheckPoint");


    include "config.php";
    include "functions.php";
    
    $id = $_POST['idForComment'];
    $content = $_POST['content'];

    $res = InsertReplayComment($id,$content);
    $date = date("Y M D H i s");



    if($res){
        http_response_code(201);
        $result = [
            "first_name"=>$_SESSION['user']->first_name,
            "last_name"=>$_SESSION['user']->last_name,
            "id_role"=>$_SESSION['user']->id_role,
            "date"=>$date,
            "content"=>$content


        ];
        
        echo json_encode($result);
        exit;

    }

    






?>