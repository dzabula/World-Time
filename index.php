<?php 
    session_start();    
    include "view/fixed/head.php";
    include "view/fixed/nav.php";
    #include "models/functions.php";
   
    if(isset($_SESSION['message'])){
        include "view/pages/notification.php";
        unset($_SESSION['message']);

    }
    
        if(isset($_GET['pages'])){

            switch($_GET['pages']){
                case "registration": include "view/pages/registration.php";break;

            case "log-in": include "view/pages/log-in.php";break;
                
            case "category": include "view/pages/singe-category.php";break;
                
                
            case "vest": include "view/pages/singe-vest.php";break;
                
            case "admin": include "view/pages/admin/admin.php";break;
                
            case "moderator": include "view/pages/admin/insertPost.php";break;
                
            case "comments": include "view/pages/admin/comments-post.php";break;
                
            case "comments-user": include "view/pages/admin/comments-user.php";break;
                
            case "editUser": include "view/pages/admin/edit-user.php";break;
                
            case "insertPost": include "view/pages/admin/insertPost.php";break;
                
            case "editPost": include "view/pages/admin/edit-post.php";break;
                
            case "questionnaire": include "view/pages/questionnaire.php";break;

            case "about": include "view/pages/about.php";break;

            case "author": include "view/pages/author.php";break;

                default: include "view/pages/home/home.php";
            }

        }
        else include "view/pages/home/home.php";
    /*}catch(PDOException $e){
        $_SESSION['message'] = "Sometimes go wrong, try again.";
        include "view/pages/notification.php";
        unset($_SESSION['message']);
    }*/

    include "view/fixed/footer.php";
?>