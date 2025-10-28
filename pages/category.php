<?php

namespace NsAppBlog;

use NsAppBlog\Utility;
use NsAppBlog\Table\Category;
use NsAppBlog\Response;
use NsAppBlog\App;

$category = Category::getSubDataF($_GET['id']);
$categories = Category::getArticleBasedOnCategory($_GET['id']);

// si l'id n'existe pas.
if ($category === false) {
    /*Utility::fVarDump('category');
    $response = Category::response()->set404();*/
    App::notFound();
}

$categoryName = $category->getTitle();
$title = App::setTitleSite($categoryName);

?>

<h1>Category <?= $categoryName ?></h1>

<h2>list of article based on category selected</h2>
<ul>
    <?php foreach ($categories as $single_category): ?>
        <li>
            <?php
            //Utility::fVarDump('foreach: category article object');
            //Utility::fVarDump($cat);
            echo $single_category->title;
            echo "<br>";
            echo $single_category->content;
            echo "<br><br>";
            ?>
        </li>
    <?php endforeach; ?>
</ul>

<h2>list of category</h2>
<ul>
    <?php foreach (Category::getAllDataFall() as $list_categories) : ?>
        <li>
            <h3><a href="<?= $list_categories->getUrl(); ?>"><?= $list_categories->getTitle(); ?></a></h3>
        </li>
    <?php endforeach; ?>
</ul>

<a href="index.php">Retour à la home</a>