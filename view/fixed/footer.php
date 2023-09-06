

<?php 
  $popular = GetMostLikesNews(4);
  $arr;
  $arr[0] = GetNumberPostFromCategory("Politics");
  $arr[1] = GetNumberPostFromCategory("Finance");
  $arr[2] = GetNumberPostFromCategory("Sport");
  $arr[3] = GetNumberPostFromCategory("Media");
  #$arr[4] = GetNumberPostFromCategory("International");

?>

<style>

  .link{
    color:white !important;
  }
  .link-blue{
    color:#032a63 !important;
  }
</style>



<br/>
<br/>
<br/>
<br/>
<footer>
<div class="footer-top">
            <div class="container-lg">
              <div class="row">
                <div class="col-sm-5">
                  <img src="assets/images/logo.svg" class="footer-logo" alt="" />
                  <h5 class="font-weight-normal mt-4 mb-5">
                    Newspaper is your news, entertainment, music fashion website. We
                    provide you with the latest breaking news and videos straight from
                    the entertainment industry.
                  </h5>
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
                <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                  <?php foreach($popular as $el):?>
                  <div class="row mt-4">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2">
                        <div class="row">
                          <div class="col-md-4 col-12">
                            <a href="index.php?pages=vest&id=<?=$el->id_vest?>" > <img
                              src="<?=$el->path?>"
                              alt="<?=$el->alt?>"
                              class="img-fluid"
                            /></a>
                          </div>
                          <div class="col-md-8 col-12">
                            <h5 class="font-weight-600">
                              <a href="index.php?pages=vest&id=<?=$el->id_vest?> " class="link">
                              <?php if (strlen($el->title) > 30) {
                                                echo substr($el->title, 0, 30) . '...';
                                            } else {
                                                echo $el->title;
                                            }
                               ?>
                            
                            </a>
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach?>
                  
                  
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>

                  <?php foreach($arr as $el):?>

                  <div class="pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600"><?=$el->name?></h5>
                      <div class="count"><?=$el->number?></div>
                    </div>
                  </div>
                  
                  <?php endforeach?>
                
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2021 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> Marko Dasic</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">Marko Dasic</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
</footer>
</html>