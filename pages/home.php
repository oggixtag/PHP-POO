<?php

use NsAppBlog\Table\Article;
use NsAppBlog\Table\Category;
use NsAppBlog\Utility;
?>

<h1>home page </h1>

<h2>list of article</h2>
<ul>
    <?php foreach (Article::getAllDataFall() as $article) : ?>
        <li>
            <h3><?= $article->getTitle(); ?></h3>
            <p> <?= $article->getExtrait(); ?></p>
        </li>
    <?php endforeach; ?>
</ul>


<h2>list of category</h2>
<ul>
    <?php foreach (Category::getAllDataFall() as $category) : ?>
        <li>
            <h3><a href="<?= $category->getUrl(); ?>"><?= $category->getTitle(); ?></a></h3>
        </li>
    <?php endforeach; ?>
</ul>