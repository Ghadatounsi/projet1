<?php
// controller.php

// Inclure le modèle de module
require_once '../Model/modelmodule.php';

// Vérifier si le formulaire d'ajout de module a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_module'])) {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['discription'];


    // Créer une instance de la classe ModuleModel
    $moduleModel = new ModuleModel();

    // Appeler la méthode ajouterModule pour ajouter le module à la base de données
    $moduleModel->ajouterModule($titre, $description);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Module/liste_module.php");
    exit();
}

// Autres actions CRUD...

?>
