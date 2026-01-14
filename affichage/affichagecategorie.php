<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('../assets/boulangerie.avif');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .content-wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            background-color: rgba(0, 0, 0, 0.3); /* effet assombri */
        }

        .text-box {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 30px;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            font-family: 'Cursive', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        h3 {
            font-size: 1.8rem;
            color: #34495e;
            margin-top: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #333;
            background-color: rgba(255, 255, 255, 0.6);
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .top-right-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

    </style>
</head>

<body>

<a href="../index.php" class="top-right-button">ACCUEIL</a>

<div class="content-wrapper">
    <div class="text-box">
        <h1>"Paul vous Gâte avec des Offres Alléchantes!"</h1>

        <div id="contenu">
            <?php
            // Connexion à la BDD
            $mysqli = new mysqli('localhost','e22110297sql','hD2JPt&5','e22110297_db1');
            if ($mysqli->connect_errno) {
                exit();
            }

            if (!$mysqli->set_charset("utf8")) {
                printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
                exit();
            }

            // Requête pour récupérer les catégories
            $sql = "SELECT cat_id, cat_titre FROM t_categorie_cat";
            $result1 = $mysqli->query($sql);

            // Remplir le tableau avec les catégories
            $id = [];
            for ($i = 0; $i < $result1->num_rows ; $i++) {
                $cat = $result1->fetch_assoc();
                $id[$i] = [$cat['cat_id'], $cat['cat_titre']];
            }

            // Traitement de l'indice
            if (isset($_GET['indice']) && is_numeric($_GET['indice']) && $_GET['indice'] >= 0 && $_GET['indice'] <= 8) {
                $indice = $_GET['indice']; 
                $cat_id = $id[$indice][0];
                $cat_titre = $id[$indice][1];

                // Récupération des informations de la catégorie
                $sql3 = "SELECT inf_texte FROM t_information_inf JOIN t_categorie_cat USING (cat_id) WHERE inf_etat='L' AND cat_id=$cat_id";
                $result3 = $mysqli->query($sql3);

                echo "<h3>" . $cat_titre . "</h3>";

                if ($result3->num_rows > 0) {
                    while ($inf1 = $result3->fetch_assoc()) {
                        echo "<p>" . $inf1['inf_texte'] . "</p>";
                    }
                } else {
                    echo "<p>Aucune information</p>";
                }

                // Redirection
                $numero = $indice + 1;
                if ($result1->num_rows > $numero) {
                    header("refresh:3;url=affichagecategorie.php?indice=$numero");
                } else {
                    header("refresh:2;url=affichagecategorie.php?indice=0");
                }
            } else {
                echo "<p>Catégorie invalide ou non spécifiée.</p>";
            }
            ?>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
