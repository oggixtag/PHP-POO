<?php

/* A partir de maintenant, je travail dans le namespace NsBlog */

namespace NsAppBlog;

use \PDO;

/**
 * Class Database
 * Permet de centraliser la connection à la base de données
 */
class Database
{
    private $dbname;
    private $dbusername;
    private $dbpassword;
    private $dbhost;
    private $pdo;

    /*  Constructeur de la classe Database
     * 
     * @param string $dbname : nom de la base de données
     * @param string $dbusername : nom d'utilisateur de la base de données
     * @param string $dbpassword : mot de passe de la base de données
     * @param string $dbhost : hôte de la base de données
     */
    public function __construct($dbname = '', $dbusername = 'root', $dbpassword = '', $dbhost = 'localhost')
    {
        $this->dbname = $dbname;
        $this->dbusername = $dbusername;
        $this->dbpassword = $dbpassword;
        $this->dbhost = $dbhost;
    }

    /*  Méthode pour obtenir une instance de PDO
     * Utiliser '\' pour accéder à la classe PDO globale <=> use \PDO;
     * 
     * @return \PDO : instance de PDO
     */
    private function getPdo()
    {
        /* On vérifie si l'instance de PDO n'existe pas déjà
         * Si elle n'existe pas, on la crée
         */
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            /*echo "<pre>";
            var_dump('PDO instatialised');
            echo "</pre>";*/
        }
        /*echo "<pre>";
        var_dump('getPDO called');
        echo "</pre>";*/
        return $pdo;
    }

    /*  Méthode pour exécuter une requête SQL
     * 
     * @param string $statement : requête SQL à exécuter
     */
    public function query($statement)
    {
        // $this->getPdo() <=> $this->pdo
        // $req = $pdo->query('SELECT * FROM articles');

        $req = $this->getPdo()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_OBJ);
        return $datas;

        // genére un tableau d'objets issu de la classe (stdClass)
    }



    /*  Méthode pour exécuter une requête SQL
     * 
     * @param string $statement : requête SQL à exécuter
     * @param string $classe_name : nom de la classe pour le fetch
     */
    public function queryFc($statement, $classe_name)
    {

        /*var_dump($statement);
        var_dump($classe_name);*/

        $req = $this->getPdo()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $classe_name);
        return $datas;
    }

    public function prepareFc($statement, $attributes, $classe_name, $one = false)
    {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($attributes); //<=> tableau des paramètres
        $req->setFetchMode(PDO::FETCH_CLASS, $classe_name);
        if ($one) {
            $datas = $req->fetch();
        } else {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}
