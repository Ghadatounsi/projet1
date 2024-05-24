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
      <li class="active"><a href="http://localhost/projet1/Frontend/index.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Accueil</a></li>
      <li><a href="http://localhost/projet1/Frontend/formations.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Formations</a></li>
      <li><a href="http://localhost/projet1/Frontend/actualite.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Actualités</a></li>
      <li><a href="http://localhost/projet1/Frontend/about.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">A propos de nous</a></li>

      <li><a href="http://localhost/projet1/Frontend/contact.php?id=<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '' ?>">Contactez-Nous</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="http://localhost/projet1/Frontend/logout.php"><span class="glyphicon glyphicon-log-out"></span></a></li>

    </ul>
  </div>
</nav>
  
 <!-- Background image -->
 
        <div class="intro-excerpt" style="margin: 14%;">
	     	<h1 style="color: white;"> "Explorez nos Formations Modernes"<span clsas="d-block"></span></h1>
		  	<p style="color: white;">Découvrez nos programmes modernes et enrichissants conçus pour stimuler votre créativité et développer vos compétences</p>
			<p>
            <a href="#" ><button type="button" class="btn btn-dark" style="color: dark;">S'inscrire maintenant</button></a>

            

        </p>
	    </div>
    </div>