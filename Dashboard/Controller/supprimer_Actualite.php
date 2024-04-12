<?php
// Inclure le modèle d'actualité
require_once '../Model/modelact.php';

// Vérifier si une requête de suppression d'actualité a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_Actualite'])) {
    // Vérifier si l'ID de l'actualité à supprimer a été fourni
    if (isset($_POST['Actualite_id'])) {
        // Récupérer l'ID de l'actualité à supprimer
        $ActualiteId = $_POST['Actualite_id'];

        // Créer une instance de la classe ActModel
        $ActualiteModel = new ActualiteModel();

        // Appeler la méthode supprimerAct pour supprimer l'actualité de la base de données
        $ActualiteModel->supprimerActualite($ActualiteId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Actualite/liste_Actualite.php");
        exit();
    }
}
?>

