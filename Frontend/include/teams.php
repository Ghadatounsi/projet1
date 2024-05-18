<div class="row">

<?php
// Connexion à la base de données
$servername = "localhost"; // Remplacez ceci par le nom de votre serveur MySQL
$username = "root"; // Remplacez ceci par votre nom d'utilisateur MySQL
$password = ""; // Remplacez ceci par votre mot de passe MySQL
$dbname = "projet1"; // Remplacez ceci par le nom de votre base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour sélectionner toutes les colonnes de la table `formateur`
$sql = "SELECT * FROM formateur";
$result = $conn->query($sql);

// Vérifier si la requête a retourné des résultats
if ($result->num_rows > 0) {
    // Initialisation du compteur
    $count = 0;
    // Afficher les données de chaque ligne
    while($row = $result->fetch_assoc()) {
        // Vérifier si le compteur est inférieur à quatre
        if ($count < 4) {
            // Intégrer les données dans le HTML
            echo '
            <div class="col-lg-3 col-sm-6 my-3 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
                <div class="hover-top-in text-center">
                    <div class="overflow-hidden z-index-1 position-relative px-5">
                        <img src="http://localhost/projet1/dashboard/upload/' . $row['image'] . '" class="img-fluid product-thumbnail rounded-circle" style="object-fit: cover; height: 150px; width: 150px; border-radius: 50%;">
                    </div>
                    <div class="mx-2 mx-xl-3 shadow rounded-3 position-relative mt-n4 bg-white p-4 pt-6 mx-4 text-center hover-top--in">
                        <h6 class="fw-700 dark-color mb-1">' . $row["prenom"] . ' ' . $row["nom"] . '</h6>
                        <small>' . $row["specialisation"] . '</small>
                        <div class="pt-2">
                            <a class="icon-sm bg-primary rounded-circle me-1 text-white" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="icon-sm bg-primary rounded-circle me-1 text-white" href="#"><i class="bi bi-twitter"></i></a>
                            <a class="icon-sm bg-primary rounded-circle me-1 text-white" href="#"><i class="bi bi-linkedin"></i></a>
                            <a class="icon-sm bg-primary rounded-circle me-1 text-white" href="#"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
            // Incrémenter le compteur
            $count++;
        } else {
            // Sortir de la boucle si le compteur atteint quatre
            break;
        }
    }
} else {
    echo "0 résultats";
}

// Fermer la connexion
$conn->close();
?>
</div>
    </div>
</section>"