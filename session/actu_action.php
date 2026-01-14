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

if (isset($_POST['id'])) {
    $actu_id =$_POST['id'];

    // On récupère le profil pour savoir s’il est actif ou désactivé
    $sql = "SELECT * FROM t_news_new WHERE new_id='$actu_id';";
    $result = $mysqli->query($sql);

    if (!$result) {
        echo "Erreur lors de la récupération de new .";
        exit();
    }

    $ligne = $result->fetch_assoc();

    if ($ligne) {
            $sql2 = "DELETE FROM  t_news_new  WHERE new_id ='$actu_id';";
        } else {
            echo "problème de ID";
        }

        if (!$mysqli->query($sql2)) {
            echo "Erreur";
            exit();
        } else {
            header("refresh:1; url=../session/gestion_actualite.php");
            exit();
        }
    } else {
        echo "error de ligne ";
    }


$mysqli->close();
?>
