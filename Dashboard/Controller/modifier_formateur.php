<?php
// Inclure le modèle de formateur
require_once '../Model/modelformateur.php';

// Vérifier si le formulaire de modification de formateur a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_formateur'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialisation = $_POST['specialisation'];
    $biographe = $_POST['biographe'];

    // Créer une instance de la classe FormateurModel
    $formateurModel = new FormateurModel();

    // Appeler la méthode updateFormateur pour mettre à jour les détails du formateur dans la base de données
    $formateurModel->updateFormateur($id, $nom, $prenom, $specialisation, $biographe);

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Formateur/liste_formateur.php");
    exit();
}
?>

