<?php
session_start();

if (isset($_POST['valider'])) {

  require 'classes/database.php';
  require 'classes/User.php';

  $login = $_POST['login'];
  $password1 = $_POST['password1'];
  $password2 = $_POST['password2'];
  
  $bd = new Database("localhost","root","","memory");
  $user = new User($bd);
  $user->UserRegister($login,$password1,$password2);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    
    <title>Inscription</title>
</head>
<body>
    <header><?php include 'includes/header.php' ; ?></header>
    <main class="main_lvl">
        <div class="frame">

            <h1>S'inscrire</h1>

            <?php if (isset($_SESSION['erreur'])) {echo "<p>".$_SESSION['erreur']."</p>" ;} ?>
            <form action="" method="POST">

                <input type="text" name="login" placeholder="Login">

                <input type="password" name="password1" placeholder="Mot de passe">

                <input type="password" name="password2" placeholder="Confirmation mot de passe">

                <button type="submit" name="valider">Valider</button>

            
            </form>

        </div>
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
        
</body>
</html>

<?php unset($_SESSION['erreur']) ?>