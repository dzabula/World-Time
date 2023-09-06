<?php
if(isset($_SESSION['user'])){

    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    
    exit;
}
?>



<style>




                /* @extend display-flex; */
        display-flex, .display-flex, .display-flex-center, .signup-content, .signin-content, .social-login, .socials {
        display: flex;
        display: -webkit-flex; }

        /* @extend list-type-ulli; */
        list-type-ulli, .socials {
        list-style-type: none;
        margin: 0;
        padding: 0; }

        /* poppins-300 - latin */
       

        input, textarea {
        outline: none;
        appearance: unset !important;
        -moz-appearance: unset !important;
        -webkit-appearance: unset !important;
        -o-appearance: unset !important;
        -ms-appearance: unset !important; }

        input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
        appearance: none !important;
        -moz-appearance: none !important;
        -webkit-appearance: none !important;
        -o-appearance: none !important;
        -ms-appearance: none !important;
        margin: 0; }

        input:focus, select:focus, textarea:focus {
        outline: none;
        box-shadow: none !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        -o-box-shadow: none !important;
        -ms-box-shadow: none !important; }

        input[type=checkbox] {
        appearance: checkbox !important;
        -moz-appearance: checkbox !important;
        -webkit-appearance: checkbox !important;
        -o-appearance: checkbox !important;
        -ms-appearance: checkbox !important; }


        img {
        max-width: 100%;
        height: auto; }

        figure {
        margin: 0; }

        p {
        margin-bottom: 0px;
        font-size: 15px;
        color: #777; }

        h2 {
        line-height: 1.66;
        margin: 0;
        padding: 0;
        font-weight: bold;
        color: #222;
        font-family: Poppins;
        font-size: 36px; }

        .main {
        background: #f8f8f8;
        padding: 150px 0; }

        .clear {
        clear: both; }

        body {
        font-size: 13px;
        line-height: 1.8;

        font-weight: 400;
        font-family: Poppins; }

        .container {

      
        margin: 0 auto;
        box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        -moz-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        -webkit-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        -o-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        -ms-box-shadow: 0px 15px 16.83px 0.17px rgba(0, 0, 0, 0.05);
        border-radius: 20px;
        -moz-border-radius: 20px;
        -webkit-border-radius: 20px;
        -o-border-radius: 20px;
        -ms-border-radius: 20px; }

        .display-flex {
        justify-content: space-between;
        -moz-justify-content: space-between;
        -webkit-justify-content: space-between;
        -o-justify-content: space-between;
        -ms-justify-content: space-between;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center; }

        .display-flex-center {
        justify-content: center;
        -moz-justify-content: center;
        -webkit-justify-content: center;
        -o-justify-content: center;
        -ms-justify-content: center;
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center; }

        .position-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%); }

        .signup {
        margin-bottom: 150px; }

        .signup-content {
        padding: 75px 0; }

        .signup-form, .signup-image, .signin-form, .signin-image {
        width: 50%;
        overflow: hidden; }

        .signup-image {
        margin: 0 55px; }

        .form-title {
        margin-bottom: 33px; }

        .signup-image {
        margin-top: 45px; }

        figure {
        margin-bottom: 50px;
        text-align: center; }

        .form-submit {
        display: inline-block;
        background: #6dabe4;
        color: #fff;
        border-bottom: none;
        width: auto;
        padding: 15px 39px;
        border-radius: 5px;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -o-border-radius: 5px;
        -ms-border-radius: 5px;
        margin-top: 25px;
        cursor: pointer; }
        .form-submit:hover {
            background: #4292dc; }

        #signin {
        margin-top: 16px; }

        .signup-image-link {
        font-size: 14px;
        color: #222;
        display: block;
        text-align: center; }

        .term-service {
        font-size: 13px;
        color: #222; }

        .signup-form {
        margin-left: 75px;
        margin-right: 75px;
        padding-left: 34px; }

        .register-form {
        width: 100%; }

        .form-group {
        position: relative;
        margin-bottom: 25px;
        overflow: hidden; }
        .form-group:last-child {
            margin-bottom: 0px; }

        input {
        width: 100%;
        display: block;
        border: none;
        border-bottom: 1px solid #999;
        padding: 6px 30px;
        font-family: Poppins;
        box-sizing: border-box; }
        input::-webkit-input-placeholder {
            color: #999; }
        input::-moz-placeholder {
            color: #999; }
        input:-ms-input-placeholder {
            color: #999; }
        input:-moz-placeholder {
            color: #999; }
        input:focus {
            border-bottom: 1px solid #222; }
            input:focus::-webkit-input-placeholder {
            color: #222; }
            input:focus::-moz-placeholder {
            color: #222; }
            input:focus:-ms-input-placeholder {
            color: #222; }
            input:focus:-moz-placeholder {
            color: #222; }

        input[type=checkbox]:not(old) {
        width: 2em;
        margin: 0;
        padding: 0;
        font-size: 1em;
        display: none; }

        input[type=checkbox]:not(old) + label {
        display: inline-block;
        line-height: 1.5em;
        margin-top: 6px; }

        input[type=checkbox]:not(old) + label > span {
        display: inline-block;
        width: 13px;
        height: 13px;
        margin-right: 15px;
        margin-bottom: 3px;
        border: 1px solid #999;
        border-radius: 2px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        -o-border-radius: 2px;
        -ms-border-radius: 2px;
        background: white;
        background-image: -moz-linear-gradient(white, white);
        background-image: -ms-linear-gradient(white, white);
        background-image: -o-linear-gradient(white, white);
        background-image: -webkit-linear-gradient(white, white);
        background-image: linear-gradient(white, white);
        vertical-align: bottom; }

        input[type=checkbox]:not(old):checked + label > span {
        background-image: -moz-linear-gradient(white, white);
        background-image: -ms-linear-gradient(white, white);
        background-image: -o-linear-gradient(white, white);
        background-image: -webkit-linear-gradient(white, white);
        background-image: linear-gradient(white, white); }

        input[type=checkbox]:not(old):checked + label > span:before {
        content: '\f26b';
        display: block;
        color: #222;
        font-size: 11px;
        line-height: 1.2;
        text-align: center;
        font-family: 'Material-Design-Iconic-Font';
        font-weight: bold; }

        .agree-term {
        display: inline-block;
        width: auto; }

        label {
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        color: #222; }

        .label-has-error {
        top: 22%; }

        label.error {
        position: relative;
        background: url("../images/unchecked.gif") no-repeat;
        background-position-y: 3px;
        padding-left: 20px;
        display: block;
        margin-top: 20px; }

        label.valid {
        display: block;
        position: absolute;
        right: 0;
        left: auto;
        margin-top: -6px;
        width: 20px;
        height: 20px;
        background: transparent; }
        label.valid:after {
            font-family: 'Material-Design-Iconic-Font';
            content: '\f269';
            width: 100%;
            height: 100%;
            position: absolute;
            /* right: 0; */
            font-size: 16px;
            color: green; }

        .label-agree-term {
        position: relative;
        top: 0%;
        transform: translateY(0);
        -moz-transform: translateY(0);
        -webkit-transform: translateY(0);
        -o-transform: translateY(0);
        -ms-transform: translateY(0); }

        .material-icons-name {
        font-size: 18px; }

        .signin-content {
        padding-top: 67px;
        padding-bottom: 87px; }

        .social-login {
        align-items: center;
        -moz-align-items: center;
        -webkit-align-items: center;
        -o-align-items: center;
        -ms-align-items: center;
        margin-top: 80px; }

        .social-label {
        display: inline-block;
        margin-right: 15px; }

        .socials li {
        padding: 5px; }
        .socials li:last-child {
            margin-right: 0px; }
        .socials li a {
            text-decoration: none; }
            .socials li a i {
            width: 30px;
            height: 30px;
            color: #fff;
            font-size: 14px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            -o-border-radius: 5px;
            -ms-border-radius: 5px;
            transform: translateZ(0);
            -moz-transform: translateZ(0);
            -webkit-transform: translateZ(0);
            -o-transform: translateZ(0);
            -ms-transform: translateZ(0);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out; }
        .socials li:hover a i {
            -webkit-transform: scale(1.3) translateZ(0);
            transform: scale(1.3) translateZ(0); }

        .zmdi-facebook {
        background: #3b5998; }

        .zmdi-twitter {
        background: #1da0f2; }

        .zmdi-google {
        background: #e72734; }

        .signin-form {
        margin-right: 90px;
        margin-left: 80px; }

        .signin-image {
        margin-left: 110px;
        margin-right: 20px;
        margin-top: 10px; }

        @media screen and (max-width: 1200px) {
        .container {
            width: calc( 100% - 30px);
            max-width: 100%; } }
        @media screen and (min-width: 1024px) {
        .container {
            max-width: 1200px; } }
        @media screen and (max-width: 768px) {
        .signup-content, .signin-content {
            flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column;
            justify-content: center;
            -moz-justify-content: center;
            -webkit-justify-content: center;
            -o-justify-content: center;
            -ms-justify-content: center; }

        .signup-form {
            margin-left: 0px;
            margin-right: 0px;
            padding-left: 0px;
            /* box-sizing: border-box; */
            padding: 0 30px; }

        .signin-image {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 50px;
            order: 2;
            -moz-order: 2;
            -webkit-order: 2;
            -o-order: 2;
            -ms-order: 2; }

        .signup-form, .signup-image, .signin-form, .signin-image {
            width: auto; }

        .social-login {
            justify-content: center;
            -moz-justify-content: center;
            -webkit-justify-content: center;
            -o-justify-content: center;
            -ms-justify-content: center; }

        .form-button {
            text-align: center; }

        .signin-form {
            order: 1;
            -moz-order: 1;
            -webkit-order: 1;
            -o-order: 1;
            -ms-order: 1;
            margin-right: 0px;
            margin-left: 0px;
            padding: 0 30px; }

        .form-title {
            text-align: center; } }
        @media screen and (max-width: 400px) {
        .social-login {
            flex-direction: column;
            -moz-flex-direction: column;
            -webkit-flex-direction: column;
            -o-flex-direction: column;
            -ms-flex-direction: column; }

        .social-label {
            margin-right: 0px;
            margin-bottom: 10px; } }

        /*# sourceMappingURL=style.css.map */

            .form-group>p{
                color:#e72734;
            }

        #category{
            border:none;
            border-bottom: 1px solid #999;
            font-size: 14px;
            padding-left: 25px;
            font-family: Poppins;
            color:#999;
        }    
    </style>



    <script>
        // Moji js kod
function RegRegistration(id){
   
    let regIme = /^([A-Z][a-z]{2,15}\s?){1,2}$/
    let regEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    let regPass = /^(?=.*[0-9])(?=.*[!\.@#$%^&*])[a-zA-Z0-9!@#\.$%^&*]{8,16}$/ 
  switch(id){
    case "first-name":{
        var val = $("#"+id).val();


        if(regIme.test(val)){
          $("#"+id+"-g").html("");

        }
        else{
          $("#"+id+"-g").html(`Ime Mora sadrzati jedno veliko slovo, min jedna rec, max dve reci!`);

        }
    };break;
    case "last-name":{
      var val = $("#"+id).val();
      if(regIme.test(val)){
        $("#"+id+"-g").html("");

      }
      else{
        $("#"+id+"-g").html("Ime Mora sadrzati jedno veliko slovo, min jedna rec, max dve reci!")


      }
    };break;
    case "email":{
      var val = $("#"+id).val();
      val = val.toLowerCase();
      if(regEmail.test(val)){
        $("#"+id+"-g").html("");

      }
      else{
          $("#"+id+"-g").html(`Email nije unet u ispravnom formatu`)
      }
    };break;
    case "pass":{
      var val = $("#"+id).val();
      if(regPass.test(val)){
        $("#"+id+"-g").html("");
      }
      else{
          $("#"+id+"-g").html(`Lozinka mora sadrzati min: osam karaktera, jedan broji i jedan specijalni karakter(.*#$%...)`)
      }
    };break;
    case "re-pass":{
      var val = $("#"+id).val();
      if(val == $("#pass").val()){
        $("#"+id+"-g").html("");

      }
      else{
          $("#"+id+"-g").html("Lozinke se ne podudaraju!")
      }
    };break;



    }
    if(regEmail.test($("#email").val()) && regIme.test($("#first-name").val()) && regIme.test($("#last-name").val()) && regPass.test($("#pass").val())){
      $("#signup").prop("disabled",false);
    }
    else $("#signup").prop("disabled",true);
}
function VerifySelect(){
    if($("#category").val()==0){
        $("#category-g").html("Niste izabrali kategoriju.");
        event.preventDefault();
    }

}

    </script>


<section class="signup mt-5">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="models/registration-m.php" onsubmit="VerifySelect()" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="first-name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="first-name"  id="first-name" onblur="RegRegistration('first-name')" placeholder="Your First Name"/>
                                <p id="first-name-g" class="danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="last-name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="last-name" id="last-name" onblur="RegRegistration('last-name')" placeholder="Your Last Name"/>
                                <p id="last-name-g" class="danger"></p>
                            </div>
                            <div class="form-group">
                                <select name="category" id="category"  class="form-select w-100 py-1" aria-label="Default select example">
                                    <option value="0" selected>Your favorite news category</option>
                                    <?php
                                    
                                    $cat = GetCategory();
                                    foreach($cat as $el){
                                        echo "<option value='".$el->id_category."'>".$el->name."</option>";
                                
                                    }?>

                                </select>
                                <p id="category-g"></p>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" onblur="RegRegistration('email')" placeholder="Your Email"/>
                                <p id="email-g" class="danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" onblur="RegRegistration('pass')" placeholder="Password Min 8 Caracters and 1 Number"/>
                                <p id="pass-g" class="danger"></p>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re-pass" id="re-pass"  onblur="RegRegistration('re-pass')"  placeholder="Repeat your password"/>
                                <p id="re-pass-g" class="danger"></p>
                            </div>

                            <?php 
                                if(isset($_SESSION['email-error'])){
                                   echo "<p>".$_SESSION['email-error'] ."</p>";
                           
                                    unset($_SESSION['email-error']);
                                }
                                if(isset($_SESSION['pass-error'])){
                                    echo "<p>".$_SESSION['pass-error']."</p>";
                                    unset($_SESSION['pass-error']);
                                }
                            ?>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/sign-up/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php?pages=log-in" class="signup-image-link text-success">I am already member</a>
                    </div>
                </div>
            </div>
</section>