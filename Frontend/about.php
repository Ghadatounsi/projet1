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

    <!-- Intro settings -->
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
  </style>  <title>GT0.1</title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <?php include("include/navbar.php") ?>

  <!-- End Header/Navigation -->

	<!-- Start Hero Section -->
				
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
