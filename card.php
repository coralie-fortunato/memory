<?php

   class card{

        private $status;
        private $card_value;
        private $id;
       
    public  function __construct($s, $v){
         $this->status= $s;
        $this->card_value = $v;
             
    }

    public function id($id){
        
        $this->id = $id;
           
        return $this->id;

    }

    public function get_status(){
            
        return $this->status ;

    }

    public function turn(){
            
        if($this->status == "closed"){
            $this->status = "opened";
        }
        else{
            $this->status = "closed"; 
        }
            
    }

    public function set_status($status){
        $this->status = $status;
        return $this->status;
    }

    public function get_value(){
        return $this->card_value;
    }

    public function display_cards(){

        if( $this->status == "closed"){
                
            echo "<div><a href= \"memory.php?id=$this->id\"><img src =\"src/img/cloud.jpg\" alt=\"carte_retourné\" class=\"covered\"></a></div>";
        }
        elseif($this->status == "opened"){
                
            echo "<div><img src='src/img/IMG$this->card_value.png' alt=\"carte_decouverte\"></div>";
        }
        elseif($this->status == "found"){
            echo "<div><img src='src/img/IMG$this->card_value.png' alt=\"carte_decouverte\"></div>";

        }
            
    }
     
      
}     

?>