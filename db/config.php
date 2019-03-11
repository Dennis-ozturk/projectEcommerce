<?php
class Dbh {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "classicmodels";
    private $charset = "utf8";

    public function connect(){
        try{
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

    }
}