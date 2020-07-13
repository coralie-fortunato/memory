<?php
session_start();
require("test.php");

class board{

    private $array=[];

     public function __construct($limit){


        for($i=1; $i <= $limit; $i++){

            $cards= new card("closed", $i);
            array_push($this->array, $cards);
        }
        $new_array = array_merge($this->array, $this->array);
        $this->array = $new_array;
        
        //shuffle($this->array);
        //var_dump(count($this->array));
        var_dump($this->array[0]);
        for($i=0; $i<count($this->array); $i++){
             //echo $i . " ";    
            $this->array[$i]->id($i);
            //echo  $this->array[$i]->getId() . " ";

            //var_dump($this->array);
 
       }
       /*for ($x = 0; $x < count($this->array); $x++){
        echo  $this->array[$x]->getId() . " ";
       }*/
       $_SESSION['game'] = $this->array;
       //var_dump($_SESSION['game']);
        return $this->array;
    }
}



?>