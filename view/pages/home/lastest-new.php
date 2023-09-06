<?php


$new_news = GetNewNews(3);

?>
<style>
.link{
  color: #fff !important;
}

  </style>

<div id="lastest-news" class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                  <div class="card-body">
                    <h2>Latest news</h2>
                    <?php foreach($new_news as $el):?>
                        <div
                        class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
                        >
                        <div class="pr-3">
                        <h5><a class="link" href="index.php?pages=vest&id=<?= $el->id_vest?>"><?=$el->title?></h5>
                            <div class="fs-12">
                            <span class="mr-2"> <span><?= $el->name?> </span> <?=$el->date?></span>
                            </div>
                        </div>
                        <div class="rotate-img">
                            <a href="index.php?pages=vest&id=<?= $el->id_vest?>"><img
                            src="<?=$el->path?>"
                            alt="<?=$el->alt?>"
                            class="img-fluid img-lg"
                            /></a>
                        </div>
                        </div>

                    <?php endforeach?>

                    
                  </div>
                </div>
</div>