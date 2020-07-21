<?php

class DataBase {

    private $host;
    private $utilisateur;
    private $mdp;
    private $name;
    private $bd;

    public function __construct($host,$utilisateur,$mdp,$name){
        $this->host = $host;
        $this->utilisateur = $utilisateur;
        $this->mdp = $mdp;
        $this->name = $name;
    }

    public function connect() {
        try {
            $this->bd = new PDO("mysql:host=$this->host;dbname=$this->name", $this->utilisateur, $this->mdp);
            return $this->bd;
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
        
        }
    }

    public function disconnect() {
        $his->bd->close();
    }
}



?>