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
            background: linear-gradient(135deg, #f0f2f5, #d6e4f0);
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
            background-color: #e9f7ff;
        }

        caption {
            text-align: right;
            font-weight: bold;
            padding-bottom: 10px;
            font-size: 0.95rem;
            color: #444;
        }

        .btn-default {
            background-color: #dee2e6;
            color: #212529;
            border: 1px solid #ced4da;
        }

        .btn-default:hover {
            background-color: #cbd3da;
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

    <h2>Espace privée de la gestion COMPTE/PROFIL</h2>
    <div class="divider"></div>

    <?php
    $req2 = "SELECT pfl_nom , pfl_prenom, pfl_validite_du_profil , pfl_statut , cpt_pseudo FROM t_profil_pfl join t_compte_cpt using (cpt_pseudo);";
    $result1 = $mysqli->query($req2);

    if ($result1 == false) {
        exit();
    } else {
        echo "<caption>
            A: profil activé <br>
            D: profil désactivé <br>
            R: profil avec un statut Rédacteur <br>
            G: profil avec un statut Gestionnaire 
        </caption>";

        echo "<table class='table table-hover table-bordered'>
                <thead>
                    <tr>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>VALIDITE</th>
                        <th>STATUT</th>
                        <th>PSEUDO</th>
                        <th>Action 1</th>
                        <th>Action 2</th>
                    </tr>
                </thead>
                <tbody>";

        while ($pro = $result1->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($pro['pfl_nom']) . "</td>
                    <td>" . htmlspecialchars($pro['pfl_prenom']) . "</td>
                    <td>" . htmlspecialchars($pro['pfl_validite_du_profil']) . "</td>
                    <td>" . htmlspecialchars($pro['pfl_statut']) . "</td>
                    <td>" . htmlspecialchars($pro['cpt_pseudo']) . "</td>
                    <td>
                        <form action='compte_action.php' method='POST'>
                            <input type='hidden' name='pseudosel' value='" . htmlspecialchars($pro["cpt_pseudo"]) . "'/>
                            <button type='submit' class='btn btn-default btn-sm' name='desactive'>Activer/Désactiver</button>
                        </form>
                    </td>
                    <td>
                        <form action='compte_action.php' method='POST'>
                            <input type='hidden' name='pseudosel' value='" . htmlspecialchars($pro["cpt_pseudo"]) . "'/>
                            <button type='submit' class='btn btn-default btn-sm' name='changer'>R/G</button>
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
        &copy; 2025 Gestion des profils. Tous droits réservés.
    </footer>
</div>
</body>
</html>
