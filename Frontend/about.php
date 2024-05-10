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
								<h1>"À propos de nous"</h1>
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
        <div class="row justify-content-center">
            <?php
            include("../Dashboard/include/connect.php");
            $sql = "SELECT * FROM module";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="card module-card">
                            <div class="card-body">
                                <h3 class="card-title module-title"><?php echo htmlspecialchars($row["titre"]); ?></h3>
                                <p class="card-text module-description"><?php echo htmlspecialchars($row["discription"]); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="col">
                    <p>Aucun module trouvé</p>
                </div>
                <?php
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>
<!-- End Module Section -->

<style>
    .module-card {
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
    }

    .module-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    }

    .module-title {
        font-size: 20px;
        color: #333;
        margin-bottom: 15px;
    }

    .module-description {
        color: #666;
    }
</style>




  <!-- Start Footer Section -->
  <?php include("include/footer.php") ?>
  <!-- End Footer Section -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
