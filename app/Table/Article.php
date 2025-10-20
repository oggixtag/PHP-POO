<?php

namespace NsAppBlog\Table;

/* Classe Article pour instataliser des articles */

class Article
{

    /**
     * PDO fetch permet de passer aussi une classe en paramètre
     *  
     * */

    /* Attributs de la classe Article */
    //public $id;    // un article
    //public $content;

    public function getUrl()
    {
        return 'index.php?page=article&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . nl2br(htmlspecialchars($this->content)) . '</p>';
        $html .= '<p> <a href="' . $this->getUrl() . '">Lire la suite</a> </p>';
        return $html;
    }

    public function getTitle()
    {
        return htmlspecialchars($this->title);
    }
}
