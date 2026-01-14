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


if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
}

if (isset($_POST['url_id'])) {
    $url_final = $_POST['url_id'];
}

// Étape 1 : Supprimer association si elle existe
if ($cat_id !== '') {
    $sql1 = "DELETE FROM t_association_ast WHERE cat_id = '$cat_id';";
    $mysqli->query($sql1);
}

// Étape 2 : Supprimer URL si elle existe
if ($url_final !== '') {
    $sql2 = "DELETE FROM t_url_url WHERE url_id = '$url_final';";
    $mysqli->query($sql2);
}

// Étape 3 : Supprimer les informations liées à la catégorie
if ($cat_id !== '') {
    $sql3 = "DELETE FROM t_information_inf WHERE cat_id = '$cat_id';";
    $mysqli->query($sql3);
}

// Étape 4 : Supprimer la catégorie elle-même
if (isset($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];

    $sql = "SELECT * FROM t_categorie_cat WHERE cat_id = '$cat_id'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows > 0) {
        $sql4 = "DELETE FROM t_categorie_cat WHERE cat_id = '$cat_id';";

        if ($mysqli->query($sql4)) {
            header("refresh:0.5; url=../session/gestion_categorie.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de la catégorie.";
        }
    } else {
        echo "Catégorie introuvable.";
    }
}

$mysqli->close();
?>

