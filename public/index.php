<?php

//namespace NsBlogApp;

require '../app/Autoloader.php';
NsAppBlog\Autoloader::register();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

// Initialisation de la base de données
$db = new NsAppBlog\Database('blog');

//var_dump($db);

ob_start();
if ($page === 'home') {
    require '../pages/home.php';
} else if ($page === 'article') {
    require '../pages/single.php';
} else {
    require '../pages/404.php';
}
$content = ob_get_clean();
require '../pages/template/default.php';
