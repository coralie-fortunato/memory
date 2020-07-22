<?php
session_start();
require("classes/database.php");
require("score.php");

$db = new DataBase("localhost","root","","memory");
$db_connect = $db->connect();
$score = new score($db_connect );
$data = $score->scorebyLevel('3 paires');

if(isset($_POST['valider'])){

    if(isset($_POST['filtre']) && $_POST['filtre'] == 'nb_coup'){

        //var_dump($_POST['level']);
        $level= strval($_POST['level']); 
        $data = $score->scorebyLevel($level);
    
        //var_dump($data);

    }

    if(isset($_POST['filtre']) && $_POST['filtre'] == 'time'){

         //var_dump($_POST['level']);
        $level= strval($_POST['level']); 
        $data = $score->scorebytime($level);
        //var_dump($data);

    }


}



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
    <main class="main_wof">
        <h1>Wall of Fame</h1>

    <form action="" method="post" class="filter">

        <div>
            <p>Choisir le niveau</p>

            <select name="level" class="select_lvl">

                <?php for($i=3; $i<=16; ++$i):?>
                    <option value="<?= $i?> paires" ><?= $i ?> paires </option>
                <?php endfor ?>

            </select>


        </div>
        
        <div>
            <p>Trier par :</p>
            <input type="radio" name='filtre' value='time' id='time'>
            <label for='time'>Meilleur temps</label>

            <input type="radio" name='filtre' value='nb_coup' id="Nb_coups">
            <label for='Nb_coups'>Nombre de coups</label>


        </div>
        
        <button type="submit" name="valider">Valider</button>

        </form>

        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Joueur</th>
            <th>Niveau</th>
            <th>Meilleur Temps</th>
            <th>Nombre de coup</th>
        
        </tr>

        </thead>
       
        <tbody>
        <?php for($i=0; $i<count($data); $i++): ?>
    
            <tr>
                <td><?= $data[$i]['login'] ?></td>
                <td><?= $data[$i]['niveau'] ?></td>
                <td><?= $data[$i]['time'] ?></td>
                <td><?= $data[$i]['nb_coup'] ?></td>
                
            </tr>
        <?php endfor?>

        </tbody>
        
        
        
        </table>

    
    
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>