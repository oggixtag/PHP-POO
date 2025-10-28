<?php

namespace NsAppBlog\Table;

class Category extends Table
{

    /* Static property */
    protected static $table = 'categories';

    public function getUrl()
    {
        return 'index.php?page=category&id=' . $this->id;
    }

    public function getExtrait()
    {
        $html = '<p>' . nl2br(htmlspecialchars($this->getTitle())) . '</p>';
        $html .= '<p> <a href="' . $this->getUrl() . '"></a> </p>';
        return $html;
    }

    public function getTitle()
    {
        return htmlspecialchars($this->title);
    }

    public static function getArticleBasedOnCategory($id)
    {
        //print_r('Category:getArticleBasedOnCategory:' . $id, true);
        // fetchall because there is a left join.
        return self::query(
            "select a.id,a.title,a.content,c.title as cat_title
            from articles a
            left join categories c on a.category_id = c.id
            where c.id = ?",
            [$id]
        );
    }
}
