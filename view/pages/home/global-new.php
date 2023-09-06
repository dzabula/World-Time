<?php 
  

    $news = GetNewGlobalNews();




?>
<style>
  #banner{
    bottom:120px !important;
    background-color:rgba(150,150,150,0.9);
  }
  @media only screen and (max-width: 600px) {
  #banner {
    bottom:0px !important;
  }
  }
  </style>

<div class="content-wrapper">
          <div class="container">
            <div class="row" data-aos="fade-up">
              <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                  <a href="index.php?pages=vest&id=<?= $news->id_vest?>"><img
                    src="<?=$news->path?>"
                    alt="<?=$news->alt?>"
                    class="img-fluid"
                  /></a>
                  <div class="banner-content" id="banner">
                    <div class="badge badge-danger fs-12 font-weight-bold mb-3 color-black">
                      <?=$news->name?>
                    </div>
                    <!--<h1 class="mb-0">GLOBAL PANDEMIC</h1>-->
                    <h1 class="mb-2">
                     <a class="link color-black" href="index.php?pages=vest&id=<?= $news->id_vest?>"> <?=$news->title?></a>
                    </h1>
                    <div class="fs-12">
                      <span class="mr-2"><span class="color-black"><?=$news->date ?></span>
                    </div>
                  </div>
                </div>
              </div>