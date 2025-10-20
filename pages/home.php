<?php

namespace NsAppBlog;


/*
$datas = $db->query('SELECT * FROM articles');

echo "<pre>";
var_dump($datas);
echo "</pre>";*/

//$count = $pdo->exec('INSERT INTO articles (title, content, created_at) VALUES("Mon premier post", "Contenu de mon premier post", date("Y-m-d H:i:s"))');
//var_dump($count);
//var_dump(date("Y-m-d H:i:s"));

/*$res = $pdo->query('SELECT * FROM articles');

echo "<pre>";
var_dump($res->fetchAll(PDO::FETCH_OBJ));
echo "</pre>";


*/
?>

<h1>home page </h1>

<ul>
    <?php foreach ($db->queryFc('SELECT * FROM articles', __NAMESPACE__ . '\Table\Article') as $article) : ?>

        <!--le debug indique que $article est bien une instance de la classe Article-->
        <!--<pre><php var_dump($article); ?></pre>-->

        <li>
            <!--On affiche le titre et le contenu de l'article
                On appelle les méthodes getUrl() et getExtrait() de la classe Article-->
            <h2><?= $article->getTitle(); ?></h2>
            <p> <?= $article->getExtrait(); ?></p>
        </li>

    <?php endforeach; ?>
</ul>