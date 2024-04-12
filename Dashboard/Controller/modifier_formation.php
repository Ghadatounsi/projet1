<?php
// Inclure le modèle de formation
require_once '../Model/model.php';

// Vérifier si le formulaire de modification de formation a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_formation'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $objectif = $_POST['objectif'];
    $programme = $_POST['programme'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    
    // Conversion de la date au format "yyyy-MM-dd"
    $date = date('d-m-y', strtotime($_POST['date'])); 

    // Créer une instance de la classe FormationModel
    $formationModel = new FormationModel();

    // Appeler la méthode updateFormation pour mettre à jour les détails de la formation dans la base de données
    $formationModel->updateFormation($id, $titre, $description, $objectif, $programme, $duree, $prix, $date);

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Formation/liste_formation.php");
    exit();
}
?>
