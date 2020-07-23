<h1>Memory</h1>

<nav>
    <?php if (isset($_SESSION['id'])) :?>
        <a href="profil.php">Mon compte</a>
        <div class="div_header">
            <span class="icon-logout"></span>
            <a href="log_out.php" > Se déconnecter</a>  
        </div>
        <div class="div_header">
            <span class="icon-trash"></span>
            <a href="supprimer_compte.php?supp=ok">Supprimer son compte</a>
        </div>
        
    <?php else : ?>
        <a href="connexion.php">Connexion</a>
        <a href="inscription.php">inscription</a>
        <a href="wall_of_fame.php">Wall of Fame</a>
    <?php endif ;?>

</nav>