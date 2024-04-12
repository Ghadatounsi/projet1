<?php
// Inclure le modèle de formateur
require_once '../Model/modelformateur.php';

// Vérifier si une requête de suppression de formateur a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_formateur'])) {
    // Vérifier si l'ID du formateur à supprimer a été fourni
    if (isset($_POST['formateur_id'])) {
        // Récupérer l'ID du formateur à supprimer
        $formateurId = $_POST['formateur_id'];

        // Créer une instance de la classe FormateurModel
        $formateurModel = new FormateurModel();

        // Appeler la méthode supprimerFormateur pour supprimer le formateur de la base de données
        $formateurModel->supprimerFormateur($formateurId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Formateur/liste_formateur.php");
        exit();
    }
}
?>




