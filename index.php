<?php
$_SESSION['game']=null;
require("game-test.php");



//unset($_SESSION);
//session_destroy();
//var_dump($_SESSION);




?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <main>
        

           <?php 

           $game = new board(12);
           //$game->display_board();

               
                
                
           
            
            


            
               

            
            

            

            /*if(isset($_GET['id'])){
                $game->turncard($_GET['id']);
                

            }*/
            
            /*if(!isset($_SESSION['gamestart'])){
                $game= new game(true);
                
            }
            else{
                $game->display_board();
            }*/
            
                
            /*if(!isset($_SESSION['game'])){
                $game->getboard();
            }

            $game->showcards();

            if(isset($_GET['id'])){
                $game->turncard($_GET['id']);
                

            }*/
            
            

           ?>
           
           
           
       
    </main>
</body>
</html>