<a href="index.php"><h1>Memory</h1></a>

<nav>
    <?php if (isset($_SESSION['id'])) :?>
        <a href="wall_of_fame.php">Wall of Fame</a>
        <a href="choice_level.php">Nouveau jeu</a>
        <a href="profil.php">Mon compte</a>
        <div class="div_header">
            <span class="icon-logout"></span>
            <a href="log_out.php" > Se déconnecter</a>  
        </div>
        
    <?php else : ?>
        <a href="connexion.php">Connexion</a>
        <a href="inscription.php">inscription</a>
        <a href="wall_of_fame.php">Wall of Fame</a>
    <?php endif ;?>

</nav>