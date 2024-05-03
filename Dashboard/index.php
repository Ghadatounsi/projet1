<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphiques de Gains</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Graphique de gains mensuels -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Gains Mensuels
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Graphique de gains annuels -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Gains Annuels
                    </div>
                    <div class="card-body">
                        <canvas id="annualChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclure Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Script pour récupérer et afficher les données -->
    <script>
        // Récupérer les données de gains depuis get_data.php en utilisant AJAX
        fetch('get_data.php')
            .then(response => response.json())
            .then(data => {
                // Extraire les mois, les années et les gains des données
                const months = data.map(item => item.mois);
                const years = data.map(item => item.annee);
                const monthlyGains = data.map(item => item.gain_total);

                // Créer le graphique de gains mensuels
                var monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
                var monthlyChart = new Chart(monthlyCtx, {
                    type: 'bar',
                    data: {
                        labels: months.map((month, index) => month + '-' + years[index]),
                        datasets: [{
                            label: 'Gains Mensuels',
                            data: monthlyGains,
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

                // Créer le graphique de gains annuels
                var annualCtx = document.getElementById('annualChart').getContext('2d');
                var annualChart = new Chart(annualCtx, {
                    type: 'line',
                    data: {
                        labels: years,
                        datasets: [{
                            label: 'Gains Annuels',
                            data: monthlyGains.reduce((acc, curr, index) => {
                                const yearIndex = years.indexOf(years[index]);
                                acc[yearIndex] = (acc[yearIndex] || 0) + curr;
                                return acc;
                            }, []),
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
            })
            .catch(error => console.error('Erreur lors de la récupération des données de gains :', error));
    </script>
</body>
</html>
