<?php
// Inclure le modèle d'avis
require_once '../Model/modelavis.php';

// Vérifier si une requête de suppression d'avis a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_avis'])) {
    // Vérifier si l'ID de l'avis à supprimer a été fourni
    if (isset($_POST['avis_id'])) {
        // Récupérer l'ID de l'avis à supprimer
        $avisId = $_POST['avis_id'];

        // Créer une instance de la classe AvisModel
        $avisModel = new AvisModel();

        // Appeler la méthode supprimerAvis pour supprimer l'avis de la base de données
        $avisModel->supprimerAvis($avisId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Avis/liste_avis.php");
        exit();
    }
}
?>
