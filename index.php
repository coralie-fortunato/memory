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
    <header><?php include 'includes/header.php'; ?></header>

    <main class="main_index">

        

        <div class="div_left">
            <div><img src="src/img/IMG14.png" alt="photo octodex" class="img_index" > </div>
            <div><img src="src/img/IMG15.png" alt="photo octodex" class="img_index" ></div>
            <div><img src="src/img/IMG16.png" alt="photo octodex" class="img_index" ></div>
        </div>

        <div class="index_choice">
            <h1 class="big_title">Memory GAME</h1>
        <?php if(isset($_SESSION['login'])): ?>
            <h1><a href="choice_level.php" class="link_index">Nouveau Jeu</a></h1>
            <h1><a href="wall_of_fame.php" class="link_index">Wall of Fame</a></h1>

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