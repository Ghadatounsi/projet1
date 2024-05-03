<<?php
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
		<title>GT0.1 </title>
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
								<h1>Formations</h1>
							</div>
						</div>
						<div class="col-lg-7">
						    <div class="hero-img-wrap">
								<img src="images/.png" class="img-fluid" width="37%%" style="top: -117px !important;">
							</div>
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
<?php
include("../Dashboard/include/connect.php");
// Requête SQL pour récupérer les données de la table "formation"
$sql = "SELECT * FROM formation";
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
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <a class="product-item" href="#">
                            <img src="http://localhost/projet1/dashboard/upload/<?php echo $row["image"]; ?>" class="img-fluid product-thumbnail">
                            <h3 class="product-title"><?php echo $row["titre"]; ?></h3>
                            <strong class="product-price"><?php echo $row["prix"]; ?></strong>

                            <span class="icon-cross">
                                <img src="http://localhost/projet1/dashboard/upload/<?php echo $row["image"]; ?>" class="img-fluid">
                            </span>
                        </a>
                    </div>
            <?php
                }
            } else {
                echo "Aucun résultat trouvé";
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
