<?php
// Inclure le fichier de connexion à la base de données
include("include/connect.php");

// Requête SQL pour obtenir la tendance des inscriptions au fil du temps
$sql_tendance_inscriptions = "SELECT YEAR(date_inscription) AS annee, MONTH(date_inscription) AS mois, COUNT(*) AS nombre_inscriptions
                              FROM inscription
                              GROUP BY YEAR(date_inscription), MONTH(date_inscription)
                              ORDER BY annee, mois";
$result_tendance_inscriptions = $conn->query($sql_tendance_inscriptions);

// Tableaux pour stocker les données de tendance des inscriptions
$labels_tendance_inscriptions = [];
$inscriptions_par_mois = [];

if ($result_tendance_inscriptions->num_rows > 0) {
    // Stocker les données dans les tableaux
    while ($row = $result_tendance_inscriptions->fetch_assoc()) {
        $labels_tendance_inscriptions[] = $row['mois'] . '/' . $row['annee'];
        $inscriptions_par_mois[] = $row['nombre_inscriptions'];
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Intégration du graphique de tendance des inscriptions -->
<div style="width: 100%;">
    <canvas id="tendanceInscriptionsChart"></canvas>
</div>

<!-- Script pour initialiser le graphique -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var labels_tendance_inscriptions = <?php echo json_encode($labels_tendance_inscriptions); ?>;
    var inscriptions_par_mois = <?php echo json_encode($inscriptions_par_mois); ?>;
    
    var tendanceInscriptionsCtx = document.getElementById('tendanceInscriptionsChart').getContext('2d');
    var tendanceInscriptionsChart = new Chart(tendanceInscriptionsCtx, {
        type: 'line',
        data: {
            labels: labels_tendance_inscriptions,
            datasets: [{
                label: 'Tendance des Inscriptions',
                data: inscriptions_par_mois,
                fill: false,
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
