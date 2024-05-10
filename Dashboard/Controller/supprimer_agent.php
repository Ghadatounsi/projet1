<?php
// Inclure le modèle d'agent
require_once '../Model/modelagent.php'; // Correction du nom du fichier du modèle

// Vérifier si une requête de suppression d'agent a été soumise
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['supprimer_agent'])) {
    // Vérifier si l'ID de l'agent à supprimer a été fourni
    if (isset($_POST['id'])) {
        // Récupérer et nettoyer l'ID de l'agent à supprimer
        $agentId = htmlspecialchars($_POST['id']);

        // Créer une instance de la classe Modelagent
        $modelAgent = new Modelagent();

        // Appeler la méthode supprimerAgent pour supprimer l'agent de la base de données
        $modelAgent->supprimeragent($agentId);

        // Rediriger vers une page de confirmation après la suppression
        header("Location:../Gestion_agent/liste_agent.php");
        exit();
    }
}
?>
