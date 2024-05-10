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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>GT0.1</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<?php include("include/navbar.php") ?>
		<!-- End Header/Navigation -->
	<!-- Start Hero Section -->
    <div class="hero" style="background-color: #181818 ;!important">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>"Nos Actualités"</h1>
							</div>
						</div>
						<div class="col-lg-7">
						    <div class="hero-img-wrap">
								<img src="images/men.png" class="img-fluid" width="37%%" style="top: -117px !important;">
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<?php
include("../Dashboard/include/connect.php");
// Requête SQL pour récupérer les données de la table "Actualite"
$sql = "SELECT * FROM actualité";
$result = $conn->query($sql);
?>

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php
            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Afficher les données de chaque ligne
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-4">
                        <a class="product-item" href="#" style="text-decoration: none; color: inherit; transition: all 0.3s;">
                            <div class="product-card" style="border-radius: 10px; overflow: hidden; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);">
                                <img src="http://localhost/projet1/dashboard/upload/<?php echo $row["image"]; ?>" class="img-fluid product-thumbnail" style="object-fit: cover; height: 200px; width: 100%;">
                                <div class="product-info p-3">
                                    <h3 class="product-title mb-0" style="font-size: 18px;"><?php echo $row["titre"]; ?></h3>
                                    <p class="mb-2" style="font-size: 14px;"><?php echo $row["contenu"]; ?></p>
                                    <div class="meta">
                                        <span style="font-size: 12px;">Date: <?php echo $row["date"]; ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Aucune actualité trouvée";
            }
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
