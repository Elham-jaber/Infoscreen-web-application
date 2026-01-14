<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-image: url('../assets/connexion.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.95); /* Blanc semi-transparent pour contraste */
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 450px;
    }

    fieldset {
      border: none;
    }

    legend {
      font-size: 1.2rem;
      font-weight: 600;
    }
  </style>
</head>
<body>
<div class="position-absolute top-0 end-0 m-3">
  <a href="../index.php" class="btn btn-outline-light">ACCEUIL</a>
</div>


  <div class="form-container">
    <form action="session_action.php" method="post">
      <fieldset>
        <legend class="mb-4 text-center">Veuillez saisir votre pseudo et votre mot de passe :</legend>

        <div class="mb-3">
          <label for="pseudo" class="form-label">Votre pseudo :</label>
          <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" >
        </div>

        <div class="mb-3">
          <label for="mdp" class="form-label">Votre mot de passe :</label>
          <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe" >
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100">Valider</button>
        </div>
      </fieldset>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
