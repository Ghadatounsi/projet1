<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupérer l'ID de l'utilisateur depuis la session
    $userId = $_SESSION['user_id'];
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: http://localhost/projet1/Frontend/login.php");
    exit(); // Terminer le script
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet">

    <!-- Liens Bootstrap 5 JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
		<title>GT0.1 </title>
	
        <style>
    /* Default height for small devices */
    #intro-example {
      height: 400px;
    }

    /* Height for devices larger than 992px */
    @media (min-width: 992px) {
      #intro-example {
        height: 600px;
      }
    }
        /* Style personnalisé pour les cartes avec arrière-plan rouge et texte noir */
        .red-card {
            background-color: #6f121d;
            color: black; /* Texte en noir */
            border-radius: 10px; /* Ajouter des coins arrondis pour une apparence esthétique */
            padding: 20px; /* Ajouter un espace à l'intérieur de la carte */
        }
  </style>
    </head>

	<body>

		<!-- Start Header/Navigation -->
		<?php include("include/navbar.php") ?>

		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			
		<!-- End Hero Section -->

		
        <?php
include("../Dashboard/include/connect.php");

// Requête SQL pour récupérer les données de la table "formation"
$sql = "SELECT * FROM formation";
$result = $conn->query($sql);
?>

<div class="container bootstrap snippets bootdey">
    <hr>
    <div class="row content">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
            // Compteur pour limiter à trois cartes
            $counter = 0;
            
            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Afficher les données de chaque ligne jusqu'à trois cartes
                while ($row = $result->fetch_assoc()) {
                    
            ?>
                    <div class="col-sm-4 text-center">
                        <div class="plan red-card"> <!-- Ajoutez la classe personnalisée red-card -->
						<img src="http://localhost/projet1/dashboard/upload/<?php echo $row["image"]; ?>" class="card-img-top" alt="..." style="width: 200px; height: 150px; object-fit: cover;">
                            <h2 class=" text-white" style="color: white;"><?php echo $row["titre"]; ?></h2> <!-- Ajoutez la classe text-white -->
                            <p class="gold-text price text-white" style="color: white;"><?php echo $row["prix"]; ?></p> <!-- Ajoutez la classe text-white -->
                            <p class="text-white" style="color: white;"><?php echo $row["description"]; ?></p> <!-- Ajoutez la classe text-white -->
                            <a href="http://localhost/projet1/Frontend/inscription.php?id=<?php echo $_SESSION['user_id']; ?>"><button type="button" class="btn btn-dark" style="color: dark;">Inscription</button></a>
                        </div>
                    </div>
            <?php
                    $counter++;
                }
            } else {
                echo "Aucun résultat trouvé";
            }
            // Fermer le résultat de la requête
            $result->close();
            ?>
        </div>
    </div>
</div>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>




		<!-- Start Footer Section -->
		<?php include("include/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
