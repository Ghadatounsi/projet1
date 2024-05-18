<?php
include("../Dashboard/include/connect.php");

// Requête SQL pour récupérer les données de la table "Actualite"
$sql = "SELECT * FROM actualité";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
?>

<div class="untree_co-section product-section before-footer-section py-5">
    <div class="container">
        <div class="row">
            <?php
            // Compteur pour limiter le nombre de blogs affichés
            $counter = 0;

            // Afficher les données de chaque ligne
            while ($row = $result->fetch_assoc()) {
                if ($counter >= 3) break;
                ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4" style="height: 500px;"> <!-- Ajuster la hauteur ici -->
                    <a class="product-item" href="#" style="text-decoration: none; color: inherit; transition: all 0.3s;">
                        <div class="product-card" style="background-color: #6f121d; color: white; border-radius: 10px; overflow: hidden; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1); height: 100%;">
                            <img src="http://localhost/projet1/dashboard/upload/<?php echo $row['image']; ?>" class="img-fluid product-thumbnail" style="object-fit: cover; height: 250px; width: 100%;">
                            <div class="product-info p-3">
                                <h3 class="product-title mb-2" style="font-size: 20px;"><?php echo $row['titre']; ?></h3>
                                <p class="mb-3" style="font-size: 16px; max-height: 100px; overflow: hidden; text-overflow: ellipsis;"><?php echo $row['contenu']; ?></p>
                                <div class="meta">
                                    <span style="font-size: 14px;">Date: <?php echo $row['date']; ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                $counter++;
            }
            ?>
        </div>
    </div>
</div>

<?php
} else {
    echo "<div class='container'><p>Aucune actualité trouvée ou erreur lors de la récupération des actualités.</p></div>";
}

// Fermer la connexion à la base de données
$conn->close();
?>
