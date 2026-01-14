<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        /* Centrer le contenu de la page */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        /* Centrer le formulaire dans la div .wrapper */
        .wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo img {
            width: 100px; /* Ajuste la taille de ton logo */
            display: block;
            margin: 0 auto;
        }

        .form-field {
            margin-bottom: 15px;
        }

        .form-field input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        /* Modifier le fond de la navbar pour qu'il soit blanc */
        nav {
            background-color: white; /* Fond blanc */
            color: black; /* Texte noir */
        }

        /* Modifier la couleur du texte dans la navbar */
        nav .navbar-nav .nav-link {
            color: black !important; /* Texte en noir */
        }

        nav .navbar-nav .nav-link:hover {
            color: #007bff !important; /* Changer la couleur du texte au survol */
        }

        /* Personnaliser le bouton de la navbar */
        .navbar-toggler {
            color: black;
            border-color: black;
        }

        .navbar-toggler:hover {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
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
                <h5><strong>Espace inscription</strong></h5>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="../index.php"> ACCUEIL
                    </a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="https://obiwan.univ-brest.fr/~e22110297/v2/affichage/affichagecategorie.php?indice=0">Affichage </a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="inscription.php">INSCRIPTION <img src="../images/logoInscription.png" style="width:30px" alt=""></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- start form login -->
    <div class="wrapper">
        <div class="logo">
            <img src="../images/logoLogin.png" alt="">
        </div>
        <div class="text-center mt-4 name">
        </div>
        <form action="action.php" method="post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="nom" id="nom" placeholder="nom">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="prenom" id="prenom" placeholder="prénom">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="userName" id="userName" placeholder="pseudo">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-envelope"></span>
                <input type="email" name="email" id="email" placeholder="adresse mail">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="mot de passe">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password_confirm" id="pwd_confirm" placeholder="confirmer votre mot de passe">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="code" name="code" id="code" placeholder="code d'incription">
            </div>
            <input type="submit" value="Valider" class="btn mt-3">
        </form>
    <!-- end form login -->
    </div>

</body>
</html>
