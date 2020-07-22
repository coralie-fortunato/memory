<?php 
session_start();

require 'classes/database.php';
require 'classes/User.php';
$bd = new Database("localhost","root","","memory");

$user = new User($bd); 

$id = $_SESSION['id']; 
var_dump($id);

$resultat = $user->setLogin($id);
var_dump($resultat);

if (isset($_POST['valider'])) {

$login = $_POST['login'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
    
$user->update($id,$login,$password1,$password2);

}




if ($_GET['supp'] == "ok") {

  $user->delete($id);
    

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <main>
    <?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur'];} ?>
        <form action="" method="post">
        
            <input type="text" name="login" placeholder="login" value="<?php if (isset($resultat)) { echo $resultat['login'] ;} ?>">

            <input type="password" name="password1" placeholder="mot de passe">

            <input type="password" name="password2" placeholder="Confirmtion mot de passe">

            <input type="submit" name="valider">
        
        </form>

        <a href="profil.php?supp=ok">Supprimer</a>
    
    </main>
</body>
</html>
<?php unset($_SESSION['erreur']) ?>