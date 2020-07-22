<?php
require("card.php");
session_start();
//var_dump($_SESSION['flipped_card']);


class board{

    private $array=[];
    private $limit ;
    private $flipped_card=[];

   

     public function __construct($limit){

        if(isset($_SESSION['start']) && isset($limit))

        {
           
            $this->array = $_SESSION['game'];

        }
        else{

            
            for($i=0; $i < $limit ; $i++){
            
                $this->array[$i]= new card("closed", $i+1);
                
                $this->array[$i + $limit]= new card("closed", $i+1);
                //$this->array[$i + $limit]->id($i+ $limit);

                
            }    
 

            shuffle($this->array);

            for($i=0; $i<count($this->array); $i++){
            
                $this->array[$i]->id($i);
                
     
            }  



            $_SESSION['start'] = true;
            $_SESSION['game'] = $this->array;
            $_SESSION['begin_game'] =new datetime('now', new DateTimeZone('Europe/Paris'));
          
        }   
 

        $this->limit= $limit;
            
  
        return true;
    }



    public function display_board(){
        
        $board= " ";
        for($i=0; $i<count($this->array); $i++){
            
            
           $this->array[$i]->display_cards();
           

        }
        /*for($i=0; $i<count($this->array); $i++){
            
            $this->array[$i]->id($i);
            
 
        }*/  

        
        $_SESSION['game']=$this->array;
        
        return $board;
    }


    public function turncard($id){


        if(!isset($_SESSION['flipped_card']))
            $_SESSION['flipped_card']=[];
        
        
       $_SESSION['found_cards']= null;


        $this->array[$id]->turn();

        for($i=0; $i<count($this->array); $i++){
            if($this->array[$i]->get_status() == "opened"){
                if (! in_array( $this->array[$i], $_SESSION['flipped_card']))
                array_push($_SESSION['flipped_card'], $this->array[$i]);

            }
        }
        
    
        $_SESSION['game']= $this->array;

        switch(count($_SESSION['flipped_card'])){
            case 0:
                
            break;
            case 1:
                
        
            break;
            case 2:
                if($_SESSION['flipped_card'][0]->get_value() == $_SESSION['flipped_card'][1]->get_value()){
                    
                    $_SESSION['flipped_card'][0]->set_status("found");
                    $_SESSION['flipped_card'][1]->set_status("found");
                    
                    
                   unset($_SESSION['flipped_card']);
                   $_SESSION['flipped_card']=[];
                   
                   
                }


            break;

            case 3:
                $_SESSION['flipped_card'][0]->turn();
                $_SESSION['flipped_card'][1]->turn();
               // unset($_SESSION['flipped_card']);
               $new_tab = [];
               $_SESSION['flipped_card'] = $new_tab = [];

                
                
                //array_push($_SESSION['flipped_card'], $this->array[$id]);

                
               
                 
            //if($_SESSION['flipped_card'][2]->get_value() != $this->array[$id]->get_value()) $_SESSION['flipped_card'][3]->turn();
                //unset($_SESSION['flipped_card']);
                
            break; 
            

        }

        for($j=0; $j<count($this->array); $j++){
            if($this->array[$j]->get_status() == "found" ){
                $_SESSION['found_cards']++;
                
            }
            
        }
        if($_SESSION['found_cards'] == ($this->limit *2) ){
            $_SESSION['end_game']= new datetime('now', new DateTimeZone('Europe/Paris'));
            //echo "Bravo !! ";
        }
        

       
    }

   
   
}



?>