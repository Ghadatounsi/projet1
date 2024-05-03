<?php
// Connexion à la base de données
include("include/connect.php");

// Requête SQL pour récupérer les données de revenus mensuels
$sql_revenus_mensuels = "SELECT YEAR(date_inscription) AS annee, MONTH(date_inscription) AS mois, SUM(prix_formation) AS total_mensuel 
                         FROM inscription 
                         GROUP BY YEAR(date_inscription), MONTH(date_inscription)";
$result_revenus_mensuels = $conn->query($sql_revenus_mensuels);

// Initialiser les tableaux pour les données de revenus mensuels
$mois_labels = [];
$revenus_mensuels = [];

if ($result_revenus_mensuels->num_rows > 0) {
    // Stocker les données de revenus mensuels dans les tableaux
    while ($row = $result_revenus_mensuels->fetch_assoc()) {
        $mois_labels[] = $row['mois'] . '/' . $row['annee'];
        $revenus_mensuels[] = $row['total_mensuel'];
    }
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Intégration des graphiques -->
<div class="row">
    <!-- Graphique de revenus mensuels -->
    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="revenusMensuelsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphique de revenus annuels -->
    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="revenusAnnuelsChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script pour initialiser les graphiques -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Récupérer les données de revenus mensuels et annuels
    var mois_labels = <?php echo json_encode($mois_labels); ?>;
    var revenus_mensuels = <?php echo json_encode($revenus_mensuels); ?>;
    
    // Créer le graphique de revenus mensuels
    var revenusMensuelsCtx = document.getElementById('revenusMensuelsChart').getContext('2d');
    var revenusMensuelsChart = new Chart(revenusMensuelsCtx, {
        type: 'bar',
        data: {
            labels: mois_labels,
            datasets: [{
                label: 'Revenus Mensuels',
                data: revenus_mensuels,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
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

    // Récupérer les données de revenus annuels (vous devez ajouter cette partie avec les données annuelles)
    var revenus_annuels = []; // Données de revenus annuels
    // var annees_labels = []; // Labels des années (si nécessaire)

    // Créer le graphique de revenus annuels (vous devez ajouter cette partie avec les données annuelles)
    var revenusAnnuelsCtx = document.getElementById('revenusAnnuelsChart').getContext('2d');
    var revenusAnnuelsChart = new Chart(revenusAnnuelsCtx, {
        type: 'line',
        data: {
            labels: mois_labels, // Vous pouvez changer pour les années si nécessaire
            datasets: [{
                label: 'Revenus Annuels',
                data: revenus_annuels,
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
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
