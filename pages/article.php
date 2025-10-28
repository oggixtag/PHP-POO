<?php

namespace NsAppBlog;

use NsAppBlog\Utility;
use NsAppBlog\Table\Article;

?>

<h1>Page of articles</h1>

<?php
// On récupère les informations de l'article
$article = Article::getSubDataF($_GET['id']);
?>

<h2><?= $article->getTitle(); ?></h2>

<p><?= nl2br(htmlspecialchars($article->content)); ?></p>

<a href="index.php">Retour à la liste des articles</a>