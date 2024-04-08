<?php
// controller.php

// Inclure le modèle de formation
require_once '../Model/model.php';

// Vérifier si le formulaire d'ajout de formation a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_formation'])) {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $objectif = $_POST['objectif'];
    $programme = $_POST['programme'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $date = $_POST['date'];

    // Créer une instance de la classe FormationModel
    $formationModel = new FormationModel();

    // Appeler la méthode ajouterFormation pour ajouter la formation à la base de données
    $formationModel->ajouterFormation($titre, $description, $objectif, $programme, $duree, $prix, $date);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Formation/liste_formation.php");
    exit();
}

// Autres actions CRUD...

?>
