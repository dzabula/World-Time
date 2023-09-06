<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
if($_SESSION['user']->id_role != 3){
    header("Location: index.php");
    exit; 
}
if(!is_numeric($_POST['id'])){
    header("Location: ../index.php");
}

    include "config.php";
    include "functions.php";



    $id = $_POST['id'];

    $title = $_POST['title'];

    $category_ = $_POST['category'];

    $type_ = $_POST['type'];
    
    $desc = $_POST['desc'];
    
    $alt = $_POST['alt'];

    if(strlen($title)<3){
        $_SESSION['message']="Naslov mora imati minimum tri slova";

    }
    if(!is_numeric($category_) || $category_ ==0){

        $_SESSION['message']="Morate izabrati kategoriju";
    }
    if(!is_numeric($type_) || $type_ ==0){

        $_SESSION['message']="Morate izabrati tip objave";
    }
    if(strlen($desc)<4){
        $_SESSION['message']="Sadrzaj objave mora imati minimum 4 karaktera";
    }
    
    if(strlen($alt)<3){
        $_SESSION['message']="Morate uneti opis slike";

    }
    if(isset($_SESSION['message'])){
        header("Location: ../index.php?pages=editPost&id=$id");
        exit;
    }

    if(isset($_POST['keep'])){
        $image_id = $_POST['old-image'];

    }
    else if(isset($_FILES['image'])){
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'] / 1000;
        $image_type = $_FILES['image']['type'];
        $image_tmp_name = $_FILES['image']['tmp_name'];

        $path = MoveImage($image_tmp_name,$image_type);

        $r = InsertImage($image_type,$path,$image_size,$alt);
        if($r){
            $image_id = $conn->lastInsertId();
        }
    }
    else{
        $_SESSION['message']="Morate odabrati sliku ili uzeti postojecu";
        header("Location: ../index.php?pages=editPost&id=$id");
        exit;
        
    }

    $res = UpdateNews($title,$desc,$image_id,$category_,$type_,$id);
    
    if($res){
        $_SESSION['message'] = "Uspesno ste azurirali post";
        header("Location: ../index.php?pages=editPost&id=$id");
    }






?>