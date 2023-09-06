<?php


function LogIn($email,$password){
    $password = md5($password);
    global $conn;
        $query = "SELECT * FROM user
         WHERE email = :email AND password = :password
         AND active = 0 AND ban = 0
        
        " ;
        $stm  = $conn->prepare($query);
        $stm->bindParam(':email',$email);
        $stm->bindParam(':password',$password);
        $stm->execute();
        return $stm->fetch();
}

function Registration($first_name,$last_name,$email,$password,$id_category,$vkey){
    global $conn;
    $query = "INSERT INTO user (first_name,last_name,email,password,favorite_category,vkey) VALUE (:first_name,:last_name,:email,:password,:favorite_category,:vkey)";
    $email= addslashes($email);
    $first_name = addslashes($first_name);
    $last_name = addslashes($last_name);
    addslashes($vkey);
    $password = md5($password);
    $stm = $conn->prepare($query);
    $stm->bindParam(":first_name",$first_name);
    $stm->bindParam(":last_name",$last_name);
    $stm->bindParam(":email",$email);
    $stm->bindParam(":password",$password);
    $stm->bindParam(":favorite_category", $id_category);
    $stm->bindParam(":vkey",$vkey);
    
    $res = $stm->execute();
   /* if($res){
        $to = $email;
        $subject = "Verification Email(no-reply)";
        $message = "Plesae click this link to verification your account
        <a href='http://localhost/models/registration-m.php?vkey=$vkey'>This is your link</a>. Thank you! Your 'Worls Time'!";
        $headers = "From: markodasic70@gmail.com \r\n";
        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        mail($to,$subject,$message,$headers);



    }*/
    return $res;
}

function VerificationAcc($vkey){
    global $conn;
    $vkey=addslashes($vkey);
    $query = "UPDATE user SET active = 1 WHERE vkey = :vkey";
    $stm = $conn->prepare($query);
    $stm->bindParam(":vkey",$vkey);
    $res = $stm->execute();
    return $res;
}

function GetCategory(){
    global $conn;
    $res = $conn->query("SELECT * FROM category")->fetchAll();

    return $res;

}

function GetTypeOfVest(){
    global $conn;
    $res = $conn->query("SELECT * FROM vest_type")->fetchAll();

    return $res;
}

function GetNewGlobalNews(){
    global $conn;
    $quer = "SELECT * FROM vest v JOIN vest_type vt ON v.id_vest_type=vt.id_vest_type
    JOIN image i ON v.id_image=i.id_image
    WHERE vt.name LIKE '%lobal news%' AND v.ban = 0 AND v.active=0
    ORDER BY date desc
    LIMIT 0,1";
    $res = $conn->query($quer);
    return $res->fetch();


}

#  $lim predstavlja broji objekata koji zelimo da dohvatimo


