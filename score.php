<?php
//session_start();

//require("classes/database.php");

class score{

    private $id;
    public $level;
    public $time;
    public $moves;
    public $db;

    public function __construct( $db)
    {

        $this->db = $db;
    }

    public function getId(){
        return $this->id;
    }

    public function insertScore($id, $level, $time, $moves){

        $this->id = $id;
        $this->level = $level;
        $this->time = $time;
        $this->moves = $moves;

        $req_insert = $this->db->prepare("INSERT INTO `score`( `id_utilisateur`, `niveau`, `nb_coup`, `time`) VALUES (?, ?, ?, ?)") ;
         //var_dump($req_insert);
         //var_dump($this->time);
         $req_insert->execute([$this->id , $this->level , $this->moves , $this->time]);
        

         return true;
         

    }

    public function fetchScore(){
        $req_fetch = $this->db->prepare("SELECT * from score inner join utilisateurs on score.id_utilisateur =  utilisateurs.id");
        $req_fetch->execute();
        $data = $req_fetch->fetchAll();
        var_dump($data);

        return true;
    }
    
    public function scorebyLevel($level){

        $req_level = $this->db->prepare("SELECT * FROM `score` WHERE niveau = ?");
        $req_level->execute([$level]);
        $data_level = $req_level->fetchAll();

        return true;
        

    }

}

?>