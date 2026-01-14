<!DOCTYPE html>
<htm lang="fr">
<head>
    <style>
        body {
    background-image: url('../assets/session.jpg');
    background-size: cover; /* L'image va couvrir toute la page */
    background-position: center; /* Centrer l'image */
    background-attachment: fixed; /* L'image reste fixe quand on fait défiler la page */
    background-repeat: no-repeat; /* Empêche la répétition de l'image */
    height: 100vh; /* Assurez-vous que le corps de la page occupe toute la hauteur de l'écran */
}


    </style>
</head>

<body>

<?php
$mysqli = new mysqli('localhost', 'e22110297sql', 'hD2JPt&5', 'e22110297_db1');
if ($mysqli->connect_errno) {
    // Affichage d'un message d'erreur
    echo '<div class="alert alert-danger" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 0, 0, 0.8); color: white;">Error: Problème de connexion à la BDD</div>';
    // Arrêt du chargement de la page
    exit();
}

// Instruction à rajouter depuis PHP 8.1
mysqli_report(MYSQLI_REPORT_OFF);

// Ouverture d'une session
session_start();

if (!empty($_POST["pseudo"]) && !empty($_POST["mdp"])) {

    $id = htmlspecialchars(addslashes($_POST['pseudo']));
    $motdepasse = htmlspecialchars(addslashes($_POST['mdp']));
    $sql = "
    SELECT pfl_nom, pfl_prenom, pfl_statut, pfl_validite_du_profil, cpt_pseudo 
    FROM t_profil_pfl 
    JOIN t_compte_cpt USING (cpt_pseudo) 
    WHERE cpt_pseudo = '" . $id . "' 
    AND cpt_mot_de_passe = MD5('" . $motdepasse . "') 
    AND pfl_validite_du_profil = 'A';
    ";

    $resultat = $mysqli->query($sql);

    if ($resultat == false) {
        // La requête a échoué
        echo '<div class="alert alert-danger" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 0, 0, 0.8); color: white;">Error: Problème d\'accès à la base</div>';
        exit();
    } else {
        $ligne = $resultat->fetch_assoc();
        if ($resultat->num_rows == 1 && $ligne["pfl_validite_du_profil"] == 'A') {
            $statut = $ligne['pfl_statut'];
            $nom= $ligne['pfl_nom'];
            $prenom= $ligne['pfl_prenom'];
            $validite=$ligne['pfl_validite_du_profil'];

            // Mise à jour des données de la session

            $_SESSION['login'] = $id;
            $_SESSION['role'] = $statut;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['pfl_validite_du_profil']= $validite;

            // Affichage d'un message de succès
            echo '<div class="alert alert-success" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(0, 255, 0, 0.8); color: white;">Connexion réussie !</div>';

  
            header("refresh:3; url= ../session/admin_session.php");
            exit();
        } else {
 
            echo '<div class="alert alert-danger" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 0, 0, 0.8); color: white;">Pseudo/mot de passe incorrect(s) ou profil inconnu !</div>';
            //echo "<br /><a href='../session.php'>Cliquez ici pour réafficher le formulaire</a>";
            header("refresh:3; url= ../session/session.php");
        }
    }

} else {
    // Affichage d'un message d'erreur si les champs ne sont pas remplis
    echo '<div class="alert alert-warning" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 255, 0, 0.8); color: black;">Veuillez remplir tous les champs.</div>';
    header("refresh:3; url= ../session/session.php");
}

// Fermeture de la communication avec la base MariaDB
$mysqli->close();
?>
</body>