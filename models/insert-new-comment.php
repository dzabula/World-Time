<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    
    include "config.php";
    include "functions.php";
    
    $content = $_POST['content'];
    $id_vest = $_POST['id_vest'];
    
    if(!isset($_SESSION['user'])){
        http_response_code(401);
        echo json_encode("Morate se ulogovati da bi ste ostavili komentar!!!");
        
        exit;
    }


    if(strlen($content)==0){
        http_response_code(400);
        echo json_encode("Ne moze se postaviti prazan komentar!");
        exit;
    }


    $res = InsertNewComment($content,$id_vest);
    $last_id = $conn->lastInsertId();
    $date = date("Y M D H i s");

    if($res){

        $result = [
            "first_name" => $_SESSION['user']->first_name,
            "last_name" => $_SESSION['user']->last_name,
            "id_role" => $_SESSION['user']->id_role,
            "id_comment"=>$last_id,
            "content" => $content,
            "date"=> $date

        ];
        http_response_code(200);
        echo json_encode($result);
    }
    





?>