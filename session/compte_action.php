<?php
session_start();

$mysqli = new mysqli('localhost', 'e22110297sql', 'hD2JPt&5', 'e22110297_db1');

if ($mysqli->connect_errno) {
    echo '<div class="alert alert-danger" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 0, 0, 0.8); color: white;">Error: Problème de connexion à la BDD</div>';
    exit();
}

mysqli_report(MYSQLI_REPORT_OFF);

if (!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
    echo "Accès interdit ! Redirection...";
    header("refresh:3; url=../session/session.php");
    exit();
}

if (isset($_POST['pseudosel'])) {
    $pseudo_choix = $_POST['pseudosel'];

    // On récupère les infos du profil
    $sql = "SELECT * FROM t_profil_pfl WHERE cpt_pseudo='$pseudo_choix';";
    $result = $mysqli->query($sql);

    if (!$result || $result->num_rows == 0) {
        echo "Erreur lors de la récupération du profil.";
        exit();
    }

    $ligne = $result->fetch_assoc();

    if (isset($_POST['desactive'])) {
        // Changer la validité du profil
        if ($ligne["pfl_validite_du_profil"] == "A") {
            $new_validite = "D";
        } else {
            $new_validite = "A";
        }

        $sql2 = "UPDATE t_profil_pfl SET pfl_validite_du_profil='$new_validite' WHERE cpt_pseudo='$pseudo_choix';";

        if (!$mysqli->query($sql2)) {
            echo "Erreur lors de la mise à jour de la validité.";
            exit();
        } else {
            header("refresh:1; url=../session/gestion_compte.php");
            exit();
        }
    }

    if (isset($_POST['changer'])) {
        // Changer le statut du profil
        if ($ligne["pfl_statut"] == "R") {
            $new_statut = "G";
        } else {
            $new_statut = "R";
        }

        $sql3 = "UPDATE t_profil_pfl SET pfl_statut='$new_statut' WHERE cpt_pseudo='$pseudo_choix';";

        if (!$mysqli->query($sql3)) {
            echo "Erreur lors de la mise à jour du statut.";
            exit();
        } else {
            header("refresh:1; url=../session/gestion_compte.php");
            exit();
        }
    }
}

$mysqli->close();
?>
