<?php

namespace NsAppBlog;

class App
{

    // for DB
    const DB_NAME = 'blog';
    const DB_USER = 'root';
    const DB_PASS = ''; //Access denied for user 'root'@'localhost' (using password: YES)
    const DB_HOST = 'localhost';
    private static $database;

    // for Response
    const RESP_STATUSCODE = '';
    const RESP_STATUSVALUE = '';
    const RESP_BODY = '';
    private static $response;

    // for Title
    private static $title = 'site blog tt';

    public static function getDb()
    {
        //Utility::fVarDump("App::getDb called");

        if (self::$database === null) {
            //Utility::fVarDump('App::getDb calling NsAppBlog\Database:' . self::DB_NAME . ';' . self::DB_USER . ';' . self::DB_PASS . ';' . self::DB_HOST . '.');
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }

        return self::$database;
    }


    /*public static function getResponse()
    {
        Utility::fVarDump('App::getResponse');
        self::$response = new Response(self::RESP_STATUSCODE, self::RESP_STATUSVALUE, self::RESP_BODY);
        return self::$response;
    }*/

    public static function notFound()
    {
        // Set HTTP status header
        header("HTTP/1.1 404 Not Found");

        // Set localisation
        header('Location:index.php?p=404');
    }

    public static function getTitleSite(): string
    {
        return self::$title;
    }

    public static function setTitleSite($title)
    {
        self::$title = $title;
    }
}
