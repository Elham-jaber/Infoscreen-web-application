
<!--
    nom : jaber;
    prénom:elham ;
    Sujet de notre projet WEB : c'est créer  un écran d'affichage d'information dans une boulangerie;
-->
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico " />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
    <?php

    $mysqli = new mysqli('localhost','e22110297sql','hD2JPt&5','e22110297_db1');
if ($mysqli->connect_errno)
{
// Affichage d'un message d'erreur
//echo "Error: Problème de connexion à la BDD \n";
//echo "Errno: " . $mysqli->connect_errno . "\n";
//echo "Error: " . $mysqli->connect_error . "\n";
// Arrêt du chargement de la page
exit();
}
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) {
printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
exit();
}?>
    
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand">
                    <!--ajout de theme selon ma table de cfg-->
                    <?php
                        $titre="SELECT cfg_theme from t_configuration_cfg";
                        $restitre=$mysqli->query($titre);
                        $r=$restitre->fetch_assoc();
                        echo $r['cfg_theme'].''
                        ?></a></div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">ACCUEIL</a></li>
                        <li class="nav-item"><a class="nav-link" href="inscription/inscription.php">INSCRIPTION</a></li>
                        <li class="nav-item"><a class="nav-link" ></a></li>
                        <li class="nav-item"><a class="nav-link" href="session/session.php">CONNEXION</a></li>
                        <li class="nav-item"><a class="nav-link" ></a></li>
                        <li class="nav-item"><a class="nav-link" href=" https://obiwan.univ-brest.fr/~e22110297/v2/affichage/affichagecategorie.php?indice=0">AFFICHAGE </a></li>
                        <li class="nav-item"><a class="nav-link" href="affichage/affichagecategorie.php"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold"><strong>Le Bon plan c'est toujours <br>chez PAUL</strong></h1>   
                    <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                    </div>
                </div>
            </div>
        </header>
   
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Nos actualités récentes</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5">

                <?php
// Connexion à la base de données (assurez-vous que $mysqli est bien initialisé)
//echo "Connexion BDD réussie !";

// Préparation de la requête récupérant tous les profils

$requete = "SELECT * FROM t_news_new WHERE new_etat ='A' order by new_date_de_publication DESC lIMIT 10;";

// Affichage de la requête préparée
//echo $requete;
// Exécution de la requête
$result1 = $mysqli->query($requete);

if ($result1 == false) { // Erreur lors de l’exécution de la requête
    //echo "Error: La requête a échoué \n";
    //echo "Errno: " . $mysqli->errno . "\n";
    //echo "Error: " . $mysqli->error . "\n";
    exit();
} else { // La requête s’est bien exécutée
    echo "<br />";
    echo $result1->num_rows." actualités récentes mises en ligne parmi 12"; // Affichage du nombre de lignes récupérées
    echo "<br />";

    // Affichage du tableau des résultats
    echo "<table class='table table-hover'>
            <thead>
              <tr>
                <th>Titre</th>
                <th>Texte</th>
                <th>Date</th>
                <th>Pseudo</th>
              </tr>
            </thead>
            <tbody>";
    // Boucle pour afficher les résultats dans un tableau 
    while ($actu = $result1->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($actu['new_titre']) . "</td>
                <td>" . htmlspecialchars($actu['new_texte']) . "</td>
                <td>" . htmlspecialchars($actu['new_date_de_publication']) . "</td>
                <td>" . htmlspecialchars($actu['cpt_pseudo']) . "</td>
              </tr>";
    }
    echo "  </tbody>
          </table>";
}

?>           
            <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            </i></div>
                             <?php
                        $titre="SELECT cfg_theme from t_configuration_cfg";
                        $restitre=$mysqli->query($titre);
                        $r=$restitre->fetch_assoc();
                        echo '<h1 class ="text-white font-weight-bold">'.$r['cfg_theme'].'</h1>';
                        ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio-->
        <div id="portfolio">
           <?php
                        $titre="SELECT cfg_theme from t_configuration_cfg";
                        $restitre=$mysqli->query($titre);
                        $r=$restitre->fetch_assoc();
                        echo '<h1 class ="text-white font-weight-bold">'.$r['cfg_theme'].'</h1>';
                        ?>
        </div>
        </section>
<?php
//...
//echo ("Connexion BDD réussie !");
//On insère une ligne dans la table gérant les comptes des utilisateurs
//$requete2="INSERT INTO t_compte_cpt VALUES ('tux',MD5('tux1234'));";
//echo ($requete2);
//$result2 = $mysqli->query($requete2); //Exécution de la requête
//if ($result2 == false) //Erreur d’exécution de la requête
{ // La requête a echoué
//echo "Error: La requête a echoué \n";
//echo "Errno: " . $mysqli->errno . "\n";
//echo "Error: " . $mysqli->error . "\n";
//exit();
}
//else //Exécution de la requête réussie
{
//echo "<br />";
//echo "Insertion réussie" . "\n";
//echo "<br />";
}
?>
<footer style="background-color: #333; color: white; text-align: center; padding: 10px;">
<?php
                        $titre="SELECT cfg_nom, cfg_date from t_configuration_cfg";
                        $restitre=$mysqli->query($titre);
                        $res=$restitre->fetch_assoc();
                        echo '<div class ="text-white font-weight-bold">'.$res['cfg_nom'].' <br>  '.$res['cfg_date'].'</div>';


$mysqli->close();  //Ferme la connexion avec la base MariaDB
?>
</footer>
    </body>
</html>
