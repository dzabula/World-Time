<?php


if(!isset($_SESSION['user'])){
 


    exit;
}
if($_SESSION['user']->id_role != 3){
    header("Location: index.php");
    exit; 
}


    
    $id = $_GET['id'];
    $comments = GetAllCommentForUsers($id);
    $user = GetUserForId($id);










?>










<script>
    window.onload = () =>{
    
        $(".ban").click(function(){
            console.log($(this).attr("id-ban"))
            SendBan($(this).attr("id-ban"))
        
        });


        $(".del").click(function(){SendDel($(this).attr("id-del"))});

        $(".more-text").click(function(){
            
            let text = $(this).parent().attr("data-content");
            ShowMoreText(text);
        })
       
    }

    function SendBan(id){
       
        $.ajax({
            method:"post",
            url:"models/set-ban-comment.php",
            dataType:"json",
            data:{
                "id":id
            },
            success:function(response){
           
                let txt = $("#"+id+" td:nth-child(6)").text();
                if(txt == "Yes" ){
                    $("#"+id+" td:nth-child(6)").text("No");
                }
                else{
                    $("#"+id+" td:nth-child(6)").text("Yes");

                }
            },
            error:function(xhr){
                alert(xhr.responseText)
                
            }
        })


    }

    function SendDel(id){
       
       $.ajax({
           method:"post",
           url:"models/del-comment.php",
           dataType:"json",
           data:{
               "id":id
           },
           success:function(){
              $("#"+id).remove();
              
           },
           error:function(xhr){
            $("#"+id).remove();
               
           }
       })


   }

   function ShowMoreText(text){

        $("#text-filed").text(text);
        $("#sucess-registration").fadeIn("slow");
        $("#sucess-registration").css("display","flex");


      
        
   }
   function CloseModal(){

        
        $("#sucess-registration").fadeOut("slow");
        $("#sucess-registration").css("display","flex");

    


        }



</script>





<style>
    button{
        color: aliceblue !important;
    }
    .content{
        word-break: break-all;
    }
    .more-text{
        cursor: pointer;
    }
    #sucess-registration{
        position: fixed;
        top:100px;
        width: 80%;
        z-index: 999;
        word-break: break-all;
        display: none;

    }
    
    @media only screen and (max-width: 790px) {
        .content{
                word-break: normal;
            }
            #table{
                overflow-x:auto !important;
                
            }


    }




</style>




<div id="table">
<table class="table table-striped table-hover">
                            

                                <?php if(count($comments) == 0):?>

                                   <h2 class="text-center py-5">There are no comments for this post</h2>
                                
                                <?php else:?>
                                    <h2 class="text-center py-5">Comments from <?=$user->first_name. " ". $user->last_name ."  (id: ".$user->id_user."  role:  ".$user->name.")"?></h2>
                                    <thead>
                                    <tr>
                                    <th scope="col">Id Comment</th>
                                    <th scope="col">Id Post</th>
                                    <th scope="col">Text</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type Comment</th>

                                    <th scope="col">Ban</th>
                                    <th scope="col">Ban/ReBan</th>
                                    <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach($comments as $el):?>

                                   
                                
                                    <tr id="<?=$el->id_comment?>">
                                        <th scope="row"><?=$el->id_comment?></th>
                                        <td><?=$el->id_vest?></td>
                                        <td class="content" data-content = "<?=$el->content?>">
                                        <span class="more-text">
                                        <?php 
                                        if (strlen($el->content) > 160) {
                                                    echo substr($el->content, 0, 80) . '...Click for more';
                                                } else {
                                                    echo $el->content;
                                                }
                                        ?>
                                        </span>

                                        </td>
                                        <td><?=$el->date_comment?></td>
                                        <td><?php echo $el->id_parrent ? "Replay comment" : "Comment" ?></td>
                                        <td><?php echo $el->ban ? "Yes" : "No"?></td>
                                        <td><button id-ban="<?=$el->id_comment?>" class="ban btn bg-danger">Ban/ReBan</button></td>
                                        <td><button id-del="<?=$el->id_comment?>" class=" del btn bg-danger">Delete</button></td>
                                    </tr>

                                    <?php
                                     endforeach ;
                                endif?>
                                
                            </tbody>
                        </table>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <div id="sucess-registration" class="w-100  justify-content-center">
            <div id="modal" class="col-10">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> More text</h5>
                    <button type="button" id="success-close" onclick="CloseModal()" ><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                    <p class="fs-4" id="text-filed"></p>
                    </div>

                </div>
                </div>
            </div>
        </div>
        </div>
