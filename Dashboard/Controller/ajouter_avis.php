<?php
// controller.php

// Inclure le modèle d'avis
require_once '../Model/modelavis.php';

// Vérifier si le formulaire d'ajout d'avis a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_avis'])) {
    // Récupérer les données du formulaire
    $contenu = $_POST['contenu'];
    $note = $_POST['note'];
    $date = $_POST['date'];

    // Créer une instance de la classe AvisModel
    $avisModel = new AvisModel();

    // Appeler la méthode ajouterAvis pour ajouter l'avis à la base de données
    $avisModel->ajouterAvis($contenu, $note, $date);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Avis/liste_avis.php");
    exit();
}

// Autres actions CRUD...

?>
