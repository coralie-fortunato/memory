<?php 
session_start();

if (isset($_SESSION['id'])) {

    require 'classes/database.php';
    require 'classes/User.php';

    $bd = new Database("localhost","root","","memory");
    
    $user = new User($bd); 
    
    $id = $_SESSION['id']; 
    
    $resultat = $user->setLogin($id);
    
    if (isset($_POST['valider'])) {
    
        $login = $_POST['login'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
            
        $user->update($id,$login,$password1,$password2);  
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
    <title>Document</title>
</head>
<body>
    <header><?php include 'includes/header.php' ; ?></header>
    <main class="main_lvl">
       
        <div class="frame">
        
            <h1>Mon compte</h1>
            

            <?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur'];} ?>

            <form action="" method="post" class="form_profil">
            
                <input type="text" name="login" placeholder="login" value="<?php if (isset($resultat)) { echo $resultat['login'] ;} ?>">

                <input type="password" name="password1" placeholder="mot de passe">

                <input type="password" name="password2" placeholder="Confirmation mot de passe">

                <button type="submit" name="valider">Enregistrer</button>
            
            </form>
            
            <!-- <div class="div">  
                <button title="Déconnexion"><a href="log_out.php"><span class="icon-logout"></span></a></button>
                <button title="Supprimer son compte"><a href="supprimer_compte.php?supp=ok"><span class="icon-trash"></span></a></button>   
            </div> -->
        </div>
        
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>
<?php unset($_SESSION['erreur']) ?>