<?php

namespace NsAppBlog\Table;

use NsAppBlog\App;
use NsAppBlog\Utility;

/* Classe Table, classe type static pour instataliser d'une tables */

class Table
{
    // Static property
    protected static $table = '';

    /* Prevent direct instantiation of the Table class */
    private function __construct() {}

    /**
     * Getter for the static table property.
     * @return string The name of the table that have been called class Table.
     */
    protected static function getTable(): string
    {
        return static::$table;
    }

    /**
     * Prepare the SQL statement to get all data from the table.
     * @return string The SQL statement.
     */
    private static function getStatement(): string
    {
        return "SELECT * FROM " . static::getTable();
    }

    public static function getAllDataFall()
    {
        $statement = static::getStatement();
        return App::getDb()->queryFall($statement, get_called_class());
    }

    public static function getSubDataF($id)
    {
        $statement = static::getStatement() . " WHERE id = ?";
        return App::getDb()->prepareF($statement, [$id], get_called_class());
    }

    public static function query($statement, $attributes = null)
    {
        //print_r('Table:query:' . $attributes, true);
        if ($attributes !== null) {
            return App::getDb()->prepareFall($statement, $attributes, get_called_class());
        } else {
            return App::getDb()->queryFall($statement, get_called_class());
        }
    }

    /*public static function response()
    {
        Utility::fVarDump('Table::response');
        return App::getResponse();
    }*/
}
