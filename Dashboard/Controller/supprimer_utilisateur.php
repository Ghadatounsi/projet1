<?php
// controller.php

// Inclure le modèle d'utilisateur
require_once '../Model/modelutilisateur.php';

// Vérifier si une requête de suppression d'utilisateur a été soumise
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer_utilisateur'])) {
    // Vérifier si l'ID de l'utilisateur à supprimer a été fourni
    if (isset($_POST['utilisateur_id'])) {
        // Récupérer l'ID de l'utilisateur à supprimer
        $utilisateurId = $_POST['utilisateur_id'];

        // Créer une instance de la classe UtilisateurModel
        $utilisateurModel = new UtilisateurModel();

        // Appeler la méthode supprimerUtilisateur pour supprimer l'utilisateur de la base de données
        $utilisateurModel->supprimerUtilisateur($utilisateurId);

        // Rediriger vers une page de confirmation ou autre après la suppression
        header("Location:../Gestion_Utilisateur/liste_utilisateur.php");
        exit();
    }
}
?>
