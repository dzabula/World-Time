<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php?pages=log-in");
    exit;
}
if($_SESSION['user']->id_role != 3 && $_SESSION['user']->id_role != 2 ){
    header("Location: index.php");
    exit; 
}
    include "config.php";
    include "functions.php";
    /*if(!isset($_SESSION['user'])){
        header("Location: ../index.php");
        exit;
    }
    else if($_SESSION['user']->id_role != 3){
        header("Location: ../index.php");
        exit; 
    }*/

if(isset($_POST['submit'])){
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
        $_SESSION['message']="Sadrzaj objave mora imati minimum 3 karaktera";
    }
    if(!isset($_FILES['image'])){
        $_SESSION['message']="Morate odabrati sliku";
        
    }
    if(strlen($alt)<3){
        $_SESSION['message']="Morate uneti opis slike (min. 3 karaktera)!";

    }
    if(isset($_SESSION['message'])){
        header("Location: ../index.php?pages=insertPost");
        exit;
    }




    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'] / 1000;
    $image_type = $_FILES['image']['type'];
    $image_tmp_name = $_FILES['image']['tmp_name'];

    $path = MoveImage($image_tmp_name,$image_type);

    InsertImage($image_type,$path,$image_size,$alt);

    $image_id = $conn->lastInsertId();
  
    
    InsertNews($title,$desc,$image_id,$category_,$type_);

    $_SESSION['message'] = "Uspesno ste uneli post";

}
header("Location: ../index.php?pages=insertPost");