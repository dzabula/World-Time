<?php

if(!isset($_SESSION['user'])){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";

    exit;
}
if($_SESSION['user']->id_role != 3){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    //header("Location: index.php");
    exit; 
}







?>

<script>
    var ajaxPost = false;
    var ajaxUsers =false;
    var ajaxQuestions = false
    var numberOfPost;
   $(document).ready(function(){

        $("#btn-posts").click(function(){

            if(!ajaxPost){
                $.ajax({
                    method:"get",
                    url:"models/get-number-of-all-posts.php",
                    dataType:"json",
                
                    success:function(response){

                       numberOfPost = parseInt(JSON.parse(response))/10;
                       
                    },
                    error: function(xhr){
                        alert("Doslo je do greske");
                    }
                })

                $.ajax({
                    method:"post",
                    url:"models/get-all-posts.php",
                    dataType:"json",
                    data:{
                        limit_down:0,
                        limit_upper:10,
                    },
                    success:function(response){

                        
                        WirteAllPost(response);
                        
                        WritePagination();

                        $("#1-page").css("background","blue");
                        
                        $("#posts").fadeIn("fast")

                        $(".page").click(function(){


                            $(".page").each(function(){
                                $(this).css("background","#c2c2c2");
                            })



                            $(this).css("background","blue");
                            let id = parseInt($(this).attr("id").substring(0,1));
                            let downMargin = id*10-10;
                            let upperMargin = id*10;
                            $.ajax({
                                method:"post",
                                url:"models/get-all-posts.php",
                                dataType:"json",
                                data:{
                                    limit_down:downMargin,
                                    limit_upper:upperMargin,
                                },
                                success:function(response){
                                    WirteAllPost(response);
                                },
                                error: function(){
                                    alert("Doslo je do greske");
                                }

                            })
                        })



                    },
                    error: function(xhr){
                        alert("Doslo je do greske");
                    }


                })
                ajaxPost = true;
            
            }





            $("#posts").toggle("slow");
        })

        $("#search-post").click(function(){
                let str = $("#search-text-post").val();
                $.ajax({
                    method:"post",
                    url:"models/get-serach-posts.php",
                    dataType:"json",
                    data:{
                        "string":str
                    },
                    success:function(response){
                        WirteAllPost(response);
                        
                    },
                    error: function(xhr){
                        alert("Doslo je od greske");
                    }


                })
                
            
        })

        $("#get-all-post").click(function(){

            $.ajax({
                    method:"post",
                    url:"models/get-all-posts.php",
                    dataType:"json",
                    data:{
                        limit_down:0,
                        limit_upper:10,
                    },
                    success:function(response){
                        WirteAllPost(response);

                    },
                    error: function(xhr){
                        alert("Doslo je do greske");
                    }


                })
                $("#1-page").css("background","blue");
           
        })

        $("#btn-questions").click(function(){
            if(!ajaxQuestions){
                $.ajax({
                    method:"get",
                    url:"models/get-questions-anser.php",
                    dataType:"json",
                    
                    success:function(response){
                            WriteAllQuestionsAnser(response);
                    },
                    error:function(xhr){
                        console.log("Doslo je do greske, pokusajt opet")
                    }

                })

                ajaxQuestions =false;
            }
        })




        $("#btn-users").click(function(){

            if(!ajaxUsers){
                $.ajax({
                    method:"get",
                    url:"models/get-all-users.php",
                    dataType:"json",
                    success:function(response){
                        WirteAllUsers(response);
                    },
                    error: function(xhr){
                        alert(xhr.responseText);
                    }


                })
                ajaxUsers = true;
            }
        
        
            $("#users").toggle("slow");
        
        
        
        
        })

        $("#search-user").click(function(){
                let str = $("#search-text-user").val();
                $.ajax({
                    method:"post",
                    url:"models/get-serach-user.php",
                    dataType:"json",
                    data:{
                        "string":str
                    },
                    success:function(response){
                        WirteAllUsers(response);
                        
                    },
                    error: function(xhr){
                        alert(xhr.responseText);
                    }


                })
                
            
        })

        $("#get-all-user").click(function(){

            $.ajax({
                    method:"get",
                    url:"models/get-all-users.php",
                    dataType:"json",
                    success:function(response){
                        WirteAllUsers(response);

                    },
                    error: function(xhr){
                        alert(xhr.responseText);
                    }


                })

        })
      
        $("#btn-questions").click(function(){

            $("#questions").toggle("fast");
        
        })


        $("#btn-insert").click(function(){

            $("#insert").toggle("fast");
        })
    })



    function WirteAllPost(response){

        html="";
        
        let k = 0;
        response.forEach(el=>{
            if(k<10){
            html+=`
            
                <tr id="${el.id_vest}">
                    <th scope="row">${el.id_vest}</th>
                    <td><img src="${el.path}" alt="${el.alt}" class="w-200"/></td>
                    <td>${el.title}</td>
                    <td>${el.name}</td>
                    <td>${el.date}</td>
                    <td id="ban-post-${el.id_vest}">${el.ban ? "Yes" : "No" }</td>
                    <td><a href ="index.php?pages=comments&id=${el.id_vest}" id="com-${el.id_vest}" class="btn bg-info ">Comments</a></td>
                    <td><a href ="index.php?pages=editPost&id=${el.id_vest}" id="edi-${el.id_vest}" class="btn bg-warning ">Edit</button></td>
                    <td><button id="del-${el.id_vest}" class="ban btn bg-danger" onclick="SendBanPost(${el.id_vest})">Ban</button></td>
                </tr>
            
            
            `
            }
            k++;
        })

        $("#posts div table tbody").html(html);

        

    }

    function WritePagination(){
        html="";
        
      
        for(let i =0;i<numberOfPost;i++){
                       
            html+=` <button id="${i+1}-page" class="page btn  p-1">${i+1}</button>`
        }
        $("#pages").html(html);
    }

    function WirteAllUsers(response){
        html="";
        response.forEach(el=>{
            html+=`
            
                <tr id="${el.id_user}">
                    <th scope="row">${el.id_user}</th>
                    <td>${el.first_name} ${el.last_name}</td>
                    <td>${el.email}</td>
                    <td>${el.name}</td>
                    <td>${el.active ? "No" : "Yes"}</td>
                    <td id="ban-user-${el.id_user}">${el.ban ? "Yes" : "No"}</td>
                    <td>${el.date_created}</td>
                    <td><a href="index.php?pages=comments-user&id=${el.id_user}" id="com-${el.id_user}" class="btn bg-info ">Comments</a></td>
                    <td><a href="index.php?pages=editUser&id=${el.id_user}" id="edi-${el.id_user}" class="btn bg-warning ">Edit</button></td>
                    <td><button id-del="${el.id_user}" class="ban-user btn bg-danger " onclick = "SendBanUser(${el.id_user})" >Ban</button></td>
                </tr>
            
            
            `
        })
        

        $("#users div table tbody").html(html);
        



    }

    function WriteAllQuestionsAnser(response){
        var idQuestions = [];
        html="";
        response.forEach(el=>{
         
            let boolian = idQuestions.includes(el.id_question)

            if(boolian){
                html+=`
                <tr id="${el.id_user_anser_questions}">
                  
                    
                  
                  <td  class="col-6 col-md-3">${el.text_answer}</td>
                  <td  class="col-6 col-md-3" >${el.number}</td>
                  
                </tr>`;
            }else{
                let num = response.filter(x=> x.id_question == el.id_question).length;
  
                html+=`
                <tr id="${el.id_user_anser_questions}">
                  
                    
                  <td rowspan="${num}" class="col-6 col-md-3">${el.text_questionnaire}</td>
                  <td  class="col-6 col-md-3">${el.text_answer}</td>
                  <td  class="col-6 col-md-3" >${el.number}</td>
                  
                </tr>`;
            }
            

            idQuestions.push(el.id_question);
           
        })

        $("#questions div table tbody").html(html); 
    }


    function SendBanPost(id){
        $.ajax({
            method:"post",
            url:"models/ban-post.php",
            dataType:"json",
            data:{
                "id":id
            },
            success:function(response){
                let txt = $("#ban-post-"+id).text();
                if(txt == "Yes" ){
                    $("#ban-post-"+id).text("No");
                }
                else{
                    $("#ban-post-"+id).text("Yes");

                }
            },
            error:function(xhr){
                console.log(xhr)
            }
        })
    }

    function SendBanUser(id){
        $.ajax({
            method:"post",
            url:"models/ban-user.php",
            dataType:"json",
            data:{
                "id":id
            },
            success:function(response){
                let txt = $("#ban-user-"+id).text();
                if(txt == "Yes" ){
                    $("#ban-user-"+id).text("No");
                }
                else{
                    $("#ban-user-"+id).text("Yes");

                }
            },
            error:function(xhr){
                console.log(xhr)
            }
        })
    }




