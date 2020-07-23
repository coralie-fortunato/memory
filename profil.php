<?php 
session_start();

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id']; 

    require 'classes/database.php';
    require 'classes/User.php';
    require 'score.php';

    $bd = new Database("localhost","root","","memory");
    $connect = $bd->connect();
    
    $user = new User($bd);
    
    // RECUPERATION SCORE DU JOUEUR 
    $score_user= new score($connect);
    $resultat_score = $score_user->scoreUser($id);
    
    // RECUPERATION INFOS USER
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header><?php include 'includes/header.php' ; ?></header>
    <main class="main_profil">
       
        <div class="frame_profil">
        
            <h1>Mon compte</h1>
            

            <?php if (isset($_SESSION['erreur'])) { echo $_SESSION['erreur'];} ?>

            <form action="" method="post" >
            
                <input type="text" name="login" placeholder="login" value="<?php if (isset($resultat)) { echo $resultat['login'] ;} ?>">

                <input type="password" name="password1" placeholder="mot de passe">

                <input type="password" name="password2" placeholder="Confirmation mot de passe">

                <button type="submit" name="valider">Enregistrer</button>
            
            </form>
        </div>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Niveau</th>
                    <th>Meilleur Temps</th>
                    <th>Nombre de coup</th>
                
                </tr>

            </thead>
       
            <tbody>
        
    
                <?php for($i=0; $i<count($resultat_score); $i++): ?>
    
                <tr>
                    <td><?= $resultat_score[$i]['niveau'] ?></td>
                    <td><?= $resultat_score[$i]['time'] ?></td>
                    <td><?= $resultat_score[$i]['nb_coup'] ?></td>
        
                 </tr>
                <?php endfor?>
        

            </tbody>
        
        </table>
        
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
</body>
</html>
<?php unset($_SESSION['erreur']) ?>