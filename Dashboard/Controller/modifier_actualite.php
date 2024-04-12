<?php
// Inclure le modèle d'actualité
require_once '../Model/modelact.php';

// Vérifier si le formulaire de modification d'actualité a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_actualite'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    
    // Conversion de la date au format "yyyy-MM-dd"
    $date = date('Y-m-d', strtotime($_POST['date'])); 

    // Créer une instance de la classe ActModel
    $actualiteModel = new ActualiteModel();

    // Appeler la méthode updateAct pour mettre à jour les détails de l'actualité dans la base de données
    $actualiteModel->updateactualite($id, $titre, $contenu, $date);

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Actualite/liste_actualite.php");
    exit();
}
?>
 