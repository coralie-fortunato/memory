<?php 
session_start();

if (isset($_SESSION['id'])) {

    $id = $_SESSION['id']; 
    
    require 'classes/database.php';
    require 'classes/User.php';
    require 'classes/score.php';
    require 'fonctions/functions.php';

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
else {
    header("location: index.php");
}


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>
<body>
    
    <main class="main_profil">

    <div class="go_back_button">
        <a href="index.php"><img src="src/icon/exit_icon.png" alt="go back icon"></a>

    </div>

    <?php if (!isset($_GET['modif'])) :?>
           
        
        
            <div class="div_tableau1">
                <h3>Tableau des scores</h3>
                <table class="table table-dark table-hover table_profil">
                    
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
            </div>
            <section class="section"> 
                <div class="div_tableau2">
                    <h3>Scores moyens</h3>
                    <table class="table table-bordered table-hover table_profil2">
                        
                        <thead class="thead-dark">
                                <tr>
                                    <th>Niveau</th>
                                    <th>Score Moyen</th>
                                    <th>Etoiles</th>
                                </tr>
                        </thead>
                        <tbody class="bg-secondary text-center">
                            <?php for ($i = 3 ; $i <= 13 ; $i++):?>
                            <?php if (recuperation_Moyenne_score($connect,"$i paires", $id) != false) :?>
                                <tr>
                                    <td><?= $i ?> Paires</td>
                                    <td><?= recuperation_Moyenne_score($connect,"$i paires", $id) ?> coups</td>
                                    <?php if ( recuperation_Moyenne_score($connect,"$i paires", $id)>= ($i * 2) && recuperation_Moyenne_score($connect,"$i paires", $id) <= ($i * 2) + 10 ) :?>
                                        <td>
                                            <?php StarsCreate(4) ?>
                                        </td>
                                    <?php elseif (recuperation_Moyenne_score($connect,"$i paires", $id) > ($i * 2) + 10 && recuperation_Moyenne_score($connect,"$i paires", $id) <= ($i * 2) + 20) :?>
                                        <td>
                                            <?php StarsCreate(3) ?>
                                        </td>
                                    <?php elseif (recuperation_Moyenne_score($connect,"$i paires", $id) > ($i * 2) + 20 && recuperation_Moyenne_score($connect,"$i paires", $id) <= ($i * 2) + 30) :?>
                                        <td>
                                            <?php StarsCreate(2) ?>
                                        </td>
                                    <?php elseif (recuperation_Moyenne_score($connect,"$i paires", $id) > ($i * 2) + 30) :?>
                                        <td>
                                            <?php StarsCreate(1) ?>
                                        </td>
                                    
                                    <?php endif ;?>
                                </tr>
                            <?php endif ;?>
                        <?php endfor ;?>
                        </tbody>
                    </table>
                </div>
            </section>
      
            <div class="supprimer">
                <a href="supprimer_compte.php?supp=ok" class="btn btn-danger icon-trash">Supprimer son compte</a>
                <a href=" profil.php?modif" class="btn btn-warning" >Modifier son compte</a>
            </div>
        
        <?php else :?>
            <div class="frame_profil">

                <h3>Modifier son compte</h3>

                <?php if (isset($_SESSION['erreur'])) { echo "<p class='alert alert-danger'>".$_SESSION['erreur']."</p>";} ?>
                <?php if (isset($_SESSION['success'])) { echo "<p class='alert alert-success w-25 m-auto'> ".$_SESSION['success']."</p>";} ?>

                <form action="" method="post" >
                    <input type="text" name="login" placeholder="login" value="<?php if (isset($resultat)) { echo $resultat['login'] ;} ?>">
                    <input type="password" name="password1" placeholder="mot de passe">
                    <input type="password" name="password2" placeholder="Confirmation mot de passe">
                    <button class="btn btn-light  btn-enregistrer d-block m-auto" type="submit" name="valider">Enregistrer</button> 
                </form> 

                <a href="profil.php" class="btn btn-warning m-auto d-block btn-retour">Retour</a>
            </div>
           
        <?php endif ;?>  
    </main>
    <footer><?php include 'includes/footer.php'; ?></footer>
  
</body>
</html>
<?php unset($_SESSION['erreur'],$_SESSION['success']) ?>