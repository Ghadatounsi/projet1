<?php
// controller.php

// Inclure le modèle de formation
require_once '../Model/model.php';

// Vérifier si une requête de suppression de formation a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_formation'])) {
    // Vérifier si l'ID de la formation à supprimer a été fourni
    if (isset($_POST['formation_id'])) {
        // Récupérer l'ID de la formation à supprimer
        $formationId = $_POST['formation_id'];

        // Créer une instance de la classe FormationModel
        $formationModel = new FormationModel();

        // Appeler la méthode supprimerFormation pour supprimer la formation de la base de données
        $formationModel->supprimerFormation($formationId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Formation/liste_formation.php");
        exit();
    }
}
?>
