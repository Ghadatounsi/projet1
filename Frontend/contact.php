<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];
} else {
    // User is not logged in, redirect to the login page
    header("Location: http://localhost/projet1/Frontend/login.php");
    exit(); // Terminate the script
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
    <link href="css/style.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <?php include("include/navbar.php"); ?>

    <!-- Start Contact Form -->
    <div class="untree_co-section">
        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 pb-4">
                        <form action="Controller/ContactController.php" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="fname">Prénom</label>
                                        <input type="text" class="form-control" id="fname" name="first_name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="text-black" for="lname">Nom</label>
                                        <input type="text" class="form-control" id="lname" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group mb-5">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-hover-outline">Envoyer le Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Form -->

    <!-- Start Footer Section -->
    <?php include("include/footer.php"); ?>
    <!-- End Footer Section -->

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
