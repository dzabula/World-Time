<?php

  include "models/config.php";
  include "models/functions.php";
  $nav = GetCategory();


?>


<style>
  td{
    vertical-align: middle !important;
  }
  th{
    vertical-align: middle !important;
  }
  .for-res-992{
      display: none ;
    }
  @media only screen and (max-width: 992px) {
    .for-res-992{
      display: block !important;
    }
    .nav-item{
      margin-bottom: 10px;
    }
  }




</style>




<header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                  <ul class="navbar-top-left-menu">
                    <?php if(isset($_SESSION['user'])):?>
                    <li class="nav-item">
                      <a href="index.php?pages=questionnaire&id=1" class="nav-link">Questionnaire</a>
                    </li>
                    <?php endif?>
                    <li class="nav-item">
                      <a href="index.php?pages=about" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                      <a href="index.php?pages=author" class="nav-link">Author</a>
                    </li>
                    
                      <?php 
                          if(isset($_SESSION['user'])){
                            if($_SESSION['user']->id_role == 3){
                              echo('<li class="nav-item">
                                <a class="nav-link" href="index.php?pages=admin">Admin</a>
                              </li>');
                            }
                            else if($_SESSION['user']->id_role == 2){
                              echo('<li class="nav-item">
                                <a class="nav-link" href="index.php?pages=moderator">Moderator</a>
                              </li>');
                            }
                          }
                        ?>
                  </ul>
                  <ul class="navbar-top-right-menu">
                    <li class="nav-item">
                     
                    </li>

                    <?php if(!isset($_SESSION['user'])){?>

                    <li class="nav-item">
                      <a href="index.php?pages=log-in" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                      <a href="index.php?pages=registration" class="nav-link">Sign in</a>
                    </li>

                    <?php }else{?>
                    <li class="nav-item">
                      <a href="#" class="nav-link"><?=$_SESSION['user']->first_name?> <?=$_SESSION['user']->last_name?></a>
                    </li>
                    <li class="nav-item">
                      <a href="models/log-out.php" class="nav-link">Log out</a>
                    </li>
                    
                    
                    <?php } ?>

                  </ul>
                </div>
              </div>
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <a class="navbar-brand" href="index.php"
                      ><img src="assets/images/logo.svg" alt=""
                    /></a>
                  </div>
                  <div>
                    <button
                      class="navbar-toggler"
                      type="button"
                      data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent"
                      aria-expanded="false"
                      aria-label="Toggle navigation"
                    >
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                      class="navbar-collapse justify-content-center collapse"
                      id="navbarSupportedContent"
                    >
                      <ul
                        class="navbar-nav d-lg-flex justify-content-between align-items-center" id="header-nav"
                      >
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <?php foreach($nav as $el):?>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?pages=category&name=<?=$el->name?>"><?php echo $el->name == "Health_care" ? "Health Care": $el->name?></a>
                        </li>
                        <?php endforeach?>
                        
                        
                        <li class="nav-item for-res-992">
                           <a href="index.php?pages=about" class="nav-link">About</a>
                        </li>
                        <?php 
                          if(isset($_SESSION['user'])){
                            if($_SESSION['user']->id_role == 3){
                              echo('<li class="nav-item mb-3 for-res-992">
                                <a class="nav-link" href="index.php?pages=admin">Admin</a>
                              </li>');
                            }
                          }
                        ?>

                        <?php if(!isset($_SESSION['user'])):?>

                          <li class="nav-item mb-3 for-res-992">
                            <a href="index.php?pages=log-in" class="nav-link">Login</a>
                          </li>
                          <li class="nav-item mb-3 for-res-992">
                            <a href="index.php?pages=registration" class="nav-link">Sign in</a>
                          </li>
                        

                          <?php else:?>

                          <li class="nav-item mb-3 for-res-992">
                            <a href="#" class="nav-link"><?=$_SESSION['user']->first_name?> <?=$_SESSION['user']->last_name?></a>
                          </li>
                          <li class="nav-item for-res-992">
                            <a href="index.php?pages=questionnaire&id=1" class="nav-link">Questionnaire</a>
                          </li>
                          <li class="nav-item for-res-992">
                            <a href="models/log-out.php" class="nav-link">Log out</a>
                          </li>
                         

                          <?php endif ?>














                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                      <a href="https://sr-rs.facebook.com/">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://www.youtube.com/">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="https://twitter.com/?lang=sr">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>