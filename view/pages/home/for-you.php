<?php
if(!isset($_SESSION['user'])){

  exit;
}
    $for_you = GetForYouNews($_SESSION['user']->favorite_category,4);
    $you_category = GetYouCategory($_SESSION['user']->favorite_category);
    $name_vest_type = "Other";
    $news_for_vest_type = GetNewsForCategory($name_vest_type,5);

?>
<style>
.font-18{
    font-size: 20px !important;
}

</style>



<div class="row container mx-auto" data-aos="fade-up">
              <div class="col-sm-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-8">
                        <div class="card-title">
                          For You
                        </div>
                        <div class="row">
                            <?php foreach($for_you as $el):?>
                                <div class="col-sm-6 grid-margin">
                                    <div class="position-relative">
                                    <div class="rotate-img">
                                        <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                                        src="<?=$el->path ?>"
                                        alt="<?=$el->alt?>"
                                        class="img-fluid"
                                        /></a>
                                    </div>
                                    <div class="badge-positioned w-90">
                                        <div
                                        class="d-flex justify-content-between align-items-center"
                                        >
                                        <span
                                            class="badge badge-danger font-weight-bold"
                                            ><?=$you_category?></span
                                        >
                                    
                                        </div>
                                    </div>
                                    </div>
                                    <div>
                                        <h6 class="font-18 mt-2" class="fs-1"><a class="link-blue" href="index.php?pages=vest&id=<?= $el->id_vest?>"><?=$el->title?></a></h6>
                                    </div>
                                </div>
                            <?php endforeach?>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div
                          class="d-flex justify-content-between align-items-center"
                        >
                          <div class="card-title">
                            Other News
                          </div>
                          
                        </div>
                        <?php foreach($news_for_vest_type as $el):?>
                            <div
                            class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4"
                            >
                            <div class="div-w-80 mr-3">
                                <div class="rotate-img">
                                <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                                    src="<?=$el->path?>"
                                    alt="<?=$el->alt?>"
                                    class="img-fluid"
                                /></a>
                                </div>
                            </div>
                            <h4 class="font-weight-600 mb-0">
                               <a class="link-blue" href="index.php?pages=vest&id=<?= $el->id_vest?>"> <?=$el->title?></a>
                            </h4>
                            </div>

                        <?php endforeach?>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
</div>