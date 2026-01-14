
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ESPACE GESTION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .center-alert {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        text-align: center;
    }
</style>
    </style>

<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli('localhost', 'e22110297sql', 'hD2JPt&5', 'e22110297_db1');
if ($mysqli->connect_errno) {
    echo '<div class="center-alert"><div class="alert alert-danger w-50">Erreur : connexion BDD</div></div>';
    exit();
}

mysqli_report(MYSQLI_REPORT_OFF);

// Vérification session
if (!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
    echo '<div class="center-alert"><div class="alert alert-warning w-50">Accès interdit ! Redirection...</div></div>';
    header("refresh:3; url=../session/session.php");
    exit();
}

// Si bouton "Ajouter" est cliqué
if (isset($_POST['ajout'])) {
    $_POST['role'] = $_SESSION['role'];
    if (empty($_POST['cat_id']) || empty($_POST['cat_titre']) || !is_numeric($_POST['cat_id'])) {
        echo '<div class="center-alert"><div class="alert alert-warning w-50">Veuillez remplir les deux premiers champs avec un ID numérique !</div></div>';
        header("refresh:3; url=../session/gestion_categorie.php");
    } else {
        $cat_id = htmlspecialchars(addslashes($_POST['cat_id']));
        $cat_titre = htmlspecialchars(addslashes($_POST['cat_titre']));
        $inf_texte = htmlspecialchars(addslashes($_POST['inf_texte']));
        $statut = htmlspecialchars(addslashes($_POST['cat_statut']));
        $pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
        $role = htmlspecialchars(addslashes($_POST['role']));
        
        if (!empty($_POST['pseudo'])) {
            $req = "SELECT * from t_compte_cpt where cpt_pseudo='$pseudo';";
            $res = $mysqli->query($req);
            if ($res->num_rows > 0) {
                $sql = "INSERT INTO t_categorie_cat (cat_id, cat_titre, cat_statut, cat_date_ajout) 
                VALUES ('$cat_id', '$cat_titre', '$role', CURRENT_DATE)";
                $result = $mysqli->query($sql);

                if ($result) {
                    $sql1 = "INSERT INTO t_information_inf (inf_texte, inf_date_ajout, inf_fichier_image, inf_etat, cpt_pseudo, cat_id) 
                        VALUES ('$inf_texte', CURRENT_DATE, '', '$statut', '$pseudo', '$cat_id')";
                    $result1 = $mysqli->query($sql1);

                    header("refresh:0.5; url=../session/gestion_categorie.php");
                } else {
                    echo '<div class="center-alert"><div class="alert alert-danger w-50">Erreur : ID déjà utilisé.</div></div>';
                    header("refresh:3; url=../session/gestion_categorie.php");
                }
            } else {
                echo '<div class="center-alert"><div class="alert alert-danger w-50">Veuillez entrer un pseudo qui existe !</div></div>';
                header("refresh:3; url=../session/gestion_categorie.php");
            }
        } else {
            echo '<div class="center-alert"><div class="alert alert-warning w-50">Veuillez entrer un auteur !</div></div>';
            header("refresh:3; url=../session/gestion_categorie.php");
        }
    }
}

// Si bouton "Modifier" est cliqué
if (isset($_POST['modif'])) {
    if (empty($_POST['cat_id1']) || empty($_POST['cat_titre1']) || !is_numeric($_POST['cat_id1'])) {
        echo '<div class="center-alert"><div class="alert alert-warning w-50">Veuillez remplir les champs requis avec un ID numérique !</div></div>';
        header("refresh:3; url=../session/gestion_categorie.php");
    } else {
        $cat_id1 = htmlspecialchars(addslashes($_POST['cat_id1']));
        $cat_titre1 = htmlspecialchars(addslashes($_POST['cat_titre1']));
        $inf_texte1 = htmlspecialchars(addslashes($_POST['inf_texte1']));
        $statut1 = htmlspecialchars(addslashes($_POST['cat_statut1']));
        $pseudo1 = htmlspecialchars(addslashes($_POST['pseudo1']));

        $sql1 = "UPDATE t_information_inf 
                 SET inf_texte = '$inf_texte1', inf_etat = '$statut1', cpt_pseudo = '$pseudo1'
                 WHERE cat_id = '$cat_id1'";
        $sql2 = "UPDATE t_categorie_cat SET cat_titre = '$cat_titre1' WHERE cat_id = '$cat_id1'";

        $result1 = $mysqli->query($sql1);
        $result2 = $mysqli->query($sql2);

        if ($result1 && $result2) {
            header("refresh:0.5; url=../session/gestion_categorie.php");
        } else {
            echo '<div class="center-alert"><div class="alert alert-danger w-50">Erreur lors de la modification. Vérifiez les données.</div></div>';
            header("refresh:3; url=../session/gestion_categorie.php");
        }
    }
}

$mysqli->close();
?>

