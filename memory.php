<?php
require("classes/database.php");
require("score.php");
require("game.php");

$db = new DataBase("localhost","root","","memory");
$db_connect = $db->connect();
$success_msg=null;

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
    
    <main class="main_memory">

        <div class="go_back_button">
            <a href="index.php"><img src="src/icon/exit_icon.png" alt="go back icon"></a>

        </div>
        <h1 class="big_title">Memory GAME</h1>
        
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
                $myscore->insertScore( $_SESSION['id'], $_SESSION['level'], $time ,  $_SESSION['score'] );
                //header("Location: wall_of_fame.php");
                $success_msg="BRAVO! Vous avez gagné !";

            }  
           //var_dump($_SESSION['flipped_card']);  
               ?>
        </div >

        <?php if(isset($success_msg)): ?>
        <div class="animate__backInDown">
                    <div>
                        <p class="success"><?= $success_msg ?></p>

                    </div>
                    <div>
                        <a href="memory.php?restart" class="link_memory">Restart</a>

                    </div>
                    <div>
                        <a href="choice_level.php" class="link_memory">Changer de niveau</a>

                    </div>
                    <div>
                        <a href="wall_of_fame.php" class="link_memory">Wall Of Fame</a>

                    </div>
                    <div>
                        <p>Retrouvez toutes les images sur <a href="https://octodex.github.com/" target="blank"><img src="src/icon/cat.png" alt="logo github"></a></p>
                    </div>
                    

        </div>
        <?php endif ?>
           
           

        
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
    
</body>
</html>