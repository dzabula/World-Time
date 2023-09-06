<?php 
if(!isset($_SESSION['user'])){



    exit;
}
if($_SESSION['user']->id_role != 3){

    exit; 
}



    $id = $_GET['id'];
    $news = GetNewsForIDWhitBan($id);
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
            if($("#title").val().length < 4 ){
                i++;    
                 alert("Unesite naslov (min 3 characters)");
            
            }
            
            if($("#desc").text().length < 4 ){
                i++;    
                 alert("Unesite Opis objave (min 50 characters)");
            
            }
  
            if($("#file").val() == "" && !$("#keep").prop("checked") ){
                i++;    
                 alert("Upload-ujte sliku");
            
            }
            if($("#alt").val()<4 ){
                i++;    
                 alert("Unesite opis slike (min 3 characters)");
            }
            if(i>0){
                 return evt.preventDefault();
            }
            

        })
    })

</script>

<style>
    .w-200{
        width: 200px;
    }
</style>


<div class="content-wrapper col-md-12">
          <div class="container-lg px-0">
            <div class="col-sm-12 px-0">
              <div class="card" data-aos="fade-up">
                <div class="card-body p-2">
                <h1 class="text-center mb-5">Edit post</h1>

                <section>
                <form   enctype="multipart/form-data" class="row g-3" method="post" action="models/updatePost-m.php">

                    <div class="col-12 mt-5">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name ="title" class="form-control" id="title" placeholder="Title..." value="<?=$news->title?>"/>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="category" class="form-label">Category</label><br/>
                        <select id="category" name="category" class="form-select col-md-5 col-8">
                    
                        <?php foreach($category as $el){

                        if($el->id_category == $news->id_category){
                            echo ("<option value=".$el->id_category." selected>".$el->name."</option>");
                        }
                        else{
                            echo ("<option value=".$el->id_category.">".$el->name."</option>");
                        }
                        }?>
                        </select>
                    </div>
                    
                    <div class="col-12 mt-5">
                        <label for="news-type" class="form-label">News type</label><br/>
                        <select id="news-type" name="type" class="form-select col-md-5 col-8">
                        
                        <?php foreach($type as $el){
                        
                        if($el->id_vest_type == $news->id_vest_type){
                            echo ("<option value=".$el->id_vest_type." selected>".$el->name."</option>");
                        }
                        else{
                            echo ("<option value=".$el->id_vest_type.">".$el->name."</option>");
                        }
                        }?>

                        </select>
                    </div>

                    <div class="col-12 mt-5">
                        <label for="desc" class="form-label">Description</label>
                        <textarea  name ="desc"class="form-control" id="desc"/><?=$news->description?></textarea>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?=$news->path?>" alt="<?=$news->alt?>" class="w-200"/>
                    </div>
                    <div class="col-12 mt-5">
                        <label for="file" class="form-label">Choose File</label><br/>
                        <input type="checkbox" id="keep" name="keep" class="mb-3" value="true"/><label for="keep"> Or keep the existing one</label><br/>
                        <input type="hidden" name="old-image" value="<?=$news->id_image ?>"/>
                        <input type="hidden" name="id" value="<?=$id?>"/>
                        <input type="file" id="file" name="image" /><br/> <input class="col-4 mt-2" type="text" name="alt" id="alt" placeholder="Image description..." value="<?=$news->alt?>"/>
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