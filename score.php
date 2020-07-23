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
        

        $req_level = $this->db->prepare("SELECT login, niveau, nb_coup,
                                        DATE_FORMAT(time, '%i:%s') AS time
                                        FROM score 
                                        inner join utilisateurs 
                                        on score.id_utilisateur =  utilisateurs.id
                                        WHERE niveau = ? 
                                        ORDER BY score.nb_coup ASC 
                                        LIMIT 10 ");
        
        $req_level->execute([$level]);
        
        $data_level = $req_level->fetchAll();
        
        return $data_level;
        

    }

    public function scorebytime($level){
        $req_time = $this->db->prepare("SELECT login, niveau, nb_coup,
                                        DATE_FORMAT(time, '%i:%s') AS time
                                        FROM score 
                                        inner join utilisateurs 
                                        on score.id_utilisateur =  utilisateurs.id
                                        WHERE niveau = ? 
                                        ORDER BY score.time ASC
                                        LIMIT 10 ");
        $req_time->execute([$level]);
        $data_time =$req_time->fetchAll();

        return $data_time ;
    }

    public function scoreUser($id){
        $req_score= $this->db->prepare("SELECT * FROM score WHERE id_utilisateur = ?");
        $req_score->execute([$id]);
        $data_user =  $req_score->fetchAll();

        return $data_user;
    }

}

?>