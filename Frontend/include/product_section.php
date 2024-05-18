<?php
include("../Dashboard/include/connect.php");

// Requête SQL pour récupérer les données de la table "formation"
$sql = "SELECT * FROM formation";
$result = $conn->query($sql);
?>

<div class="container bootstrap snippets bootdey">
    <hr>
    <div class="row content">
        <div class="col-lg-10 col-lg-offset-1">
            <?php
            // Compteur pour limiter à trois cartes
            $counter = 0;
            
            // Vérifier s'il y a des résultats
            if ($result->num_rows > 0) {
                // Afficher les données de chaque ligne jusqu'à trois cartes
                while ($row = $result->fetch_assoc()) {
                    if ($counter >= 3) {
                        break; // Sortir de la boucle après trois cartes
                    }
            ?>
                    <div class="col-sm-4 text-center">
                        <div class="plan red-card"> <!-- Ajoutez la classe personnalisée red-card -->
						<img src="http://localhost/projet1/dashboard/upload/<?php echo $row["image"]; ?>" class="card-img-top" alt="..." style="width: 200px; height: 150px; object-fit: cover;">
                            <h2 class=" text-white" style="color: white;"><?php echo $row["titre"]; ?></h2> <!-- Ajoutez la classe text-white -->
                            <p class="gold-text price text-white" style="color: white;"><?php echo $row["prix"]; ?></p> <!-- Ajoutez la classe text-white -->
                            <p class="text-white" style="color: white;"><?php echo $row["description"]; ?></p> <!-- Ajoutez la classe text-white -->
							<a href="http://localhost/projet1/Frontend/login.php" ><button type="button" class="btn btn-dark" style="color: dark;">Inscription</button></a>
                        </div>
                    </div>
            <?php
                    $counter++;
                }
            } else {
                echo "Aucun résultat trouvé";
            }
            // Fermer le résultat de la requête
            $result->close();
            ?>
        </div>
    </div>
</div>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
