<?php

   class card{

        private $status = 'closed';
        private $card_value;
        private $id = 0;
       // private $position;
        

        public  function __construct($s, $v){
             $this->status= $s;
            $this->card_value = $v;
            //$this->id = $i;

        }

        public function id($id){
            //echo $id;
            $this->id = $id;
           
            return $this->id;

        }
        public function position($value){
            $this->position= $value;
        }

        public function getId(){
            return $this->id;
        }

        public function get_status($status){
            
            $this->status = $status;

        }
        public function turn(){
            
                if($this->status == "closed"){
                    $this->status = "opened";
                }
                else{
                    $this->status = "closed"; 
                }
            
        }

        /*public function set_value($value){
             $this->card_value = $value;
             //return $this->card_value;
        }*/

        public function get_value(){
            $this->card_value;
        }

        public function display_cards(){

            //$this->position= $position ;

            
            if( $this->status == "closed"){
                
                echo "<a href= \"index.php?id=$this->id\"><button type=button name=closed >?</button></a>";
            }
            elseif($this->status == "opened"){
                
                echo "<span>$this->card_value</span>";
            }
        }
     
      
   }     

?>