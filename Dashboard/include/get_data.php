<?php
// Inclure la configuration de la base de données
include 'connect.php';

// Requête SQL pour sélectionner les gains mensuels et annuels
$sql = "SELECT MONTH(date_inscription) AS mois, YEAR(date_inscription) AS annee, SUM(prix_formation) AS gain_total 
        FROM inscription 
        GROUP BY mois, annee";

// Exécuter la requête
$result = $conn->query($sql);

// Initialiser un tableau pour stocker les données de gains mensuels et annuels
$donneesGains = array();

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Parcourir les résultats et stocker les données dans le tableau
    while($row = $result->fetch_assoc()) {
        $donneesGains[] = array(
            'mois' => $row['mois'],
            'annee' => $row['annee'],
            'gain_total' => $row['gain_total']
        );
    }
}

// Fermer la connexion à la base de données
$conn->close();

// Convertir le tableau des données de gains en format JSON et le renvoyer
echo json_encode($donneesGains);
?>
