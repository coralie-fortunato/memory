<?php
require("classes/database.php");
require("score.php");
require("game.php");

$db = new DataBase("localhost","root","","memory");
$db_connect = $db->connect();


if(isset($_GET['restart'])){

    unset($_SESSION['game'], $_SESSION['begin_game'], $_SESSION['end_game'], $_SESSION['start'], $_SESSION['score']);
    //session_destroy();
    header("Location:memory.php");
    //session_start();

}
//var_dump($_SESSION);



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
               
                $game = new board($_SESSION['nb_paires']);
                
                //$game->display_board();
            }

            if(isset($_GET['start'])){
                unset($_SESSION['start'], $_SESSION['flipped_card'], $_SESSION['score']);
                $game = new board($_SESSION['nb_paires']);
                //$game->display_board();
            }

                
            if(isset($_GET['id'])){
                
                $game = new board($_SESSION['nb_paires']);
                
                $game->turncard($_GET['id']);

                if(!isset($_SESSION['score'])){
                    $_SESSION['score']=null;
                }
                $_SESSION['score']++;
                //var_dump($_SESSION['score']);
                
            }


            $game->display_board();

            if(isset($_SESSION['end_game'])){
                //var_dump($_SESSION['end_game']);
                $total_time = $_SESSION['begin_game']->diff($_SESSION['end_game']);
                $time =$total_time->format('%H:%i:%s');
                //echo $time;
               

                $myscore =  new score($db_connect);
                $myscore->insertScore( 1, $_SESSION['level'], $time ,  $_SESSION['score'] );
                header("Location: wall_of_fame.php");
            }  
           //var_dump($_SESSION['flipped_card']);  
               ?>
           </div>

           <a href="memory.php?restart">Restart</a>
           

       
    </main>
</body>
</html>