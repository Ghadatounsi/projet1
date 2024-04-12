<?php
// Inclure le modèle d'actualité
require_once '../Model/modelact.php';

// Vérifier si le formulaire d'ajout d'actualité a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouterAct'])) {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date = $_POST['date'];

    // Créer une instance de la classe ActModel
    $actualiteModel = new ActualiteModel();

    // Appeler la méthode ajouterAct pour ajouter l'actualité à la base de données
    $actualiteModel->ajouterActualite($titre, $contenu, $date);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Actualite/liste_actualite.php");
    exit();
}

// Autres actions CRUD...
?>
