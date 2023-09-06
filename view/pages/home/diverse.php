<?php
$one_sport_news = GetNewNewsForCategory("Sport",1);
$finance_news = GetNewNewsForCategory("Finance",4);
$selebrity_news = GetNewNewsForCategory("Media",2);
$popular_news = GetMostLikesNews(2);



?>
<style>
    .short-text{
        width: 150ch !important;
  overflow: hidden !important;
  white-space: nowrap !important;
  text-overflow: ellipsis !important;
    }
</style>

<div class="row container mx-auto" data-aos="fade-up">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 mt-3">
                        <div class="card-title">
                          Sport highlight
                        </div>
                        <div class="row">
                          <div class="col-xl-6 col-lg-8 col-sm-6">
                            <div class="rotate-img">
                              <a href="#"><img
                                src="<?=$one_sport_news->path?>"
                                alt="<?=$one_sport_news->alt?>"
                                class="img-fluid"
                              /></a>
                            </div>
                            <h2 class="mt-3 text-primary mb-2">
                              <a class="link-blue" href="#"><?=$one_sport_news->title?></a>
                            </h2>
                            <p class="fs-13 mb-1 text-muted">
                              <span class="mr-2"><?=$one_sport_news->date?></span>
                            </p>
                            <p class="my-3 fs-15">
                            <?php if (strlen($one_sport_news->description) > 160) {
                                echo substr($one_sport_news->description, 0, 160) . '...';
                            } else {
                                echo $one_sport_news->description;
                            }?>
                            </p>
                            
                          </div>
                          <div class="col-xl-6 col-lg-4 col-sm-6">

                            <?php foreach($finance_news as $el):?>
                            
                            <div class="border-bottom pb-3 mb-3">
                              <h3 class="font-weight-600 mb-0">
                               <a href="#" class="link-blue"> <?= $el->title?></a>
                              </h3>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?=$el->date?></span>
                              </p>
                              <p class="mb-0">
                              <?php if (strlen($el->description) > 30) {
                                    echo substr($el->description, 0, 30) . '...';
                                    } else {
                                    echo $el->description;
                                    }
                                ?>
                              </p>
                            </div>

                            <?php endforeach?>
                            
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 mt-3">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="card-title">
                              Celebrity news
                            </div>
                            
                            <?php foreach($selebrity_news as $el):?>

                            <div class="pt-3 pb-3">
                              <div class="rotate-img">
                                <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                                  src="<?=$el->path?>"
                                  alt="<?=$el->alt?>"
                                  class="img-fluid"
                                /></a>
                              </div>
                              <p class="fs-16 font-weight-600 mb-0 mt-3">
                                <a href="index.php?pages=vest&id=<?= $el->id_vest?>" class="link-blue"><?=$el->title?></a>
                              </p>
                              <p class="fs-13 text-muted mb-0">
                                <span class="mr-2"><?=$el->date?></span>
                              </p>
                            </div>

                            <?php endforeach?>

                          </div>


                          <div class="col-sm-6">
                            <div class="card-title">
                              Popular news
                            </div>

                            <?php foreach($popular_news as $el):?>
                            <div class="row py-2">
                              <div class="col-sm-12">
                                <div class="border-bottom pb-3">
                                  <div class="row">
                                    <div class="col-sm-5 pr-2 d-flex align-items-center">
                                      <div class="rotate-img">
                                        <a href = "index.php?pages=vest&id=<?= $el->id_vest?>"><img
                                          src="<?=$el->path?>"
                                          alt="<?=$el->alt?>"
                                          class="img-fluid w-100"
                                        /></a>
                                      </div>
                                    </div>
                                    <div class="col-sm-7 pl-2">
                                      <p class="fs-14 font-weight-600 mb-0">
                                        <a class="link-blue" href="index.php?pages=vest&id=<?= $el->id_vest?>">


                                        <?php if (strlen($el->title) > 15) {
                                                echo substr($el->title, 0, 15) . '...';
                                            } else {
                                                echo $el->title;
                                            }
                                        ?>
                                    
                                    
                                        </a>
                                      </p>
                                      <p class="fs-13 text-muted mb-0">
                                        <span class="mr-2"><?=$el->date?> </span>
                                      </p>
                                      <p class="mb-0 fs-13">
                                      <?php if (strlen($el->description) > 30) {
                                                echo substr($el->description, 0, 30) . '...';
                                            } else {
                                                echo $el->description;
                                            }
                                        ?>
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php endforeach?>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>