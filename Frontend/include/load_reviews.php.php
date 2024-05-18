<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "projet1");
if (!$conn) {
  die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

// Récupération des avis
$query = "SELECT * FROM avis LIMIT 1 OFFSET " . $_GET['index'];
$result = mysqli_query($conn, $query);

// Construction du HTML pour l'avis
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="carousel-item">';
    echo '<div class="card">';
    echo '<div class="card-body text-center">';
    echo '<h5 class="card-title">Note: ' . $row['note'] . '</h5>';
    echo '<p class="card-text">' . $row['contenu'] . '</p>';
    echo '<p class="card-text"><small class="text-muted">Publié le ' . $row['date'] . '</small></p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
} else {
  echo "<p>Aucun avis disponible pour le moment.</p>";
}

// Fermeture de la connexion
mysqli_close($conn);
?>
