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

        //Utility::fVarDump('Database::getPdo called.');

        /* On vérifie si l'instance de PDO n'existe pas déjà
         * Si elle n'existe pas, on la crée
         */
        //if ($this->pdo === null) {
        $dns = 'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname;
        $pdo = new PDO($dns, $this->dbusername, $this->dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        //}
        return $pdo;
    }

    /*  Méthode pour exécuter une requête SQL ; fetchAll
     * 
     * @param string $statement : requête SQL à exécuter
     * @param string $classe_name : nom de la classe pour le fetch
     */
    public function queryFall($statement, $classe_name)
    {
        $req = $this->getPdo()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $classe_name);
        return $datas;
    }

    /*  Méthode pour exécuter une requête SQL ; fetch
     * 
     * @param string $statement : requête SQL à exécuter
     * @param string $classe_name : nom de la classe pour le fetch
     */
    public function queryF($statement, $classe_name)
    {
        $req = $this->getPdo()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $classe_name);
        $datas = $req->fetch();
        return $datas;
    }

    /*  Méthode pour exécuter une requête SQL préparée ; fetch
     * 
     * F : Fetch récupérer
     * 
     * @param string $statement : requête SQL à exécuter
     * @param array $attributes : tableau des paramètres
     * @param string $classe_name : nom de la classe pour le fetch
     */
    public function prepareF($statement, $attributes, $classe_name)
    {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($attributes); //<=> tableau des paramètres
        $req->setFetchMode(PDO::FETCH_CLASS, $classe_name);
        $datas = $req->fetch();
        return $datas;
    }

    /*  Méthode pour exécuter une requête SQL préparée ; fetchAll
     * 
     * F : Fetch récupérer
     * all : tous
     * 
     * @param string $statement : requête SQL à exécuter
     * @param array $attributes : tableau des paramètres
     * @param string $classe_name : nom de la classe pour le fetch
     */
    public function prepareFall($statement, $attributes, $classe_name)
    {
        $req = $this->getPdo()->prepare($statement);
        $req->execute($attributes); //<=> tableau des paramètres
        $req->setFetchMode(PDO::FETCH_CLASS, $classe_name);
        $datas = $req->fetchAll();
        return $datas;
    }
}
