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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESPACE GESTION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            padding: 30px;
        }

        h2.text-center {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        hr.divider {
            border: none;
            height: 3px;
            background-color: #0d6efd;
            width: 60%;
            margin: 20px auto;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .table-hover {
            margin-top: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .table-hover thead {
            background: #0d6efd;
            color: white;
            font-weight: bold;
        }

        .table-hover th, .table-hover td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .table-hover tbody tr:hover {
            background-color: #f0f8ff;
        }

        .form-section {
            display: flex;
            justify-content: center;
            gap: 50px;
            flex-wrap: wrap;
            margin-top: 40px;
        }

        .form-container {
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        .form-container h5 {
            font-size: 22px;
            color: #0d6efd;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border-radius: 6px;
            border: 1px solid #ced4da;
            font-size: 16px;
            padding: 8px 10px;
            margin-bottom: 16px;
        }

        .btn-success {
            background-color: rgb(145, 209, 179);
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
        }

        .caption-style {
            font-size: 14px;
            text-align: center;
            margin-top: 12px;
            color: #6c757d;
        }

        .profile-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .profile-button a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ffffff;
            border-radius: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-button a i {
            font-size: 20px;
        }
    </style>
</head>
<body>

<!-- Bouton Profil -->
<div class="profile-button">
    <a href="../session/admin_session.php" class="btn btn-light shadow-sm rounded-pill px-4 py-2 fw-semibold d-flex align-items-center gap-2">
        <i class="bi bi-person-circle fs-4"></i> Mon Profil
    </a>
</div>

<!-- Titre et section de gestion -->
<div class="container">
    <h2 class="text-center">Espace privée de la gestion des catégories.</h2>
    <hr class="divider" />
    
    <!-- Formulaires d'ajout et modification de catégorie -->
    <div class="form-section">
        <div class="form-container">
            <form action="ajouter_cat.php" method="POST">
                <h5>Ajouter une nouvelle catégorie</h5>
                <div class="mb-3">
                    <label for="cat_titre" class="form-label">Titre de la catégorie :</label>
                    <input type="text" class="form-control" id="cat_titre" name="cat_titre">
                </div>

                <div class="mb-3">
                    <label for="cat_id" class="form-label">ID de la catégorie :</label>
                    <input type="text" class="form-control" id="cat_id" name="cat_id">
                </div>

                <div class="mb-3">
                    <label for="inf_texte" class="form-label">Ajouter une information :</label>
                    <input type="text" class="form-control" id="inf_texte" name="inf_texte">
                </div>

                <div class="mb-3">
                    <label for="pseudo" class="form-label">Auteur :</label>
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>

                <div class="mb-3">
                    <label for="inf_etat" class="form-label">État de l'information :</label>
                    <select class="form-select" id="inf_etat" name="cat_statut">
                        <option value="L">L</option>
                        <option value="C">C</option>
                    </select>
                </div>

                <div class="text-start">
                    <button type="submit" value="ajout" name="ajout" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>

        <div class="form-container">
            <form action="ajouter_cat.php" method="POST">
                <h5>Modifier une catégorie</h5>
                <div class="mb-3">
                    <label for="cat_id1" class="form-label">ID de catégorie à modifier :</label>
                    <input type="text" class="form-control" id="cat_id1" name="cat_id1">
                </div>

                <div class="mb-3">
                    <label for="cat_titre1" class="form-label">Nom catégorie :</label>
                    <input type="text" class="form-control" id="cat_titre1" name="cat_titre1">
                </div>

                <div class="mb-3">
                    <label for="inf_texte1" class="form-label">Modifier ou ajouter une information :</label>
                    <input type="text" class="form-control" id="inf_texte1" name="inf_texte1">
                </div>

                <div class="mb-3">
                    <label for="pseudo1" class="form-label">Auteur :</label>
                    <input type="text" class="form-control" id="pseudo1" name="pseudo1">
                </div>

                <div class="mb-3">
                    <label for="cat_statut1" class="form-label">État de l'information :</label>
                    <select class="form-select" id="cat_statut1" name="cat_statut1">
                        <option value="L">L</option>
                        <option value="C">C</option>
                    </select>
                </div>

                <div class="text-start">
                    <button type="submit" value="modif" name="modif" class="btn btn-success">Modifier</button>
                </div>
            </form>
        </div>
    </div>

    <div class="caption-style">
        L : pour en ligne — C : pour cacher
    </div>
</div>

    <?php
    $requete = "SELECT cpt_pseudo , cat_id, cat_titre, inf_id, inf_texte, inf_etat, url_chaine
                FROM `t_categorie_cat` 
                LEFT JOIN `t_association_ast` using (cat_id)
                LEFT JOIN `t_information_inf` USING(cat_id)
                LEFT JOIN `t_url_url` using (url_id);";
    $result1 = $mysqli->query($requete);

    if ($result1 == false) {
        exit();
    } else {
        echo "<table class='table table-hover'>
                <thead>
                  <tr>
                    <th>id</th>
                    <th>Titre</th>
                    <th>Infos</th>
                    <th>État de l'information</th>
                    <th>Auteur</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>";

        while ($cat = $result1->fetch_assoc()) {
            $url_final = isset($cat['url_id']) ? htmlspecialchars($cat['url_id']) : '';
            echo "<tr>
                    <td>" . htmlspecialchars(addslashes($cat['cat_id'])) . "</td>
                    <td>" . htmlspecialchars(addslashes($cat['cat_titre'])) . "</td>
                    <td>" . htmlspecialchars(addslashes($cat['inf_texte']) ). "</td>
                    <td>" . htmlspecialchars(addslashes($cat['inf_etat'])). "</td>
                    <td>" . htmlspecialchars(addslashes($cat['cpt_pseudo'])) . "</td>
                    <td>
                    <form action='cat_action.php' method='POST'>
                    <input type='hidden' name='cat_id' value='" . htmlspecialchars($cat["cat_id"]) . "'/>
                    <input type='hidden' name='url_id' value='" . $url_final . "'/>
                    <button type='submit' class='btn btn-danger' name='delete'>Supprimer</button>
                    </form>
                </td>
                  </tr>";
        }
        echo "</tbody></table>";
    }
    // Fermeture de la communication avec la base MariaDB
$mysqli->close();
    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
