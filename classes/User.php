<?php

class User {

    private $id;
    private $login;
    private $mdp;
    private $bd;
    private $connect;

    public function __construct($bd) {
       
        $this->bd = $bd;
        $this->connect = $this->bd->connect();
    }

    public function setLogin($id) {

        $requete = $this->connect->prepare("SELECT login FROM utilisateurs WHERE id = ?");
        $requete->execute([$id]);
        $resultat = $requete->fetch();
        
        return $resultat ;
    }

    public function issetLogin($login){

        $verification_login = $this->connect->prepare("SELECT count(*) FROM utilisateurs WHERE login = ?");
        $verification_login->execute([$login]);
        $resultat = $verification_login->fetch();
        return $resultat[0];
    }

    public function userRegister($login,$password1,$password2) {

       if ( !empty($login) && !empty($password1) && !empty($password2) ) {
            if ( $this->issetLogin($login) == 0) {
                if ($password1 == $password2) {
                    $newpassword = password_hash ( $_POST['password1'] , PASSWORD_DEFAULT );   
                    $requete = $this->connect->prepare("INSERT INTO `utilisateurs`( `login`, `password`) VALUES (?,?)");
                    $requete->execute([$login,$newpassword]); 
                    header('location: connexion.php');
                }
                else {
                    $_SESSION['erreur'] = "Mots de passe incorrect";
                }
            }
            else {
                $_SESSION['erreur'] = "Le login existe deja";
            }

        } 
        else {
        $_SESSION['erreur'] = "Tout les champs doivent etre remplis !";
        }
    }

    public function connexion($login,$password) {
        
        $requete = $this->connect->prepare("SELECT * FROM utilisateurs WHERE login = ? ");
        $requete->execute([$login]);
        $resultat = $requete->fetchall();

        if (!empty($this->issetLogin($login))) {

            if (password_verify ($password , $resultat[0][2] )){

                $_SESSION['id'] = $resultat[0]['id'];
                $_SESSION['login'] = $resultat[0]['login'];
                header('location: index.php');
    
            } else {
                $_SESSION['erreur'] = "Mot de passe et/ou login incorrect.";
            }

        } else {
            $_SESSION['erreur'] = "Mot de passe et/ou login incorrect.";
        }
    }

    public function Update($id,$login,$password1,$password2) {
       if ($login != '') {
            if ($this->issetLogin($login) == 0 || $login == $_SESSION['login']) {
                $this->login = $login;
                $update = $this->connect->prepare("UPDATE utilisateurs SET login= ? WHERE id= ?");
                $update->execute([$this->login,$id]);
                $_SESSION["login"] = $this->login; 
            }
            else {
                $_SESSION['erreur'] = "Login existe deja";
            }
        }
       
        if (!empty($password1) && !empty($password2)) {
            
            if ($password1 == $password2) {
                
                $passhash = password_hash ( $password1, PASSWORD_DEFAULT ) ;
                $update = $this->connect->prepare("UPDATE utilisateurs SET  password= ? WHERE id= ?");
                $update->execute([$passhash,$id]);
                $_SESSION["login"] = $this->login; 

            } else{
                $_SESSION['erreur'] = "Les mots de passe ne correspondent pas";
            }
        }
    }

    public function Delete($id) {
        $requete = $this->connect->prepare("DELETE FROM `utilisateurs` WHERE id = ?");
        $requete->execute([$id]);

        header('location: index.php');
    }
}
?>