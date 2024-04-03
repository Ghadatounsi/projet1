<!doctype html>
<html>
<header>
<title>avis</title>
</header>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
        .navbar {
          --bs-navbar-color: rgb(255 255 255) !important;
          --bs-navbar-hover-color: #FFC107 !important;
        }
    </style>
</head>
<body>

<?php include("../includes/header.php") ?>



<video controls>
  <source src="myVideo.mp4" type="video/mp4" />
  <source src="myVideo.webm" type="video/webm" />
  Your browser does not support HTML5 video. Here is a <a href="myVideo.mp4">link to download the video</a>.
</video>
<div class="avis">
    <div class="avis-item">
        <div class="avatar">
            <img src="avatar1.jpg" alt="Avatar 1">
        </div>
        <div class="avis-content">
            <h3>Nom de l'utilisateur 1</h3>
            <p>"Texte de l'avis sur la formation. Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
        </div>
    </div>

    <div class="avis-item">
        <div class="avatar">
            <img src="avatar2.jpg" alt="Avatar 2">
        </div>
        <div class="avis-content">
            <h3>Nom de l'utilisateur 2</h3>
            <p>"Un autre avis sur la formation. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."</p>
        </div>
    </div>

    <!-- Ajoutez autant d'avis que nécessaire en suivant la même structure -->
</div>



    <!-- Ajoutez d'autres avis en suivant la même structure -->
</div>



       
    
        <?php include("../includes/footer.php") ?>


</body>
</html>