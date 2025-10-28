<?php

namespace NsAppBlog;

use NsAppBlog\App;

require '../app/Autoloader.php';
Autoloader::register();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}


//var_dump(App::getTitleSite());
//r:ok

ob_start();
if ($page === 'home') {
    require '../pages/home.php';
} else if ($page === 'article') {
    require '../pages/article.php';
} elseif ($page === 'category') {
    require '../pages/category.php';
} else {
    require '../pages/404.php';
}
$content = ob_get_clean();
require '../pages/template/default.php';
