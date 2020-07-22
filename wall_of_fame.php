<?php
session_start();
require("classes/database.php");
require("score.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="style.css">
    
    <title>Wall of fame</title>
</head>
<body>
    <header><?php include 'includes/header.php' ; ?></header>
    <main>
    <form action="" method="post">
        <select name="level">

        <?php for($i=3; $i<=16; ++$i):?>
            <option value=<?= $i ?> ><?= $i ?> paires</option>
        <?php endfor ?>


        </select>

        <button type="submit" name="valider">Valider</button>

        </form>

        <table>
        <th>
            <td>Joueur</td>
            <td>Niveau</td>
            <td>Meilleur Temps</td>
            <td>Nombre de coup</td>
        
        </th>
        <tr></tr>
        
        
        </table>

    
    
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>