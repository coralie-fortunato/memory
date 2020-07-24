<?php


    //fonction moyenne coup
    function recuperation_Moyenne_score($connect,$level,$id){

        $requete = $connect->prepare("SELECT count(*) FROM score WHERE niveau = ? AND id_utilisateur = ?");
        $requete->execute(array($level,$id));
        $resultat_nombre_partie = $requete->fetchall(); 
       
     
        if ( $resultat_nombre_partie[0][0] != 0 ) {
           
            $requete1 = $connect->prepare("SELECT SUM(nb_coup) FROM score WHERE niveau = ? AND id_utilisateur = ?");
            $requete1->execute(array($level,$id));
            $resultat_nombre_coups = $requete1->fetchall();  

            $moyenne_coup = ceil($resultat_nombre_coups[0][0] / $resultat_nombre_partie[0][0]) ;

            return  $moyenne_coup;
        }else {
           
            return false;

        }

    }

    //FONCTION CREATION ETOILES
    function StarsCreate($compteur) {
        for ($j = 0 ; $j < $compteur ; $j++) {
            echo '<span class="icon-star"></span>';
        }      
    }

?>