<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/projet1/dashboard/index.php");
    exit();
}

require('fpdf.php');
include("include/connect.php");

// Requête SQL pour obtenir les données pour le rapport
$sql_revenus_mensuels = "SELECT YEAR(date_inscription) AS annee, MONTH(date_inscription) AS mois, SUM(prix_formation) AS total_mensuel 
                         FROM inscription 
                         GROUP BY YEAR(date_inscription), MONTH(date_inscription)";
$result_revenus_mensuels = $conn->query($sql_revenus_mensuels);

$sql_repartition_revenus = "SELECT titre_formation, SUM(prix_formation) AS total_revenus
                            FROM inscription
                            GROUP BY titre_formation";
$result_repartition_revenus = $conn->query($sql_repartition_revenus);

$sql_tendance_inscriptions = "SELECT YEAR(date_inscription) AS annee, MONTH(date_inscription) AS mois, COUNT(*) AS nombre_inscriptions
                              FROM inscription
                              GROUP BY YEAR(date_inscription), MONTH(date_inscription)
                              ORDER BY annee, mois";
$result_tendance_inscriptions = $conn->query($sql_tendance_inscriptions);

// Création du PDF
class PDF extends FPDF
{
    // En-tête
    function Header()
    {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Rapport de Formation',0,1,'C');
    }

    // Pied de page
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

// Section des revenus mensuels
$pdf->Cell(0,10,'Revenus Mensuels',0,1);
$pdf->SetFont('Arial','',10);
if ($result_revenus_mensuels->num_rows > 0) {
    while ($row = $result_revenus_mensuels->fetch_assoc()) {
        $pdf->Cell(0,10,$row['mois'] . '/' . $row['annee'] . ' : ' . $row['total_mensuel'] . ' TND',0,1);
    }
} else {
    $pdf->Cell(0,10,'Aucun revenu mensuel trouve.',0,1);
}

// Section de répartition des revenus par titre de formation
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Repartition des Revenus par Titre de Formation',0,1);
$pdf->SetFont('Arial','',10);
if ($result_repartition_revenus->num_rows > 0) {
    while ($row = $result_repartition_revenus->fetch_assoc()) {
        $pdf->Cell(0,10,$row['titre_formation'] . ' : ' . $row['total_revenus'] . ' TND',0,1);
    }
} else {
    $pdf->Cell(0,10,'Aucun revenu trouve par titre de formation.',0,1);
}

// Section de la tendance des inscriptions
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Tendance des Inscriptions',0,1);
$pdf->SetFont('Arial','',10);
if ($result_tendance_inscriptions->num_rows > 0) {
    while ($row = $result_tendance_inscriptions->fetch_assoc()) {
        $pdf->Cell(0,10,$row['mois'] . '/' . $row['annee'] . ' : ' . $row['nombre_inscriptions'] . ' inscriptions',0,1);
    }
} else {
    $pdf->Cell(0,10,'Aucune inscription trouvee.',0,1);
}

$pdf->Output('D', 'rapport_formation.pdf');

// Fermer la connexion à la base de données
$conn->close();
?>
