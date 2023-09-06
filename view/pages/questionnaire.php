<?php
    if(!isset($_SESSION['user'])){
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
        exit;
    }

    $res = is_fill($_SESSION['user']->id_user);

    if($res){
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
        $_SESSION['message']='Vec ste populini anketu.';
        
    }
else{

    $questions = GetAllQuestionsForQuestionnaire();
    


?>

<script>
    var currentTab = 0;
    document.addEventListener("DOMContentLoaded", function(event) {


    showTab(currentTab);

    });

    function showTab(n) {
        var x = document.getElementsByClassName("tab");
    
        x[n].style.display = "block";
      
        if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
        } else {
        document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
        }
        fixStepIndicator(n)
    }

    function nextPrev(n) {
  
        var x = document.getElementsByClassName("tab");
        if (n == 1 && !validateForm()) return false;
        x[currentTab].style.display = "none";
        currentTab = currentTab + n;
        if (currentTab >= x.length) {

        document.getElementById("nextprevious").style.display = "none";
        document.getElementById("all-steps").style.display = "none";
        document.getElementById("register").style.display = "none";
        document.getElementById("text-message").style.display = "block";
           

        SendInfoAjax();




    }
    showTab(currentTab);
    }

    function SendInfoAjax(){


        let numberQuestions = <?=count($questions)?> ;
    
        let idUser = <?php echo $_SESSION['user']->id_user?> ; 
        let answer = [];
        let questions = [];

            $("input").each(function(){
                if($(this).prop("checked")){
                    answer.push($(this).val());
                    questions.push($(this).attr("id-quest"));
                }
            })

        $.ajax({
            method:"post",
            url:"models/set-questionnaire.php",
            dataType:"json",
            data:{
                "id":idUser,
                "answer":answer,
                "question":questions
            },
            success:function(response){
                console.log(JSON.stringify(response))
            },
            error:function(xhr){
                console.log(xhr.responseText)
            }
        })
    }


    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");

        for (i = 0; i < y.length; i++) { if (y[i].value=="" ) { y[i].className +=" invalid" ; valid=false; } } if (valid) { document.getElementsByClassName("step")[currentTab].className +=" finish" ; } return valid; } function fixStepIndicator(n) { var i, x=document.getElementsByClassName("step"); for (i=0; i < x.length; i++) { x[i].className=x[i].className.replace(" active", "" ); } x[n].className +=" active" ; }





</script>


<style>
        #register {
        color: #032a63
    }

    h1 {
        text-align: center
    }

   /* input {
        padding: 10px;
        width: 100%;
        font-size: 17px;
        font-family: Raleway;
        border: 1px solid #aaaaaa;
        border-radius: 10px;
        -webkit-appearance: none
    }*/

    .tab input:focus {
        border: 1px solid #6a1b9a !important;
        outline: none
    }

    input.invalid {
        border: 1px solid #e03a0666
    }

    .tab {
        display: none
    }

    button {
        background-color: #032a63;
        color: #ffffff;
        border: none;
        border-radius: 50%;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        cursor: pointer
    }

    button:hover {
        opacity: 0.8
    }

    button:focus {
        outline: none !important
    }

    #prevBtn {
        background-color: #032a63;
    }

    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px;
        width: 100%;
        display: inline-flex;
        justify-content: center
    }

    .step {
        height: 40px;
        width: 40px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        color: #032a63;
        opacity: 0.5
    }

    .step.active {
        opacity: 1
    }

    .step.finish {
        color: #fff;
        background: #032a63;
        opacity: 1
    }

    .all-steps {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 30px
    }

    .thanks-message {
        display: none
    }
</style>

<div class="container mt-5 py-5">
    <div class="row d-flex justify-content-center align-items-center py-5">
        <div class="col-12 col-md-8">
            <form id="regForm">
                <h1 id="register">Questionnaire</h1>
                <div class="all-steps" id="all-steps"> <span class="step"><i class="fas fa-dot-circle"></i></span> <span class="step"><i class="fas fa-dot-circle"></i></span> <span class="step"><i class="fas fa-dot-circle"></i></span> <span class="step"><i class="fas fa-dot-circle"></i></span> <span class="step"><i class="fas fa-dot-circle"></i></span> <span class="step"><i class="fas fa-dot-circle"></i></span> </div>
                <?php foreach ($questions as $qe):?>
                <div class="tab">
                    <h3 class="py-2 text-center"><?=$qe->text?></h3>
                    <?php
                        $answer  = GetAnswerForQuestion($qe->id);
                        foreach($answer as $key => $el):
                            
                           
                    ?>
                    <div class="row">
                        <div class="col-4 col-sm-2">
                            <input type="radio" id-quest="<?=$qe->id?>" name="<?=$qe->id?>" value = "<?=$el->id?>" class="w-25 mb-3" <?php echo $key == 0 ? "checked":"" ?>/>                       
                        </div>
                        <div class="clo-7 col-sm-9"><?=$el->text?> <br/></div>
                     

                    </div>
                    <?php endforeach?>



                </div>
                <?php endforeach?>
                
                <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                    <h3>Thankyou for your feedback!</h3> <span>Thanks for your valuable information. It helps us to improve our services!</span>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;"><button type="button"  id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }?>