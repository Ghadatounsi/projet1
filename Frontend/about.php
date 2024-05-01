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
								<h1>à propos de nous</h1>
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
  <!-- Start Module Section -->
  <div class="untree_co-section module-section before-footer-section" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row">
      <?php
      // Requête SQL pour récupérer les données de la table "Module"
      include("../Dashboard/include/connect.php");
      $sql = "SELECT * FROM module";
      $result = $conn->query($sql);

      // Vérifier s'il y a des résultats
      if ($result->num_rows > 0) {
        // Afficher les données de chaque ligne
        while ($row = $result->fetch_assoc()) {
          ?>
          <div class="col-12 col-md-6 col-lg-4 mb-4">
            <div class="module-item" style="border: 1px solid #dee2e6; border-radius: 8px; padding: 20px; background-color: #fff; box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);">
              <h3 class="module-title" style="font-size: 20px; color: #333; margin-bottom: 15px;"><?php echo $row["titre"]; ?></h3>
              <p class="module-description" style="color: #666;"><?php echo $row["discription"]; ?></p>
            </div>
          </div>
          <?php
        }
      } else {
        echo "Aucun module trouvé";
      }
      // Fermer la connexion à la base de données
      $conn->close();
      ?>
    </div>
  </div>
</div>

  <!-- End Module Section -->

  <!-- Start Footer Section -->
  <?php include("include/footer.php") ?>
  <!-- End Footer Section -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
