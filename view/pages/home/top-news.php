<?php
    $top_news = GetTopNews();
?>
<style>
.link-blue{
    color:#032a63 !important;
}
</style>

<div class="col-lg-9 stretch-card grid-margin d-block">


            <?php 
                $i=0;
                foreach($top_news as $el):?>
                <?php if($i==0) echo "<div class='card'>";
                        else echo "<div class='card mt-3'>";
                        $i++;
                ?>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-sm-4 grid-margin d-flex align-items-center">
                        <div class="position-relative">
                          <div class="rotate-img">
                            <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                              src="<?=$el->path?>"
                              alt="<?=$el->alt?>"
                              class="img-fluid"
                            /></a>
                          </div>
                          <div class="badge-positioned">
                            <span class="badge badge-danger font-weight-bold"
                              ><?=$el->name?></span
                            >
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-8  grid-margin">
                        <h2 class="mb-2 font-weight-600">
                         <a class="link-blue" href="index.php?pages=vest&id=<?= $el->id_vest?>"><?=$el->title?></a>
                        </h2>
                        <div class="fs-13 mb-2">
                          <span class="mr-2"><?=$el->date?> </span> 
                        </div>
                        <p class="mb-0">
                        <?php if (strlen($el->description) > 160) {
                                echo substr($el->description, 0, 160) . '...';
                            } else {
                                echo $el->description;
                            }?>
                        </p>
                      </div>
                    </div>


                    </div>
                  </div>

            <?php endforeach?>
                </div>
              </div>
            </div>
            </div>

            