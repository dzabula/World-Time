<?php

if(!isset($_SESSION['user'])){
 


    exit;
}
if($_SESSION['user']->id_role != 3){

    exit; 
}


  $id = $_GET['id'];
  if(!is_numeric($id)){
    header("Location: index.php");
    exit; 
  }
  $user = GetUserForId($id);
  $role = GetAllRole();
  $category = GetCategory();




?>

<script>

  function Validate(){
 
    let regIme = /^([A-Z][a-z]{2,15}\s?){1,2}$/
    let regEmail = /^[a-zA-Z0-9.! #$%&'*+/=? ^_`{|}~-]+@[a-zA-Z0-9-]+(?:\. [a-zA-Z0-9-]+)*$/
    
    if(!regIme.test($("#first-name").val())){
      alert("Ime ne sme imati vise od dve reci  i Mora sadrzati prvo pocetno slovo veliko! ");
      event.preventDefault();
    }
    if(!regIme.test($("#last-name").val())){
      alert("Prezime ne sme imati vise od dve reci  i Mora sadrzati prvo pocetno slovo veliko! ");
      event.preventDefault();
    }
    if(regEmail.test($("#email").val())){
      console.log($("#email").val())
      alert("Email mor abiti u formatu example@gmail.com ");
       event.preventDefault();
    }
  

  }
</script>




<div class="container py-5">
  <form method="post" action ="models/update-user.php" onsubmit=" Validate();">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" name ="email" id="email" value="<?=$user->email?>">
      
    </div>

    <div class="mb-3">
      <label for="first-name" class="form-label">First Name</label>
      <input type="text" class="form-control" name="first_name" id="first-name" value="<?=$user->first_name?>">
    </div>
    
    <div class="mb-3">
      <label for="last-name" class="form-label">Last Name</label>
      <input type="text" class="form-control" name="last_name" id="last-name" value="<?=$user->last_name?>">
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Choose Role</label>
        <select id="role" name="id_role" class="form-select">
          <?php foreach($role as $el){
            if($el->id_role == $user->id_role){
              echo '<option value="'.$el->id_role.'" selected>'.$el->name.'</option>';
            }
            else{

              echo '<option value="'.$el->id_role.'">'.$el->name.'</option>';
            
            }
          }?> 
        </select>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label">Choose Email Status</label>
        <select id="status" name="status" class="form-select">
          <option value="0" <?php if($user->active) echo "";else echo "selected" ?> >Active</option>
          <option value="1"  <?php if($user->active) echo "selected";else echo ""  ?> >Deactive</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="favorite" class="form-label">Choose Favorite Category</label>
        <select id="favorite"  name="favorite" class="form-select">
        <?php foreach($category as $el){
            if($el->id_category == $user->favorite_category){
              echo '<option value="'.$el->id_category.'" selected>'.$el->name.'</option>';
            }
            else{

              echo '<option value="'.$el->id_category.'">'.$el->name.'</option>';
            
            }
          }?> 
        
        </select>
      </div>

      <input type="hidden" name="id" value="<?=$user->id_user?>"/>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>