<?php

namespace NsAppBlog\Table;

use NsAppBlog\App;
use NsAppBlog\Utility;

/* Classe Article pour instataliser des articles */

class Article extends Table
{

    protected static $table = 'articles';

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
