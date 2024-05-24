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

// Fonction pour effectuer la régression linéaire multiple
function linearRegression(array $X, array $y, $lambda = 0.01) {
    $n = count($X);
    $X_transpose = array_map(null, ...$X);
    $X_transpose_X = [];

    // Calculer X^T * X
    for ($i = 0; $i < count($X_transpose); $i++) {
        for ($j = 0; $j < count($X_transpose); $j++) {
            $X_transpose_X[$i][$j] = 0;
            for ($k = 0; $k < $n; $k++) {
                $X_transpose_X[$i][$j] += $X_transpose[$i][$k] * $X[$k][$j];
            }
        }
    }

    // Ajouter le terme de régularisation à la diagonale de X^T * X
    for ($i = 0; $i < count($X_transpose_X); $i++) {
        $X_transpose_X[$i][$i] += $lambda;
    }

    // Vérifier si la matrice est inversible
    if (determinant($X_transpose_X) == 0) {
        throw new Exception('La matrice X^T * X n\'est pas inversible même après régularisation.');
    }

    // Calculer l'inverse de X^T * X
    $X_transpose_X_inv = inverseMatrix($X_transpose_X);

    // Calculer X^T * y
    $X_transpose_y = [];
    for ($i = 0; $i < count($X_transpose); $i++) {
        $X_transpose_y[$i] = 0;
        for ($k = 0; $k < $n; $k++) {
            $X_transpose_y[$i] += $X_transpose[$i][$k] * $y[$k];
        }
    }

    // Calculer les coefficients: (X^T * X)^(-1) * X^T * y
    $coefficients = [];
    for ($i = 0; $i < count($X_transpose_X_inv); $i++) {
        $coefficients[$i] = 0;
        for ($j = 0; $j < count($X_transpose_X_inv); $j++) {
            $coefficients[$i] += $X_transpose_X_inv[$i][$j] * $X_transpose_y[$j];
        }
    }

    return $coefficients;
}

// Fonction pour calculer l'inverse d'une matrice (méthode de Gauss-Jordan)
function inverseMatrix($matrix) {
    $n = count($matrix);
    $identity = [];

    // Créer une matrice identité
    for ($i = 0; $i < $n; $i++) {
        $identity[$i] = array_fill(0, $n, 0);
        $identity[$i][$i] = 1;
    }

    // Ajouter la matrice identité à la droite de la matrice
    for ($i = 0; $i < $n; $i++) {
        $matrix[$i] = array_merge($matrix[$i], $identity[$i]);
    }

    // Appliquer la méthode de Gauss-Jordan
    for ($i = 0; $i < $n; $i++) {
        if ($matrix[$i][$i] == 0) {
            throw new DivisionByZeroError('Division par zéro lors de la normalisation.');
        }

        $diag = $matrix[$i][$i];
        for ($j = 0; $j < $n * 2; $j++) {
            $matrix[$i][$j] /= $diag;
        }
        for ($j = 0; $j < $n; $j++) {
            if ($i != $j) {
                $factor = $matrix[$j][$i];
                for ($k = 0; $k < $n * 2; $k++) {
                    $matrix[$j][$k] -= $factor * $matrix[$i][$k];
                }
            }
        }
    }

    // Extraire l'inverse de la matrice augmentée
    $inverse = [];
    for ($i = 0; $i < $n; $i++) {
        $inverse[$i] = array_slice($matrix[$i], $n);
    }

    return $inverse;
}

// Fonction pour calculer le déterminant d'une matrice
function determinant($matrix) {
    $n = count($matrix);
    if ($n == 1) {
        return $matrix[0][0];
    } elseif ($n == 2) {
        return $matrix[0][0] * $matrix[1][1] - $matrix[0][1] * $matrix[1][0];
    } else {
        $det = 0;
        for ($i = 0; $i < $n; $i++) {
            $submatrix = [];
            for ($j = 1; $j < $n; $j++) {
                $row = [];
                for ($k = 0; $k < $n; $k++) {
                    if ($k != $i) {
                        $row[] = $matrix[$j][$k];
                    }
                }
                $submatrix[] = $row;
            }
            $det += $matrix[0][$i] * determinant($submatrix) * (($i % 2 == 0) ? 1 : -1);
        }
        return $det;
    }
}

// Préparer les données
$X = [];
for ($i = 0; $i < count($durees); $i++) {
    $X[] = [1, $durees[$i], $prix[$i]];  // Ajout de l'intercept (colonne de 1)
}
$y = $inscriptions;

// Effectuer la régression linéaire multiple
try {
    $coefficients = linearRegression($X, $y);
} catch (Exception $e) {
    echo "Erreur: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Régression Multiple</title>
    <!-- Inclure la bibliothèque Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Résultats de la Régression Multiple</h1>
    <canvas id="regressionChart" width="50%" height="50%"></canvas>

    <script>
        // Récupérez les coefficients de régression de PHP
        var coefficients = <?php echo json_encode($coefficients); ?>;

        // Préparez les données pour la courbe de régression
        var regressionData = [];
        for (var x = 0; x <= 10; x++) {
            var y = coefficients[0] + coefficients[1] * x + coefficients[2] * x; // Équation de régression
            regressionData.push({x: x, y: y});
        }

        // Créez un graphique avec Chart.js
        var ctx = document.getElementById('regressionChart').getContext('2d');
        var regressionChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: 'Régression Multiple',
                    data: regressionData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
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
</body>
</html>
