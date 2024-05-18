<!DOCTYPE html>
<html lang="en">
<head>
  <title>GT 0.1</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet">

    <!-- Liens Bootstrap 5 JS et dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-1Cm4fJgPOTQ8RHg9BA7DrKB1enDlX5j9YOihmKez3yIhwgCr0nBOtOTxK6ba/0jH" crossorigin="anonymous">

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
  </style>
</head>
<body>
<div
    id="intro-example"
    class="p-5 text-center bg-image"
    style="background-image: url('images/img2.jpg'); "
  >
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">GT 0.1</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="http://localhost/projet1/Frontend/index.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Home</a></li>
      <li><a href="http://localhost/projet1/Frontend/formations.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Formations</a></li>
      <li><a href="http://localhost/projet1/Frontend/actualite.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Actualite</a></li>

      <li><a href="http://localhost/projet1/Frontend/contact.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Contact-Nous</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="http://localhost/projet1/Frontend/login.php"><span class="glyphicon glyphicon-user"></span>Se connecter</a></li>
      <li><a href="http://localhost/projet1/Frontend/register.php"><span class="glyphicon glyphicon-log-in"> S'inscrire</span></a></li>
    </ul>
  </div>
</nav>
  
 <!-- Background image -->
 
        <div class="intro-excerpt" style="margin: 14%;">
	     	<h1 style="color: white;"> "Explorez nos Formations Modernes"<span clsas="d-block"></span></h1>
		  	<p style="color: white;">Découvrez nos programmes modernes et enrichissants conçus pour stimuler votre créativité et développer vos compétences</p>
			<p>
            <a href="http://localhost/projet1/Frontend/login.php" ><button type="button" class="btn btn-dark" style="color: dark;">S'inscrire maintenant</button></a>


        </p>
	    </div>
    </div>
  <!-- Background image -->

  <?php include("include/product_section.php") ?>
  <?php include("include/blog.php") ?>

  <?php include("include/teams.php") ?>
  <?php include("include/listeavis.php") ?>



	<!-- Start Why Choose Us Section -->
  

<!-- Start Footer Section -->
<?php include("include/footer.php") ?>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>