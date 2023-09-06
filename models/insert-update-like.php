<?php
session_start();
if(!isset($_SESSION['user'])){
    http_response_code(403);
    
    exit;
}
    include "config.php";
    include "functions.php";

    $id_vest = (int)$_POST['id_vest'];
    $id_user = (int)$_POST['id_user'];

    $res = InsertUpdateLike($id_user,$id_vest);
    http_response_code(204);
    




?>