<?php
// Inclure le fichier de connexion à la base de données
include("include/connect.php");

// Requête SQL pour obtenir les données nécessaires pour la régression multiple
$sql = "SELECT duree_formation, prix_formation, COUNT(id) AS nb_inscriptions
        FROM inscription
        GROUP BY duree_formation, prix_formation";
$result = $conn->query($sql);

// Tableaux pour stocker les données
$durees = [];
$prix = [];
$inscriptions = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $durees[] = $row['duree_formation'];
        $prix[] = $row['prix_formation'];
        $inscriptions[] = $row['nb_inscriptions'];
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Créer un tableau associatif
$data = [
    'duree_formation' => $durees,
    'prix_formation' => $prix,
    'nb_inscriptions' => $inscriptions
];

// Écrire les données dans un fichier JSON
file_put_contents('data.json', json_encode($data));
?>
