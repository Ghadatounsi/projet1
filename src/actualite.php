<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            --bs-navbar-color: rgb(255 255 255) !important;
            --bs-navbar-hover-color: #FFC107 !important;
        }
    </style>
</head>
<body>

<?php include("../includes/header.php"); ?>

<div class="container-fluid mt-3">
    <h1>Actualités</h1>
    <?php
    // Inclure le fichier de connexion à la base de données
    include("../includes/connect.php");

    // Requête SQL pour récupérer les actualités
    $sql = "SELECT * FROM actualité";

    // Exécution de la requête
    $result = mysqli_query($conn, $sql);

    // Vérification s'il y a des données retournées
    if (mysqli_num_rows($result) > 0) {
        // Parcourir les données et afficher chaque actualité sous forme de carte Bootstrap
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="row">
                <div class="col-sm-4 p-3">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <!-- L'image de l'actualité -->
                                <img src="..." class="img-fluid rounded-start" alt="Image d'actualité">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <!-- Le titre de l'actualité -->
                                    <h5 class="card-title"><?php echo $row['titre']; ?></h5>
                                    <!-- La description de l'actualité -->
                                    <p class="card-text"><?php echo $row['contenu']; ?></p>
                                    <!-- La date de l'actualité -->
                                    <p class="card-text"><small class="text-muted">Dernière mise à jour : <?php echo $row['date']; ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Aucune actualité trouvée.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html>
