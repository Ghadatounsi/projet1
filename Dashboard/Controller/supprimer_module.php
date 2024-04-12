<?php
// Inclure le modèle de module
require_once '../Model/modelmodule.php';

// Vérifier si une requête de suppression de module a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_module'])) {
    // Vérifier si l'ID du module à supprimer a été fourni
    if (isset($_POST['module_id'])) {
        // Récupérer l'ID du module à supprimer
        $moduleId = $_POST['module_id'];

        // Créer une instance de la classe ModuleModel
        $moduleModel = new ModuleModel();

        // Appeler la méthode supprimerModule pour supprimer le module de la base de données
        $moduleModel->supprimerModule($moduleId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Module/liste_module.php");
        exit();
    }
}
?>
