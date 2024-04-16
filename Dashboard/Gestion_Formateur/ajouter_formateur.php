<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formateur</title>
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

<div class="container mt-3">
    <h1>Liste des Formateurs</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        // Inclure le fichier de connexion à la base de données
        include("../includes/connect.php");

        // Requête SQL pour récupérer les formateurs
        $sql = "SELECT * FROM formateur";

        // Exécution de la requête
        $result = mysqli_query($conn, $sql);

        // Vérification s'il y a des données retournées
        if (mysqli_num_rows($result) > 0) {
            // Parcourir les données et afficher chaque formateur sous forme de carte Bootstrap
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col">
                    <div class="card h-100">
                        <!-- Utilisation de la balise <img> pour afficher l'image du formateur -->
                        <img src="<?php echo $row['image_path']; ?>" class="card-img-top" alt="Photo de profil">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['prenom'] . ' ' . $row['nom']; ?></h5>
                            <p class="card-text"><?php echo $row['specialisation']; ?></p>
                            <p class="card-text"><?php echo $row['biographe']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Aucun formateur trouvé.";
        }

        // Fermer la connexion à la base de données
        mysqli_close($conn);
        ?>
    </div>
</div>

<?php include("../includes/footer.php"); ?>

</body>
</html>
