<?php
// Inclure le modèle d'utilisateur
require_once '../Model/modelutilisateur.php';

// Vérifier si le formulaire d'ajout d'utilisateur a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_utilisateur_submit'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Créer une instance de la classe UtilisateurModel
    $utilisateurModel = new UtilisateurModel();

    // Appeler la méthode ajouterUtilisateur pour ajouter l'utilisateur à la base de données
    $utilisateurModel->ajouterUtilisateur($nom, $prenom, $email, $motdepasse);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Utilisateur/liste_utilisateur.php");
    exit();
}
?>
