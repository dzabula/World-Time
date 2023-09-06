<?php 
   
    $name = $_GET['name'];

    $arr_news = GetNewNewsForCategory($name,5);
    $arr_last_news = GetNewNews(3);
    $popular = GetMostLikesNews(3);




?>

<style>

    .link-blue{
        color:#032a63 !important;
    }
    .link{
        color:#fff !important;
    }
    </style>

<div class="content-wrapper">
          <div class="container">
            <div class="col-sm-12">
              <div class="card" data-aos="fade-up">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <h1 class="font-weight-600 mb-4">
                        <?=$name?>
                      </h1>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                <?php foreach($arr_news as $el):?>

                      <div class="row">
                        <div class="col-sm-4 grid-margin">
                          <div class="rotate-img">
                            <a href = "index.php?pages=vest&id=<?= $el->id_vest?>"><img
                              src="<?=$el->path?>"
                              alt="<?=$el->alt?>"
                              class="img-fluid"
                            /></a>
                          </div>
                        </div>
                        <div class="col-sm-8 grid-margin">
                          <h2 class="font-weight-600 mb-2">
                            <a href="index.php?pages=vest&id=<?= $el->id_vest?>" class="link-blue"><?=$el->title?></a>
                          </h2>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?=$el->date?></span>
                          </p>
                          <p class="fs-15">
                          <?php if (strlen($el->description) > 130) {
                                      echo substr($el->description, 0, 130) . '...';
                                } else {
                                    echo $el->description;
                                }
                            ?>
                          </p>
                        </div>
                      </div>
                <?php endforeach?>
                </div>
                <div class="col-lg-4">
                      <h2 class="mb-4 text-primary font-weight-600">
                        Latest news
                      </h2>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="pb-2 pt-4">

                        <?php foreach($arr_last_news as $el):?>

                            <div class="row py-3 border-bottom">
                              <div class="col-sm-8">
                                <h5 class="font-weight-600 mb-1">
                                  <a href="index.php?pages=vest&id=<?= $el->id_vest?>" class="link-blue"><?=$el->title?></a>
                                </h5>
                                <p class="fs-13 text-muted mb-0">
                                  <span class="mr-2">

                                  <?=$el->date;
                                    ?>

                                  </span>
                                </p>
                              </div>
                              <div class="col-sm-4">
                                <div class="rotate-img">
                                  <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                                    src="<?= $el->path?>"
                                    alt="<?=$el->alt?>"
                                    class="img-fluid"
                                  /></a>
                                </div>
                              </div>
                            </div>
                            <?php endforeach?>
                            </div>
                        </div>
                      </div>

                      <div class="trending">
                        <h2 class="mb-4 text-primary font-weight-600">
                          Trending
                        </h2>


                        <?php foreach($popular as $el):?>
                        
                        
                            <div class="mb-4 pt-3">
                          <div class="rotate-img d-flex justify-content-center">
                            <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                              src="<?=$el->path?>"
                              alt="<?=$el->alt?>"
                              class="img-fluid"
                            /></a>
                          </div>
                          <h3 class="mt-3 font-weight-600">
                            <a href="index.php?pages=vest&id=<?= $el->id_vest?>" class="link-blue">
                            
                            <?php if (strlen($el->title) > 50) {
                                      echo substr($el->title, 0, 50) . '...';
                                } else {
                                    echo $el->title;
                                }
                            ?>
                            
                            
                            </a>
                          </h3>
                          <p class="fs-13 text-muted mb-0">
                            <span class="mr-2"><?=$el->date?></span>
                          </p>
                        </div>

                        <?php endforeach?>

                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




