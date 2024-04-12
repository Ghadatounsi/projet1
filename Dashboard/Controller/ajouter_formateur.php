<?php
// Inclure le modèle de formateur
require_once '../Model/modelformateur.php';

// Vérifier si le formulaire d'ajout de formateur a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_formateur'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialisation = $_POST['specialisation'];
    $biographe = $_POST['biographe'];

    // Créer une instance de la classe FormateurModel
    $formateurModel = new FormateurModel();

    // Appeler la méthode ajouterFormateur pour ajouter le formateur à la base de données
    $formateurModel->ajouterFormateur($nom, $prenom, $specialisation, $biographe);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Formateur/liste_formateur.php");
    exit();
}
?>







