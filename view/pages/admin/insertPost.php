<?php
if(!isset($_SESSION['user'])){

    exit;
}
if($_SESSION['user']->id_role != 3 && $_SESSION['user']->id_role != 2 ){

    exit; 
}


    $category = GetCategory();
    $type = GetTypeOfVest();







?>

<script>
    $(document).ready(function(){
        $("form").submit(function(evt){
            let i = 0;
            if($("#category").val()==0 ){
                 alert ("Izaberite kategoriju");
                i++;    
                
            }

            if($("#news-type").val() == 0){
                i++;    
                 alert ("Izaberite tip objave");
            }
            if($("#title").val().length < 3 ){
                i++;    
                 alert("Unesite naslov (min 3 characters)");
            
            }
            
            if($("#desc").val().length < 50 ){
                i++;    
                 alert("Unesite Opis objave (min 50 characters)");
            
            }
            
            if($("#file").val() == "" ){
                i++;    
                 alert("Upload-ujte sliku");
            
            }
            if($("#alt").val()< 3 ){
                i++;    
                 alert("Unesite opis slike (min 3 characters)");
            }
            if(i>0){
                 evt.preventDefault();
            }
            

        })
    })

</script>




<div class="content-wrapper col-md-12 px-0">
          <div class="container-lg px-0">
            <div class="col-sm-12 px-0">
              <div class="card " data-aos="fade-up">
                <div class="card-body p-2">
                <h1 class="text-center mb-5">Insert new post</h1>

                <section>
                <form   enctype="multipart/form-data" class="row g-3" method="post" action="models/insertPost-m.php">

                    <div class="col-12 mt-5">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name ="title" class="form-control" id="title" placeholder="Title..."/>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="category" class="form-label">Category</label><br/>
                        <select id="category" name="category" class="form-select col-md-5 col-8">
                        <option value = "0" class ="w-50" selected>Choose Category...</option>
                        <?php foreach($category as $el){
                        if($el->name == "Health_care"){
                            echo ("<option value=".$el->id_category.">Health Care</option>");
    
                            }else{
                                echo ("<option value=".$el->id_category.">".$el->name."</option>");
                            }
                        }?>
                        </select>
                    </div>
                    
                    <div class="col-12 mt-5">
                        <label for="news-type" class="form-label">News type</label><br/>
                        <select id="news-type" name="type" class="form-select col-md-5 col-8">
                        <option value="0" selected>Choose Type...</option>
                        <?php foreach($type as $el){
                        echo ("<option value=".$el->id_vest_type.">".$el->name."</option>");
                        }?>
                        </select>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="desc" class="form-label">Description</label>
                        <textarea  name ="desc"class="form-control" id="desc"/></textarea>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="file" class="form-label">Choose File</label><br/>
                        <input type="file" id="file" name="image" /><br/  > <input class="col-4 mt-2" type="text" name="alt" id="alt" placeholder="Image description..."/>
                    </div>
                    <div class="w-100 d-flex justify-content-center">
                        <div>
                        <input type="submit" name="submit" class ="btn btn-primary mt-5"id="submit"/>
                        </div>
                    </div>


                </form>


                </section>


                


                














                </div>
              </div>
            </div>
          </div>
</div>