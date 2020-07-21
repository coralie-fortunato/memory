<?php

require("game.php");


if(isset($_GET['restart'])){
    unset($_SESSION);
    session_destroy();
    header("Location:index.php");
    session_start();

}

var_dump($_SESSION['begin_game']);



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Memory</title>
</head>
<body>
    <main>
        
           <div class="grid">
               <?php
              
               if(!isset($_GET['id'])){
                $game = new board(4);
                //$game->display_board();
            }
            
            
            if(isset($_GET['id'])){
                
                $game = new board(4);
                
                $game->turncard($_GET['id']);

                if(!isset($_SESSION['score'])){
                    $_SESSION['score']=null;
                }
                $_SESSION['score']++;
                //var_dump($_SESSION['score']);
                
            }


          
            $game->display_board();

            if(isset($_SESSION['end_game'])){
                var_dump($_SESSION['end_game']);
                $total_time = $_SESSION['begin_game']->diff($_SESSION['end_game']);
                var_dump($total_time);
                echo $total_time->format('%i minutes  et %s secondes');
            }  
           //var_dump($_SESSION['flipped_card']);  
               ?>
           </div>

           <a href="index.php?restart">Restart</a>
           

       
    </main>
</body>
</html>