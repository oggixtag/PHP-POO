<?php

namespace NsAppBlog;
?>

<h1>Page of articles</h1>

<?php
// On récupère les informations de l'article
$article = $db->prepareFc('SELECT * FROM articles WHERE id = ?', [$_GET['id']], __NAMESPACE__ . '\Table\Article', true);

//var_dump($article);

?>

<h2><?= $article->getTitle(); ?></h2>

<p><?= nl2br(htmlspecialchars($article->content)); ?></p>

<a href="index.php">Retour à la liste des articles</a>