function GetNewNews($lim){
    global $conn;
    $res = $conn->query("SELECT * FROM vest v
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    JOIN image i ON v.id_image=i.id_image
    WHERE v.ban = 0 AND v.active=0
    ORDER BY date DESC LIMIT 0,".$lim);
    return $res->fetchAll();



}

function GetNewNewsForCategory($category,$lim){
    global $conn;
    $res = $conn->query("SELECT * FROM vest v
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    JOIN category c ON v.id_category = c.id_category
    JOIN image i ON v.id_image=i.id_image
    WHERE c.name LIKE '%$category%' AND v.ban = 0 AND v.active=0
    ORDER BY date DESC
    LIMIT 0,$lim");
    if($lim == 1) return $res->fetch();
    return $res->fetchAll();


}

function GetFilterNews($str){
    global $conn ;
    $q = "SELECT * FROM vest v
    JOIN image i ON v.id_image = i.id_image
    JOIN category c ON v.id_category = c.id_category
    WHERE v.title LIKE '%$str%'
    ORDER BY v.date DESC";
    return $conn->query($q)->fetchAll();
}

function GetFilterUsers($str){

    global $conn ;
    $q = "SELECT * FROM user u 
    JOIN role r ON u.id_role = r.id_role
    WHERE u.first_name LIKE '%$str%' OR u.last_name LIKE '%$str%'";
    return $conn->query($q)->fetchAll();


}
   

function GetTopNews(){
    global $conn;
    $res = $conn->query("SELECT * FROM vest v
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    JOIN image i ON v.id_image=i.id_image
    WHERE vt.name LIKE '%Top news%' AND v.ban = 0 AND v.active=0
    ORDER BY date DESC LIMIT 0,3");
    return $res->fetchAll();


}

function GetForYouNews($id,$lim){
    global $conn;

    $quer= "SELECT * FROM vest v
    JOIN image i ON v.id_image=i.id_image
    WHERE v.id_category = $id AND v.ban = 0 AND v.active=0
    ORDER BY date DESC LIMIT 0,$lim ";


    $res = $conn->query($quer);
    return $res->fetchAll();


}

function GetYouCategory($id){
    global $conn;

    $quer = "SELECT * FROM category
    WHERE id_category = $id";

    $res = $conn->query($quer);
    return $res->fetch()->name;
}



function GetNumberPostFromCategory($name){
    global $conn;

    $quer = "SELECT name, COUNT(*) AS number FROM category c
    JOIN vest v ON c.id_category = v.id_category
 	WHERE name LIKE '%$name%'
    GROUP BY name";

    $res = $conn->query($quer);
    return $res->fetch();



}

function GetNewsForCategory($name,$lim){
    global $conn;

    $quer = "SELECT * FROM vest v
    JOIN image i ON v.id_image=i.id_image
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    WHERE vt.name LIKE '%$name%' AND v.ban = 0 AND v.active=0
    ORDER BY date DESC LIMIT 0,$lim";

    $res = $conn->query($quer);
    return $res->fetchAll();
}

function GetMostLikesNews($lim){
    global $conn;

    $quer = "SELECT *, COUNT(id_user_like) AS number_like   FROM user_like ul
    JOIN vest v ON ul.id_vest = v.id_vest
    JOIN image i ON v.id_image=i.id_image
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    WHERE ul.is_liked > 0 AND v.ban = 0 AND v.active=0
    GROUP BY title
    ORDER BY number_like
    LIMIT 0, $lim";

    $res = $conn->query($quer);
    return $res->fetchAll();
}

function GetNewsForID($id){
    global $conn;
    $res = $conn->query("SELECT * FROM vest v
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    JOIN image i ON v.id_image=i.id_image
    WHERE v.ban = 0 AND v.active=0 AND v.id_vest = $id");
    return $res->fetch();
}

function GetNewsForIDWhitBan($id){
    global $conn;
    $res = $conn->query("SELECT * FROM vest v
    JOIN vest_type vt ON v.id_vest_type = vt.id_vest_type
    JOIN image i ON v.id_image=i.id_image
    WHERE  v.id_vest = $id");
    return $res->fetch();
}

function GetCommentForVest($id){
    global $conn;
    $res = $conn->query("SELECT * FROM comment c
    JOIN vest v ON c.id_vest = v.id_vest
    JOIN user u ON c.id_user = u.id_user
    WHERE c.ban = 0 AND v.id_vest = $id");
    return $res->fetchAll();
}

function GetAllCommentForVest($id){
    global $conn;
    $q = "
    SELECT first_name, last_name, date_comment, content,id_comment, c.ban, id_parrent FROM comment c 
    JOIN user u ON c.id_user = u.id_user
    WHERE id_vest = $id OR c.id_parrent IN (SELECT id_comment FROM comment cm WHERE id_vest = $id)
    ";
    $res = $conn->query("$q");
    return $res->fetchAll();

}


function GetAllCommentForUsers($id){
    global $conn;
    $q = "
    SELECT  c.id_vest,date_comment, content,id_comment, c.ban, id_parrent FROM comment c
    JOIN vest v ON c.id_vest = v.id_vest
    WHERE c.id_user = $id 
    ";
    $res = $conn->query($q);
    return $res->fetchAll();
}

function GetChildComment($id){

    global $conn;
    $res = $conn->query("SELECT * FROM comment c
    JOIN comment cm ON c.id_comment = cm.id_comment
    JOIN user u ON c.id_user = u.id_user
    WHERE cm.id_parrent = $id AND c.ban = 0");
    return $res->fetchAll();


}


function InsertReplayComment($id_parrent,$content){
    if(isset($_SESSION['user'])){


        global $conn;
        $id_user = $_SESSION['user']->id_user;
            $query = "INSERT INTO comment (content,id_user,id_parrent)
            VALUE (:content,:id_user,:id_parrent)";

            
            $content = addslashes($content);
            $stm  = $conn->prepare($query);
            $stm->bindParam(':content',$content);
            $stm->bindParam(':id_user',$id_user);
            $stm->bindParam(':id_parrent',$id_parrent);
            $res = $stm->execute();
            return $res;

    }

}

function InsertNewComment($content,$id_vest){
    if(isset($_SESSION['user'])){



        global $conn;
        $id_user = $_SESSION['user']->id_user;
        $query = "INSERT INTO comment (content,id_user,id_vest)
        VALUE (:content,:id_user,:id_vest)";

        
        $content = addslashes($content);
        $stm  = $conn->prepare($query);
        $stm->bindParam(':content',$content);
        $stm->bindParam(':id_user',$id_user);
        $stm->bindParam(':id_vest',$id_vest);
        $res = $stm->execute();
        return $res;


    }

}



function GetNumberLikesForVest($id){
    global $conn;



    $q="SELECT COUNT(*) AS number FROM user_like 
    WHERE id_vest = $id AND is_liked > 0";



    $res = $conn->query($q);
    return $res->fetch()->number;

}

function InsertUpdateLike($id_userp,$id_vestp){
    global $conn;
    $id_userp = (int)$id_userp;
    $id_vestp = (int)$id_vestp;

    $num = $conn->query("SELECT COUNT(id_user_like) AS number FROM user_like  WHERE id_vest = $id_vestp AND id_user = $id_userp")->fetch()->number;

    if((int)$num>0){
        $status = $conn->query("SELECT is_liked FROM user_like WHERE id_vest = $id_vestp AND id_user = $id_userp")->fetch();
        if($status->is_liked > 0){
            $conn->query("UPDATE user_like SET is_liked = 0 WHERE id_vest = $id_vestp AND id_user = $id_userp ");
        }
        else $conn->query("UPDATE user_like SET is_liked = 1 WHERE id_vest = $id_vestp AND id_user = $id_userp");
    }
    else $conn->query("INSERT INTO user_like (id_user,id_vest,is_liked) VALUES ($id_userp,$id_vestp,true)");
   
}

function IsLiked($id_user_,$id_vest_){
    global $conn;
    $id_user_ = (int)$id_user_;
    $id_vest_ = (int)$id_vest_;

    $num = $conn->query("SELECT COUNT(id_user_like) AS number FROM user_like  WHERE id_vest = $id_vest_ AND id_user = $id_user_ AND is_liked > 0")->fetch()->number;
    if($num == 0) {
        return false;
    }
    return true;
}


function GetAllNews($limit_down,$limit_upper){
    global $conn ;
    $q = "SELECT * FROM vest v
    JOIN image i ON v.id_image = i.id_image
    JOIN category c ON v.id_category = c.id_category
    ORDER BY v.date DESC
    LIMIT $limit_down, $limit_upper";
    return $conn->query($q)->fetchAll();
}

function GetAllUsers(){
    global $conn ;
    $q = "SELECT * FROM user u 
    JOIN role r ON u.id_role = r.id_role";
    return $conn->query($q)->fetchAll();

}

function GetAllRole(){
    global $conn ;
    $q = "SELECT * FROM role";
    return $conn->query($q)->fetchAll();
}

function GetUserForId($id){
    global $conn ;
    $q = "SELECT * FROM user u
    JOIN role r ON u.id_role = r.id_role
   WHERE id_user = $id";
    return $conn->query($q)->fetch();

}

function MoveImage($tmp,$type){
   
    $uploads_dir = 'assets/images/uploaded';
    $ext = explode("/",$type);
    $position = count($ext)-1;
    $name = "slika".time().".".$ext[$position];
    $_SESSION['tmp'] = "$uploads_dir/$name";
    move_uploaded_file($tmp,"../$uploads_dir/$name");
    return $uploads_dir."/".$name;
}

function InsertImage($type,$path,$size,$alt){
    global $conn;
    $type =addslashes($type);
    $path = addslashes($path);
    $size = addslashes($size);
    $alt = addslashes($alt);
    $q = "INSERT INTO image (type,path,size,alt) VALUES(:type,:path,:size,:alt)";
    $stm = $conn->prepare($q);
    $stm->bindParam(":type",$type);
    $stm->bindParam(":path",$path);
    $stm->bindParam(":size",$size);
    $stm->bindParam(":alt",$alt);
    $res = $stm->execute();
    return $res;
}

function InsertNews($title,$desc,$id_image,$id_category,$id_vest_type){
    global $conn;

    $id_author = $_SESSION['user']->id_user;
    $title =addslashes($title);
   
    $desc = addslashes($desc);
    $id_image = (int)$id_image;
    $id_category = (int)$id_category;
    $id_vest_type = (int)$id_vest_type;

    
    $q = "INSERT INTO vest (id_category,id_vest_type,title,description,id_author,id_image) VALUES(:id_category,:id_vest_type,:title,:description,:id_author,:id_image)";
    var_dump($id_category);
    $stm = $conn->prepare($q);
    $stm->bindParam(":id_category",$id_category);
    $stm->bindParam(":id_vest_type",$id_vest_type);
    $stm->bindParam(":title",$title);
    $stm->bindParam(":description",$desc);
    $stm->bindParam(":id_author",$id_author);
    $stm->bindParam(":id_image",$id_image);
    
    $res = $stm->execute();
    return $res;



}

function UpdateNews($title,$desc,$image_id,$category_,$type_,$id){
    global $conn;
    $q= "UPDATE vest SET
    title=:title, description = :description,
    id_image= :id_image, id_category=:id_category, 
    id_vest_type= :id_vest_type
    WHERE id_vest = $id";
    $stm = $conn->prepare($q);
    $stm->bindParam(":title",$title);
    $stm->bindParam(":description",$desc);
    $stm->bindParam(":id_image",$image_id);
    $stm->bindParam(":id_category",$category_);
    $stm->bindParam(":id_vest_type",$type_);
    

    return $stm->execute();


}

function UpdateUser($first_name,$last_name,$email,$favorite_category,$id_role,$active,$id){
    
    
    global $conn;
    $q= "UPDATE user SET
    first_name=:first_name, last_name = :last_name,
    email= :email, favorite_category=:favorite_category, 
    id_role= :id_role,
    active= :active
    WHERE id_user = $id";
    $stm = $conn->prepare($q);
    $stm->bindParam(":first_name",$first_name);
    $stm->bindParam(":last_name",$last_name);
    $stm->bindParam(":email",$email);
    $stm->bindParam(":favorite_category",$favorite_category);
    $stm->bindParam(":id_role",$id_role);
    $stm->bindParam(":active",$active);

    

    return $stm->execute();
}

function SetBanNews($id){
    global $conn;
    $status = $conn->query("SELECT ban FROM vest WHERE id_vest = $id")->fetch()->ban;
    $status = (int)$status;
    if($status > 0){
        $q = "UPDATE vest SET ban = 0 WHERE id_vest = $id";

    }
    else{
        $q = "UPDATE vest SET ban = 1 WHERE id_vest = $id";
    

    }

    
    $res = $conn->query($q);
    return $res;
}

function SetBanComm($id){
    global $conn;
    $status = $conn->query("SELECT ban FROM comment WHERE id_comment = $id")->fetch()->ban;
    $status = (int)$status;
    if($status > 0){
        $q = "UPDATE comment SET ban = 0 WHERE id_comment = $id";

    }
    else{
        $q = "UPDATE comment SET ban = 1 WHERE id_comment = $id";
    

    }

    
    $res = $conn->query($q);
    return $res;
}

function DeleteComment($id){
    global $conn;
    $q = "DELETE FROM comment WHERE id_comment = $id";
    $res = $conn->query($q);
    return $res;
}

function SetBanUser($id){
    global $conn;
    $status = $conn->query("SELECT ban FROM  user WHERE id_user = $id")->fetch()->ban;
    $status = (int)$status;
    if($status > 0){
        $q = "UPDATE user SET ban = 0 WHERE id_user = $id";

    }
    else{
        $q = "UPDATE user SET ban = 1 WHERE id_user = $id";
    

    }

    
    $res = $conn->query($q);
    return $res;
}

/*Questionnaire */
function GetAllQuestionsForQuestionnaire(){

    global $conn;
    $q = "SELECT q.text_questionnaire as text, q.id_question as id FROM question q  ";
    return $conn->query($q)->fetchAll();
}

function is_fill($id_user){
    global $conn;
    $q= "SELECT COUNT(*) as number FROM user_answer_questions
    WHERE id_user = $id_user";
    $res = $conn->query($q)->fetch()->number;
    
    if($res) return true;

    return false;
}

function GetAnswerForQuestion($id){
    if(!is_numeric($id)) exit;

    global $conn;
    $q = "SELECT a.id_answer as id, text_answer as text  FROM answer a 
    JOIN question q ON a.id_question = q.id_question
    WHERE q.id_question = $id";
    return $conn->query($q)->fetchAll();
}

function InsertAnswerToQuestion($answer,$quest){
    #foreach($answer as $e) !is_numeric($e) ? exit: "";
    #foreach($quest as $e) !is_numeric($e) ? exit: "";



    global $conn;
    $q = "INSERT INTO user_answer_questions (id_answer,id_question,id_user) VALUES";
    for($i=0;$i<count($answer);$i++){
        if($i==0) $q.="('".$answer[$i]."','".$quest[$i]."','".$_SESSION['user']->id_user."')";
        else $q.=",('".$answer[$i]."','".$quest[$i]."','".$_SESSION['user']->id_user."')";
    }
    
    return $conn->query($q);

}




function GetAllQuestionsAnswer(){
    global $conn;
    $q = "SELECT q.text_questionnaire, q.id_question, a.text_answer, COUNT(*) as number FROM user_answer_questions ua 
    JOIN question q ON ua.id_question=q.id_question
    JOIN answer a ON ua.id_answer = a.id_answer
    GROUP BY  q.text_questionnaire, q.id_question, a.text_answer";
    return $conn->query($q)->fetchAll();
}


function GetNumberOfAllNews(){
    global $conn;
    $q = "SELECT COUNT(*) as number FROM vest";
    return $conn->query($q)->fetch()->number;
}