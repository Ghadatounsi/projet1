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
        <?php include("include/navbar2.php") ?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero" style="background-color: #181818 ;!important">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1> "Explorez nos Formations Modernes"<span clsas="d-block"></span></h1>
								<p class="mb-4">Découvrez nos programmes modernes et enrichissants conçus pour stimuler votre créativité et développer vos compétences</p>
								<p><a href="" class="btn btn-secondary me-2">S'inscrire maintenant</a><a href="#" class="btn btn-white-outline">Découvrir</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/men.png" class="img-fluid" width="55%">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<?php include("include/product_section.php") ?>
		<!-- End Product Section -->

		<!-- Start Why Choose Us Section -->
		<?php include("include/why_choose_section.php") ?>

		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<?php include("include/we_help_section.php") ?>

		<!-- End We Help Section -->

		<!-- Start Popular Product -->
		<?php include("include/popular_product.php") ?>
>
		<!-- End Popular Product -->

		<!-- Start Testimonial Slider -->
		<?php include("include/testimonial_section.php") ?>

		<!-- End Testimonial Slider -->

		<!-- Start Blog Section -->
		<?php include("include/blog_section.php") ?>

		<!-- End Blog Section -->	

		<!-- Start Footer Section -->
		<?php include("include/footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
