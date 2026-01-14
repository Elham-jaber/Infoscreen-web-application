<?php
session_start();

$mysqli = new mysqli('localhost', 'e22110297sql', 'hD2JPt&5', 'e22110297_db1');
if ($mysqli->connect_errno) {
    echo '<div class="alert alert-danger" role="alert" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; background-color: rgba(255, 0, 0, 0.8); color: white;">Erreur : connexion BDD</div>';
    exit();
}

mysqli_report(MYSQLI_REPORT_OFF);

if (!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
    echo "Accès interdit ! Redirection...";
    header("refresh:3; url=../session/session.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace Administration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 80px;
        }

        .navbar {
            background: #2c3e50;
        }

        .navbar .navbar-brand, .navbar .nav-link {
            color: #ffffff !important;
        }

        .navbar .nav-link:hover {
            color: #1abc9c !important;
        }

        .content {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 800px;
            width: 90%;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 20px;
        }

        h2 {
            color: #3498db;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 20px;
            color: #2c3e50;
        }

        p {
            font-size: 1rem;
            color: #555;
        }

    </style>
</head>
<body>

<?php
// Barre de navigation pour RÉDACTEUR
if ($_SESSION['role'] == 'R') {
    echo '
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Espace Rédacteur</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="gestion_categorie.php">Gestion des catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>';
}

// Barre de navigation pour GESTIONNAIRE
elseif ($_SESSION['role'] == 'G') {
    echo '
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Espace Gestionnaire</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="gestion_compte.php">Gestion des Comptes/profils</a></li>
                    <li class="nav-item"><a class="nav-link" href="gestion_actualite.php">Gestion des actualités</a></li>
                    <li class="nav-item"><a class="nav-link" href="gestion_categorie.php">Gestion des catégories</a></li>
                    <li class="nav-item"><a class="nav-link" href="deconnexion.php">Déconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>';
}
?>

<div class="content mt-5">
    <h1>ESPACE ADMINISTRATION</h1>
    <h2>Bienvenue <?php echo $_SESSION['login'] ?></h2>
    <h3>Votre profil :</h3>
    <p><?php echo $_SESSION['nom']. '-' .  $_SESSION['prenom'].'-'. $_SESSION['login'].'-'.$_SESSION['role']?></p>

    <?php
    if ($_SESSION['role'] == 'R') {
        echo "<h3>Vous êtes <strong>rédacteur</strong> de ce site.</h3>";
    } elseif ($_SESSION['role'] == 'G') {
        $req4="SELECT COUNT(*) AS nb_prof FROM t_profil_pfl;";
        $result = $mysqli->query($req4);
        if (!$result || $result->num_rows == 0) {
            echo "Erreur lors de la récupération du profil.";
            exit();
        }
        $ligne = $result->fetch_assoc();
        echo '<p>Vous administrez : <strong>'. $ligne['nb_prof']. '</strong> profil(s)</p>';
        echo "<h3>Vous êtes <strong>gestionnaire</strong> de ce site.</h3>";
    }
    // Fermeture de la communication avec la base MariaDB
$mysqli->close();
    ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
