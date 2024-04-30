<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
  die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des données de la table candidat
$sql_candidat = "SELECT * FROM candidat";
$result_candidat = $conn->query($sql_candidat);

// Vérification s'il y a des résultats
if ($result_candidat->num_rows > 0) {
    // Récupérer la première ligne de résultat
    $row_candidat = $result_candidat->fetch_assoc();
} else {
    echo "Aucun résultat trouvé pour la table candidat";
}

// Récupération des données de la table formation
$sql_formation = "SELECT * FROM formation";
$result_formation = $conn->query($sql_formation);

// Vérification s'il y a des résultats
if ($result_formation->num_rows > 0) {
    // Récupérer la première ligne de résultat
    $row_formation = $result_formation->fetch_assoc();
} else {
    echo "Aucun résultat trouvé pour la table formation";
}

// Fermer la connexion à la base de données
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription à une formation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('votre_image.jpg'); /* Chemin vers votre image */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-color: rgba(0, 0, 0, 0.5); /* Opacité de l'image */
    }
    .container {
      max-width: 500px;
      margin: auto;
      margin-top: 50px;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    .form-control {
      border-radius: 25px; /* Coins arrondis */
      border: 2px solid #007bff; /* Bordure bleue */
      padding: 12px 20px; /* Espacement intérieur */
      transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Transition fluide */
    }
    .form-control:focus {
      border-color: #0056b3; /* Bordure bleue au focus */
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Lueur bleue au focus */
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      width: 100%;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container bg-light">
    <h1>Inscription à une formation</h1>
    <form action="Controller/inscription.php" method="POST">
      <div class="form-group">
       
        <input type="hidden" class="form-control" id="id_candidat" name="id_candidat" value="<?php echo $row_candidat['id']; ?>" required>
      </div>
      <div class="form-group">
        <label for="username_candidat">Nom du candidat</label>
        <input type="text" class="form-control" id="username_candidat" name="username_candidat" value="<?php echo $row_candidat['username']; ?>" required>
      </div>
      <div class="form-group">
        <label for="email_candidat">Adresse email du candidat</label>
        <input type="email" class="form-control" id="email_candidat" name="email_candidat" value="<?php echo $row_candidat['email']; ?>" required>
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" id="id_formation" name="id_formation" value="<?php echo $row_formation['id']; ?>" required>
      </div>
      <div class="form-group">
        <label for="titre_formation">Titre de la formation</label>
        <input type="text" class="form-control" id="titre_formation" name="titre_formation" value="<?php echo $row_formation['titre']; ?>" required>
      </div>
      <div class="form-group">
        <label for="durée_formation">Durée de la formation (en heures)</label>
        <input type="number" class="form-control" id="durée_formation" name="durée_formation" value="<?php echo $row_formation['durée']; ?>" required>
      </div>
      <div class="form-group">
        <label for="prix_formation">Prix de la formation</label>
        <input type="number" step="0.01" class="form-control" id="prix_formation" name="prix_formation" value="<?php echo $row_formation['prix']; ?>" required>
      </div>
      <div class="form-group">
      
        <input type="hidden" class="form-control" id="statut" name="statut" value="en_attente" required>
      </div>
      <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
  </div>
</body>
</html>
