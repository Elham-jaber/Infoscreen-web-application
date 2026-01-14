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
    <title>ESPACE GESTION</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Playfair+Display&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #eef2f3, #cfd9df);
            margin: 0;
            padding: 30px;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .divider {
            height: 3px;
            background: #2c3e50;
            width: 60px;
            margin: 0 auto 30px auto;
            border-radius: 2px;
        }

        .btn-profile {
            position: absolute;
            top: 20px;
            right: 30px;
        }

        table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        th {
            background-color: #2c3e50;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #e8f4fa;
        }

        .legend {
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
            text-align: center;
            font-style: italic;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 0.85rem;
            color: #666;
        }
    </style>
</head>

<body>
<div class="container">

    <!-- Bouton profil -->
    <div class="btn-profile">
        <a href="../session/admin_session.php" class="btn btn-outline-dark rounded-pill shadow-sm">
            <i class="bi bi-person-circle"></i> Mon Profil
        </a>
    </div>

    <!-- Titre -->
    <h2>Espace privée de la gestion des actualités.</h2>
    <div class="divider"></div>

    <?php
    $requete = "SELECT * FROM t_news_new ;";
    $result1 = $mysqli->query($requete);

    if ($result1 == false) {
        exit();
    } else {
        echo "<br /><br />";
        echo "<table class='table table-hover table-bordered'>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Pseudo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        while ($actu = $result1->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($actu['new_id']) . "</td>
                    <td>" . htmlspecialchars($actu['new_titre']) . "</td>
                    <td>" . htmlspecialchars($actu['new_date_de_publication']) . "</td>
                    <td>" . htmlspecialchars($actu['cpt_pseudo']) . "</td>
                    <td>
                        <form action='actu_action.php' method='POST'>
                            <input type='hidden' name='id' value='" . htmlspecialchars($actu["new_id"]) . "'/>
                            <button type='submit' class='btn btn-danger btn-sm' name='delete'>Supprimer</button>
                        </form>
                    </td>
                </tr>";
        }
        echo "</tbody></table>";
    }
    // Fermeture de la communication avec la base MariaDB
$mysqli->close();
    ?>

    <footer>
        &copy; 2025 Gestion des actualités. Tous droits réservés.
    </footer>
</div>
</body>
</html>
