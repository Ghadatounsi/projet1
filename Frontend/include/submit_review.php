<?php
// Inclure la classe AvisModel
session_start(); // Démarrez la session si ce n'est pas déjà fait

require_once '../../Dashboard/Model/modelavis.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $contenu = $_POST["contenu"];
    $note = $_POST["note"];
    // Date actuelle
    $date = date('Y-m-d');

    // Créer une instance de la classe AvisModel
    $avisModel = new AvisModel();

    // Appeler la méthode ajouterAvis pour insérer l'avis dans la base de données
    $avisModel->ajouterAvis($contenu, $note, $date);

    // Rediriger l'utilisateur vers une page de confirmation ou une autre page appropriée
    header("Location: http://localhost/projet1/Frontend/index2.php?id=" . (isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''));
    exit(); // Arrêter l'exécution du script après la redirection
}
?>
