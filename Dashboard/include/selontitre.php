<?php
// Inclure le fichier de connexion à la base de données
include("include/connect.php");

// Requête SQL pour obtenir la répartition des revenus par titre de formation
$sql_repartition_revenus = "SELECT titre_formation, SUM(prix_formation) AS total_revenus
                            FROM inscription
                            GROUP BY titre_formation";
$result_repartition_revenus = $conn->query($sql_repartition_revenus);

// Tableaux pour stocker les données de répartition des revenus par titre de formation
$labels_titres_formation = [];
$revenus_par_titre_formation = [];

if ($result_repartition_revenus->num_rows > 0) {
    // Stocker les données dans les tableaux
    while ($row = $result_repartition_revenus->fetch_assoc()) {
        $labels_titres_formation[] = $row['titre_formation'];
        $revenus_par_titre_formation[] = $row['total_revenus'];
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Intégration du graphique de répartition des revenus par titre de formation -->
<div style="width: 100%;">
    <canvas id="repartitionRevenusChart"></canvas>
</div>

<!-- Script pour initialiser le graphique -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels_titres_formation = <?php echo json_encode($labels_titres_formation); ?>;
    var revenus_par_titre_formation = <?php echo json_encode($revenus_par_titre_formation); ?>;
    
    var repartitionRevenusCtx = document.getElementById('repartitionRevenusChart').getContext('2d');
    var repartitionRevenusChart = new Chart(repartitionRevenusCtx, {
        type: 'bar',
        data: {
            labels: labels_titres_formation,
            datasets: [{
                label: 'Répartition des Revenus par Titre de Formation',
                data: revenus_par_titre_formation,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
