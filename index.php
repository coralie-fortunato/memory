<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    
    <title>Document</title>
</head>
<body>
    

    <main class="main_index">

        

        <div class="div_left">
            <div><img src="src/img/IMG14.png" alt="photo octodex" class="img_index" > </div>
            <div><img src="src/img/IMG15.png" alt="photo octodex" class="img_index" ></div>
            <div><img src="src/img/IMG16.png" alt="photo octodex" class="img_index" ></div>
        </div>

        <div class="index_choice">
            <h1 class="big_title">Memory GAME</h1>
        <?php if(isset($_SESSION['login'])): ?>
            <h1 class="choices"><a href="choice_level.php" class="link_index">Nouveau Jeu</a></h1>
            <h1 class="choices"><a href="wall_of_fame.php" class="link_index">Wall of Fame</a></h1>
            <h1 class="choices"><a href="profil.php" class="link_index">Profil</a></h1>
            <h1 class="choices"><a href="log_out.php" class="link_index">Deconnexion</a></h1>

        <?php endif ?>
        <?php if(!isset($_SESSION['login'])): ?>
            <h1 class="choices"><a href="connexion.php" class="link_index">Se connecter</a></h1>
            <h1 class="choices"><a href="inscription.php" class="link_index">S'inscrire</a></h1>
            <h1 class="choices"><a href="wall_of_fame.php" class="link_index">Wall of Fame</a></h1>

        <?php endif ?>

        </div>
        <div class="div_right">
            <div><img src="src/img/IMG13.png" alt="photo octodex" class="img_index" ></div>
            <div><img src="src/img/IMG12.png" alt="photo octodex" class="img_index" ></div>
            <div><img src="src/img/IMG11.png" alt="photo octodex" class="img_index" ></div>
        </div>


    </main>

   <footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>