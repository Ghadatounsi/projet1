<?php
// Inclure le modèle d'actualité
require_once '../Model/modelact.php';

// Vérifier si une requête de suppression d'actualité a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_actualite'])) {
    // Vérifier si l'ID de l'actualité à supprimer a été fourni
    if (isset($_POST['actualite_id'])) {
        // Récupérer l'ID de l'actualité à supprimer
        $actualiteId = $_POST['actualite_id'];

        // Créer une instance de la classe ActualiteModel
        $actualiteModel = new ActualiteModel();

        // Appeler la méthode supprimerActualite pour supprimer l'actualité de la base de données
        $actualiteModel->supprimerActualite($actualiteId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location: ../Gestion_Actualite/liste_Actualite.php");
        exit();
    }
}
?>
