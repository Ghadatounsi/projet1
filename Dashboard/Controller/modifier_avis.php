<?php
// Inclure le modèle d'avis
require_once '../Model/modelavis.php';

// Vérifier si le formulaire de modification d'avis a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_avis'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $contenu = $_POST['contenu'];
    $note = $_POST['note'];
    
    // Conversion de la date au format "yyyy-MM-dd"
    $date = date('Y-m-d', strtotime($_POST['date'])); 

    // Créer une instance de la classe AvisModel
    $avisModel = new AvisModel();

    // Appeler la méthode updateAvis pour mettre à jour les détails de l'avis dans la base de données
    $avisModel->updateAvis($id, $contenu, $note, $date);

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Avis/liste_avis.php");
    exit();
}
?>
