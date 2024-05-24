<?php
// Connexion à la base de données
include("include/connect.php");

// Requête SQL pour récupérer le nombre total de candidats inscrits
$sql_total_candidats = "SELECT COUNT(*) AS total_candidats FROM inscription";
$result_total_candidats = $conn->query($sql_total_candidats);

if ($result_total_candidats->num_rows > 0) {
    $row_total_candidats = $result_total_candidats->fetch_assoc();
    $total_candidats = $row_total_candidats["total_candidats"];
} else {
    $total_candidats = 0;
}

// Requête SQL pour calculer les revenus mensuels
$sql_revenus_mensuels = "SELECT YEAR(date_inscription) AS annee, MONTH(date_inscription) AS mois, SUM(prix_formation) AS total_mensuel 
                         FROM inscription 
                         GROUP BY YEAR(date_inscription), MONTH(date_inscription)";
$result_revenus_mensuels = $conn->query($sql_revenus_mensuels);

// Initialiser le total des revenus mensuels
$revenus_mensuels = 0;

if ($result_revenus_mensuels->num_rows > 0) {
    // Calculer les revenus mensuels
    while ($row_revenus_mensuels = $result_revenus_mensuels->fetch_assoc()) {
        $revenus_mensuels += $row_revenus_mensuels["total_mensuel"];
    }
} else {
    $revenus_mensuels = 0;
}

// Requête SQL pour calculer les revenus annuels
$sql_revenus_annuels = "SELECT YEAR(date_inscription) AS annee, SUM(prix_formation) AS total_annuel 
                        FROM inscription 
                        GROUP BY YEAR(date_inscription)";
$result_revenus_annuels = $conn->query($sql_revenus_annuels);

// Initialiser le total des revenus annuels
$revenus_annuels = 0;

if ($result_revenus_annuels->num_rows > 0) {
    // Calculer les revenus annuels
    while ($row_revenus_annuels = $result_revenus_annuels->fetch_assoc()) {
        $revenus_annuels += $row_revenus_annuels["total_annuel"];
    }
} else {
    $revenus_annuels = 0;
}


// Requête SQL pour récupérer le nombre total de demandes en attente
$sql_demandes_attente = "SELECT COUNT(*) AS total_demandes_attente FROM inscription WHERE statut = 'en_attente'";
$result_demandes_attente = $conn->query($sql_demandes_attente);

if ($result_demandes_attente->num_rows > 0) {
    $row_demandes_attente = $result_demandes_attente->fetch_assoc();
    $total_demandes_attente = $row_demandes_attente["total_demandes_attente"];
} else {
    $total_demandes_attente = 0;
}
// Requête SQL pour récupérer le nombre total de demandes en attente
$sql_demandes_approuve = "SELECT COUNT(*) AS total_demandes_approuve FROM inscription WHERE statut = 'approuve'";
$result_demandes_approuve = $conn->query($sql_demandes_approuve);

if ($result_demandes_approuve->num_rows > 0) {
    $row_demandes_approuve = $result_demandes_approuve->fetch_assoc();
    $total_demandes_approuve = $row_demandes_approuve["total_demandes_approuve"];
} else {
    $total_demandes_approuve = 0;
}

// Fermer la connexion à la base de données
$conn->close();
?>

<!-- Intégration des données dans les cartes -->
<div class="row">
    <!-- Revenus mensuels -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Revenus (Mensuels)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $revenus_mensuels; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Revenus annuels -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Revenus (Annuels)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $revenus_annuels; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Demandes en attente -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Demandes en attente</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_demandes_attente; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Demandes en attente -->
     <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Demandes en approuve</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_demandes_approuve; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
