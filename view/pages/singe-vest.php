<?php

    $id = $_GET["id"];
    $vest = GetNewsForID($id);
    $description = $vest->description;
    $comments = GetCommentForVest($id);
    if(isset($_SESSION['user'])){
    $is_liked = IsLiked($_SESSION['user']->id_user,$id);
    }
    else{
      $is_liked = false;
    }
    $number_of_likes = GetNumberLikesForVest($id);


?>
<script type="text/javascript">

    var id_user = null;
    
    var toggle= false;
    setTimeout(function(){
       id_user = $("#like").attr("id_user");
     
         if(id_user == undefined) id_user = null;
        $('.btn-counter').on('click', function(event, count) {
        event.preventDefault();
        
        var $this = $(this),
            count = $this.attr('data-count'),
            active = $this.hasClass('active'),
            multiple = $this.hasClass('multiple-count');
        
        $.fn.noop = $.noop;





        if(id_user != null){
           
         
        
        <?php 
          if(!$is_liked){
            echo("
            \$this.attr('data-count', ! active || multiple ? ++count : --count  )[multiple ? 'noop' : 'toggleClass']('active');
          ! active || multiple ? \$this.css('background-color','red') : \$this.css('background-color','#c2c2c2');
            
            "); 
          }
          else{
          echo(" \$this.attr('data-count', ! active || multiple ? --count : ++count  )[multiple ? 'noop' : 'toggleClass']('active');
          ! active || multiple ? \$this.css('background-color','#c2c2c2') : \$this.css('background-color','red');
            document.getElementById('like').classList.remove('bg-danger');  
          
          ");
        
          } 
        ?>


        }

        });

        

        textarea = $(".autoresizing");

        textarea.each(function(){
          $(this).on('input', autoResize, false);
        })
      
        

        $(".sub").click(function(){
          var id = $(this).attr("id").substring(4,);
            var content = $("#area-"+id).val();
            $("#area-"+id).val("Replay to comment...");
            if(content == null) return;
            if(content.length == 0) return;
            $.ajax({
              method:"post",
              url:"models/insert-sub-comment.php",
              dataType:"json",
              data:{
                "idForComment":id,
                "content":content
              },
              success:function(result){
                
                  WriteSubComment(result,id);
                 

              },
              error:function(xhr){
                alert(xhr.responseText);
              }         
            })
            

        })


        





        $("#like").click(function(){
         let id_vest = $("#like").attr("id_vest");
         

         if(id_user == null ){
           alert("Morate se ulogavti da bi ste oznacili da vam se svidja objava.");
         }else{
            $.ajax({
              method:"post",
              url:"models/insert-update-like.php",
              dataType:"json",
              data:{
                "id_vest": id_vest,
                "id_user" : id_user
              },
              success:function(response){
                console.log("uspelo je lajkovanje")


              },
              error:function(xhr){
                alert("Morate biti ulogovani da bi se vas like sacuvao");
              }
            })
          }
        })


        function WriteSubComment(result,id){
            
            html =`
            <div class="d-flex justify-content-end">
                              <div class="comment-box from border border-3 col-10 p-2 mt-2">
                                <div class="d-flex align-items-center">
                                  <div class="">
                                    <img
                                      src="assets/images/user/user.png"
                                      alt="user image"
                                      class="w-60px rounded-circle"
                                    />
                                  </div>
                                  <div>
                                    <p class="fs-12 mb-1 line-height-xs">
                                      ${result.date}
                                    </p>
                                    <p
                                      class="fs-16 font-weight-600 mb-0 line-height-xs"
                                    >
                                     ${result.first_name} ${result.last_name} ${result.id_role == 3 ? "<span class='color-red font-12px'>Admin</span>" : ""}
                                    </p>
                                  </div>
                                </div>

                                <p class="fs-12 mt-3">
                                  ${result.content}
                                </p>

                              </div>
              </div>
            
            
            
            `


            $("#area-"+id).parent().parent().parent().before(html)


        }


        $("#btn-add-comment").click(function(){
          var content = $("#new-comment").val();
          $("#new-comment").val("");
          var idVest = $("#id-vest").val();
          $.ajax({
            method:"post",
            url:"models/insert-new-comment.php",
            dataType:"json",
            data:{
              "content":content,
              "id_vest":idVest
            },
            success:function(result){
              WriteNewComment(result);
            },
            error:function(xhr,mess){
              alert(JSON.stringify(xhr.responseText))
            }
          })
        })


        function WriteNewComment(result){
          html =`

          <div class="comment-box from border border-3  p-2 mt-5 mb-2" >
                           <div class="d-flex align-items-center">
                            <div class="">
                              <img
                                src="assets/images/user/user.png"
                                alt="user image"
                                class="w-80px rounded-circle"
                                  />
                             </div>
                            <div>
                              <p class="fs-12 mb-1 line-height-xs">
                                ${result.date}
                              </p>
                              <p
                                class="fs-16 font-weight-600 mb-0 line-height-xs"
                              >
                                ${result.first_name} ${result.last_name}  ${result.id_role == 3 ? "<span class='color-red font-12px'>Admin</span>" : ""}
                              </p>
                            </div>
                          </div>
                          <p class="fs-12 mt-3">
                           ${result.content}
                          </p>

                        </div>
                        <div class="d-flex justify-content-end mt-2">
                            <div class="col-10">
                              


                              <div class="relative">
                              <textarea id="area-${result.id_comment}" name="replay" class="w-100 relative autoresizing border-0 border-bottom"  placeholder="Replay to comment...">Replay to comment...</textarea>
                              <button id="btn-${result.id_comment}" class="rounded-circle p-1 sub"  name="sub"><img src="assets/images/send-message.png" class="w-20px" alt="send message ico" onclick="SendSubComment(${result.id_comment})"/></button>
                             
                              </div>



                              



                            </div>
                          </div>`
          
          
          
        
          $("#all-coments").append(html)
          alert("Komentar je postavljen.")



        }





        function autoResize() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        }




       


    },500);
    function WriteSubComment(result,id){
            
            html =`
            <div class="d-flex justify-content-end">
                              <div class="comment-box from border border-3 col-10 p-2 mt-2">
                                <div class="d-flex align-items-center">
                                  <div class="">
                                    <img
                                      src="assets/images/user/user.png"
                                      alt="user image"
                                      class="w-60px rounded-circle"
                                    />
                                  </div>
                                  <div>
                                    <p class="fs-12 mb-1 line-height-xs">
                                      ${result.date}
                                    </p>
                                    <p
                                      class="fs-16 font-weight-600 mb-0 line-height-xs"
                                    >
                                     ${result.first_name} ${result.last_name} ${result.id_role == 3 ? "<span class='color-red font-12px'>Admin</span>" : ""}
                                    </p>
                                  </div>
                                </div>

                                <p class="fs-12 mt-3">
                                  ${result.content}
                                </p>

                              </div>
              </div>
            
            
            
            `


            $("#area-"+id).parent().parent().parent().before(html)


        }
    function SendSubComment(id){
          console.log(id);
          var content = $("#area-"+id).val();
          $("#area-"+id).val("Replay to comment...");
          if(content == null) return;
          if(content.length == 0) return;
          $.ajax({
            method:"post",
            url:"models/insert-sub-comment.php",
            dataType:"json",
            data:{
              "idForComment":id,
              "content":content
            },
            success:function(result){
              
                WriteSubComment(result,id);
               

            },
            error:function(xhr){
              alert(xhr.responseText);
            }         
          })
      }
    
</script>



<style type="text/css">
    .font-20{
        font-size: 20px !important;
    }
    .link-blue{
        color: #032a63 !important;
    }
    p { padding-left: 10px; }
    #new-comment{
      width: 80%;
    }

    .autoresizing {
            display: block;
            overflow: hidden;
            resize: none;
        }

    /*
    * Basic button style
    */
    .btn {
    box-shadow: 1px 1px 0 rgba(255,255,255,0.5) inset;
    border-radius: 3px;
    border: 1px solid;
    display: inline-block;
    height: 18px;
    line-height: 18px;
    padding: 15px 25px;
    position: relative;

    font-size: 12px;
    text-decoration: none;
    text-shadow: 0 1px 0 rgba(255,255,255,0.5);
    }
    /*
    * Counter button style
    */
    .btn-counter { margin-right: 39px; }
    .btn-counter:after,
    .btn-counter:hover:after { text-shadow: none; }
    .btn-counter:after {
    border-radius: 3px;
    border: 1px solid #d3d3d3;
    background-color: #eee;
    padding: 4px 8px;
    color: #777;
    content: attr(data-count);
    left: 100%;
    margin-left: 8px;
    margin-right: -13px;
    position: absolute;
    top: -1px;
    }
    .btn-counter:before {
    transform: rotate(45deg);
    filter: progid:DXImageTransform.Microsoft.Matrix(M11=0.7071067811865476, M12=-0.7071067811865475, M21=0.7071067811865475, M22=0.7071067811865476, sizingMethod='auto expand');

    background-color: #eee;
    border: 1px solid #d3d3d3;
    border-right: 0;
    border-top: 0;
    content: '';
    position: absolute;
    right: -13px;
    top: 5px;
    height: 6px;
    width: 6px;
    z-index: 1;
    zoom: 1;
    }
    /*
    * Custom styles
    */
    .btn {
    background-color: #dbdbdb;
    border-color: #bbb;
    color: #666;
    }
    .btn:hover,
    .btn.active {
    text-shadow: 0 1px 0 #b12f27;
    background-color: #f64136;
    border-color: #b12f27;
    }
    .btn:active { box-shadow: 0 0 5px 3px rgba(0,0,0,0.2) inset; }
    .btn span { color: #f64136; }
    .btn:hover, .btn:hover span,
    .btn.active, .btn.active span { color: #eeeeee; }
    .btn:active span {
    color: #b12f27;
    text-shadow: 0 1px 0 rgba(255,255,255,0.3);
    }
    @media only screen and (max-width: 600px) {
    .font-20 {
        font-size: 16px !important;
    }
    .card-body{
        padding: 5px !important;
    }


    }
    #like{
        width: 100px !important;
      
    }
    .sub{
      position: absolute;
      right:5px;
      bottom: 5px;
    }
    .autoresizing{
      border-top:0px !important;
      border-right:0px !important;
      border-left:0px !important;
      border-bottom: 1px solid #c2c2c2 !important;
    }
    .red-color{
      color: #b12f27 !important;
    }
    .font-12px{
      font-size: 12px  !important;
    }
    .link{
      color:#fff;
    }
    .relative{
      position: relative;
    }
    .w-80px{
      width: 60px !important;
    }
    .w-60px {
      width: 40px !important;
    }
    .w-20px{
      width: 20px !important;
    }
    <?php ?>

</style>

<div class="content-wrapper col-md-12">
          <div class="container">
            <div class="col-sm-12 px-0">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                            <a href = "#"><img
                              src="<?=$vest->path?>"
                              alt="<?=$vest->alt?>"
                              class="img-fluid"
                            /></a>
                          </div>
                          <p class="fs-16 font-weight-600 mb-0 mt-3 fs-1">
                                <a href="#" class="link-blue fs-1 link-blue font-20"><?=$vest->title?></a>
                          </p>
                          <p class="fs-13 text-muted mb-0">
                           <span class="mr-2"><?=$vest->date?></span>
                          </p>
                    </div>
                </div>
                <div class="container d-flex justify-content-end">
                    <p class="mt-3">
                        <button id="like" id_vest = "<?=$vest->id_vest?>" id_user="<?php if(isset($_SESSION['user'])){ echo($_SESSION['user']->id_user);}else echo "null"   ?> "  title="Love it" class="btn btn-counter d-flex align-items-center justify-content-center <?php if($is_liked) echo "bg-danger"?>" data-count="<?=$number_of_likes?>"><span>&#x2764;</span></button>
                        
                    </p>


                </div>
                <div class="container mt-4">
                    <?php
                       /* function get_page($text, $page_index, $line_length=76, $page_length=40){
    
                            $lines = explode("\n", wordwrap($text, $line_length, "\n"));
                            $page_lines = array_slice($lines, $page_index*$page_length, $page_length);
                            return implode("\n", $page_lines);
                        }
                        
                        $line_length = 70;
                        $lines_per_page=50;
                        $page = 2;
                        $longtext= $description;
                        
                        $page_text = get_page($longtext, $page-1, $line_length, $lines_per_page);
                        var_dump($page_text);
                        */
                        // Mozda se posle iskoristi
                    
                        for($t = 0;$t<100;$t++){
                            echo $description;
                        }



                    
                    ?>
                    




                </div>
                <div class="post-comment-section pb-5" id="comment-section">
                        <h3 class="font-weight-600">Comments <span> <?=count($comments)?></span></h3>

                        <div id="all-coments">

                        <?php foreach($comments as $comment):?>

                          <div id="<?=$comment->id_comment?>">

                            <div class="comment-box from border border-3  p-2 mt-5 mb-2" >
                              <div class="d-flex align-items-center">
                                <div class="">
                                  <img
                                    src="assets/images/user/user.png"
                                    alt="user image"
                                    class="w-80px rounded-circle"
                                  />
                                </div>
                                <div>
                                  <p class="fs-12 mb-1 line-height-xs">
                                    <?=$comment->date_comment?>
                                  </p>
                                  <p
                                    class="fs-16 font-weight-600 mb-0 line-height-xs"
                                  >
                                    <?=$comment->first_name." ".$comment->last_name?>  <?php if($comment->id_role==3) echo "<span class='red-color font-12px' >Admin</span>"  ?>
                                  </p>
                                </div>
                              </div>

                              <p class="fs-12 mt-3">
                                <?=$comment->content?>
                              </p>

                            </div>

                          <?php
                          
                          $childrens = GetChildComment($comment->id_comment);
                          if(count($childrens)>0):
                            foreach($childrens as $child):
                          
                          ?>


                            <div class="d-flex justify-content-end">
                              <div class="comment-box from border border-3 col-10 p-2 mt-2">
                                <div class="d-flex align-items-center">
                                  <div class="">
                                    <img
                                      src="assets/images/user/user.png"
                                      alt="user image"
                                      class="w-60px rounded-circle"
                                    />
                                  </div>
                                  <div>
                                    <p class="fs-12 mb-1 line-height-xs">
                                      <?=$child->date_comment?>
                                    </p>
                                    <p
                                      class="fs-16 font-weight-600 mb-0 line-height-xs"
                                    >
                                      <?=$child->first_name." ".$child->last_name?> <?php if($child->id_role==3) echo "<span class='red-color font-12px' >Admin</span>"?>
                                    </p>
                                  </div>
                                </div>

                                <p class="fs-12 mt-3">
                                  <?=$child->content?>
                                </p>

                              </div>
                            </div>

                          <?php endforeach?>




                          <?php endif?>
                          <div class="d-flex justify-content-end mt-2">
                            <div class="col-10">
                              


                              <div class="relative">
                              <textarea id="area-<?=$comment->id_comment?>" name="replay" class="w-100 relative autoresizing border-0 border-bottom"  placeholder="Replay to comment...">Replay to comment...</textarea>
                              <button id="btn-<?=$comment->id_comment?>" class="rounded-circle p-1 sub"  name="sub"><img src="assets/images/send-message.png" class="w-20px" alt="send message ico"/></button>
                             
                              </div>



                              



                            </div>
                          </div>
                      
                          </div>
                        <?php endforeach?>
                        </div>
                        <div id="add-comment" class="mt-5 pt-5">
                          <div class="row justify-content-center">
                            <h5 class="text-center">Add a comment <span class="font-12px">(max 2000 characters)</span></h5>
                          </div>
                          <div class="row justify-content-center">
                              <textarea name="new_comment" id="new-comment" class="p-1" cols="" rows="20"></textarea>
                          </div>
                              <input type="hidden" id="id-vest" name="id-vest" value="<?=$_GET['id']?>">


                          <div class="row justify-content-center">
                              <button id="btn-add-comment" class="p-2 mt-2 btn-primary">Post Comment</button>
                          </div>


                        </div>





                  </div>


              </div>








            </div>
        </div>
        </div>
        </div>
</div>
