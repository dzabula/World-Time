<?php 
    $category = GetCategory();
?>

<div class="row container mx-auto" data-aos="fade-up">
              <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h2>Category</h2>
                    <ul class="vertical-menu">
                    <?php foreach($category as $el):?>

                        <li><a href="index.php?pages=category&name=<?= $el->name?>"><?=$el->name?></a></li>
                        
                    <?php endforeach?>
                    </ul>
                  </div>
                </div>
              </div>