</script>


<style>
    td>button{
        color: white !important;
    }
    .w-200{
        width: 200px !important;
    }
    #posts, #users, #questions{
        display: none;
        overflow-x: auto;
    }
    #questions{
        word-break: normal;
    }
    .page{
        width: 50px;
        background-color: #c2c2c2;
        color:white;
    }
</style>

<div class="content-wrapper col-md-12">
          <div class="container-lg px-0">
            <div class="col-sm-12 px-0">
              <div class="card" data-aos="fade-up">
                <div class="card-body p-2">
                <h1 class="text-center mb-5">Admin Panel</h1>


                <section id="post-section">

                
                    <div class="d-flex justify-content-center py-3">
                        <button id="btn-posts" class="btn btn-primary w-75">
                            Posts
                        </button>
                    </div>
                    <div id="posts">
                        <div class="card card-body ">
                            <div class=" container-lg">
                                <input type="text" name ="search_text_post" id="search-text-post" class="py-1 col-12 col-md-5 mb-4" placeholder="Search posts by title"/>
                                <button id="search-post" name="search_post" class="btn btn-primary p-2 col-12 col-md-3 mb-2">Search</button>
                                <button id="get-all-post" name="get_all_post" class="btn btn-primary p-2 col-12 col-md-3 mb-2">Get All</button>

                            </div>    
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Date</th>
                                <th scope="col">Ban</th>

                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                        <div id="pages">

                        </div>






                        </div>
                    </div>

                </section>


                <section id="user-section">

                
                    <div class="d-flex justify-content-center py-3">
                        <button id="btn-users" class="btn btn-primary w-75">
                            Users
                        </button>
                    </div>
                    <div id="users">
                        <div class="card card-body ">

                            <div class="form-control container">
                                    <input type="text" name ="search_text_user" id="search-text-user" class="py-1 col-6" placeholder="Search user by name"/>
                                    <button id="search-user" name="search_user" class="btn btn-primary p-2">Search</button>
                                    <button id="get-all-user" name="get_all_user" class="btn btn-primary p-2">Get All</button>
                            </div> 
                            
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Ban</th>
                                    <th scope="col">Date Created</th>


                                    <th scope="col">His Comm</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Ban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>


                <section id="insert-section">

                
                    <div class="d-flex justify-content-center py-3">
                        <a href = "index.php?pages=insertPost" id="btn-insert" class="btn btn-primary w-75" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Insert new post
                        </a>
                    </div>
                    <div id="insert">
                        <div class="card card-body ">
                            
                            
                        </div>
                    </div>

                </section>
                <section id="questions-section">
                    <div class="d-flex justify-content-center py-3">
                            <button id="btn-questions" class="btn btn-primary w-75">
                                Questions
                            </button>
                        </div>
                    <div id="questions">
                            <div class="card card-body ">


                                
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Number answers</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </section>

                














                </div>
              </div>
            </div>
          </div>
</div>

