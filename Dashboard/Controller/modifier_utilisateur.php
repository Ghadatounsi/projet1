<?php
// Inclure le modèle d'utilisateur
require_once '../Model/modelutilisateur.php';

// Vérifier si le formulaire de modification d'utilisateur a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_utilisateur'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email']; // Ajoutez les champs manquants si nécessaire
    $motdepasse = $_POST['motdepasse']; // Ajoutez les champs manquants si nécessaire
    
    // Créer une instance de la classe UtilisateurModel
    $utilisateurModel = new UtilisateurModel();

    // Appeler la méthode updateUtilisateur pour mettre à jour les détails de l'utilisateur dans la base de données
    $utilisateurModel->updateUtilisateur($id, $nom, $prenom, $email, $motdepasse); // Assurez-vous d'ajouter les autres champs si nécessaire

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Utilisateur/liste_utilisateur.php");
    exit();
}
?>
