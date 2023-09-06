<div id="sucess-registration" class="w-100 d-flex justify-content-center">
    <div id="modal" class="col-8 col-md-5 col-lg-3">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"> Notification</h5>
              <button type="button" id="success-close" onclick="CloseModal()" ><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
             <p class="fs-4"><?=$_SESSION['message']?></p>
            </div>

          </div>
        </div>
    </div>
</div>
<script>
  window.onload = () =>{
    

    $("#sucess-registration").fadeIn("slow");
  }
  function CloseModal(){
        $("#modal").css("display","none")

    }
</script>
<style>
    #sucess-registration{
        position: fixed;
        top:300px;
        z-index: 999;

    }
    @media only screen and (max-width: 790px) {
      

    }


</style>