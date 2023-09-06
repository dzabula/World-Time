<?php
    include "view/pages/home/global-new.php";
    include "view/pages/home/lastest-new.php";
    include "view/pages/home/category.php";
    include "view/pages/home/top-news.php";
    if(isset($_SESSION['user'])) include "view/pages/home/for-you.php";
    include "view/pages/home/diverse.php";
?>