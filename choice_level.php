<?php
session_start();
unset($_SESSION['game'], $_SESSION['begin_game'], $_SESSION['end_game'], $_SESSION['start']);
//session_destroy();


if(isset($_POST['valider'])){
    $nb_paires = intval($_POST['nb_paires']);
    $_SESSION['nb_paires'] = $nb_paires ;
    $_SESSION['level'] = $_POST['nb_paires'] . " " .'paires';
    header('Location:memory.php?start');

}
//var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<main class="main_lvl">

    
    <div class="go_back_button">
        <a href="index.php"><img src="src/icon/exit_icon.png" alt="go back icon"></a>

    </div>

    <div class="frame">

        <h1>Choix de la difficulté</h1>

        <form action="" method="post">
        <select name="nb_paires">

        <?php for($i=3; $i<=16; ++$i):?>
            <option value=<?= $i ?> ><?= $i ?> paires</option>
        <?php endfor ?>

        </select>

        <button type="submit" name="valider">Valider</button>

        </form>



    </div>
    

</main>
<footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>