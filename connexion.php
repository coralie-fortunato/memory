<?php
session_start();
    if (isset($_POST['valider'])) {

        require 'classes/database.php';
        require 'classes/User.php';

        $bd = new Database("localhost","root","","memory");

        $user = new User($bd);
        
        $user->connexion($_POST['login'],$_POST['password']);
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <main class="main_lvl">
        <div class="frame">
            <h1>Se connecter</h1>


            <?php if (isset($_SESSION['erreur'])) { echo "<p>".$_SESSION['erreur']."</p>"; } ?>
            <form action="" method="POST" >

                <input type="text" name="login" placeholder=" Login :">

                <input type="password" name="password" placeholder=" Mot de passe : ">

                <button type="submit" name="valider">Valider</button>
            
            </form>
        </div>
    </main>
    
</body>
</html>

<?php unset($_SESSION['erreur']) ?>