<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/style_login.css" rel="stylesheet" />
    <style>
        /* Centrer le message d'alerte au centre de la page */
        .alert-container {
            position: absolute;
            top: 50%; /* Centrer verticalement */
            left: 50%; /* Centrer horizontalement */
            transform: translate(-50%, -50%); /* Ajuster pour un centrage parfait */
            width: 80%; /* La largeur de l'alerte peut être ajustée */
            text-align: center;
            z-index: 10;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            font-size: 16px;
            display: inline-block;
        }
    </style>
</head>
<body>

<?php
$mysqli = new mysqli('localhost','e22110297sql','hD2JPt&5','e22110297_db1');
if ($mysqli->connect_errno)
{
    exit();
}
mysqli_report(MYSQLI_REPORT_OFF);
if (!$mysqli->set_charset("utf8")) {
    printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
    exit();
}
?>

<!-- Navigation-->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <h5></h5>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../index.php">ACCUEIL</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="inscription.php">INSCRIPTION <img src="../images/logoInscription.png" style="width:30px" alt=""></a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteneur pour les alertes -->
<div class="alert-container">
<?php
if (empty($_POST['prenom'] )|| empty($_POST['nom']) || empty($_POST['userName']) ||empty($_POST['password'])||empty($_POST['password_confirm'])||empty($_POST['code'])) {
        echo '<div class="alert">Veuillez remplir tous les champs ! <a href="inscription.php">cliquer ICI</a></div>';
} else {
    if(strcmp($_POST['password'],$_POST['password_confirm'])!=0){
            echo '<div class="alert">Les mots de passe ne correspondent pas !<a href="inscription.php">cliquer ICI pour réessayer</a></div>';
} else {
            $nom = htmlspecialchars(addslashes($_POST['nom']));
            $prenom = htmlspecialchars(addslashes($_POST['prenom']));
            $pseudo = htmlspecialchars(addslashes($_POST['userName']));
            $email = htmlspecialchars(addslashes($_POST['email']));
            $mdp1 = htmlspecialchars(addslashes($_POST['password']));
            $code=htmlspecialchars(addslashes($_POST['code']));
            $sql="SELECT cfg_code from t_configuration_cfg where cfg_id=1";
            $result=$mysqli->query($sql);
        if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $db_code = $row['cfg_code'];
         if((strcmp($code, $db_code)) === 0){
                $req_inser_cpt = "
                INSERT INTO `t_compte_cpt`(`cpt_pseudo`, `cpt_mot_de_passe`)
                VALUES ('".$pseudo."', MD5('".$mdp1."'))";
                $data = $mysqli->query($req_inser_cpt);

                if ($data) {
                    
                    $cpt_id = $mysqli->insert_id;
                
                    $req_inser_profil = "
                    INSERT INTO `t_profil_pfl`(`pfl_nom`, `pfl_prenom`, `pfl_adresse_email`, `pfl_validite_du_profil`, `pfl_statut`, `pfl_date_de_creation_du_profil`, `cpt_pseudo`) 
                    VALUES ('$nom', '$prenom', '$email', 'D', 'R', CURRENT_DATE, '$pseudo')";
                    
                    $prof_data = $mysqli->query($req_inser_profil);
                
                    if (!$prof_data) {
                        $req_delete_cpt = "DELETE FROM t_compte_cpt WHERE cpt_pseudo = '$pseudo'";
                        $execution = $mysqli->query($req_delete_cpt);
                
                        if (!$execution) {
                            echo '<div class="alert">Erreur lors de la suppression du compte : ' . $mysqli->error . '</div>';
                            header("refresh:3; url= ../inscription/inscription.php"); 
                        }
                
                        echo '<div class="alert">Erreur dans la création du profil, veuillez réessayer ! <a href="inscription.php">cliquer ICI</a></div>';
                        header("refresh:3; url= ../inscription/inscription.php"); 
                    } else {
                        echo '<div class="alert">Inscription réussie. Bienvenue, ' . $prenom . ' !</div>';
                        header("refresh:3; url= ../inscription/inscription.php"); 
                    }
                } else {
                    echo '<div class="alert">Erreur dans l\'insertion du compte, veuillez réessayer !<a href="inscription.php">cliquer ICI </a></div>'; 
                    header("refresh:3; url= ../inscription/inscription.php"); 
                }
                
        }
        if((strcmp($code, $db_code)) != 0){
            echo '<div class="alert">code d\'inscription erroné! veuillez réessayer  <a href="inscription.php">cliquer ICI </a></div>';
            header("refresh:3; url= ../inscription/inscription.php"); 


        }
    } 
 } 
}$mysqli->close();
    ?>
</div>

<!-- Formulaire d'inscription -->
<div class="wrapper">
    <div class="container">
        <h1>INSCRIPTION</h1>
        <form action="inscription.php" method="post" class="p-3 mt-3">
        </form>
        <div class="text-center fs-6">
            <a href="index.php"></a>
        </div>
    </div>
</div>

</body>
</html>