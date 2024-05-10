<?php
// Inclure le modèle d'agent
require_once '../Model/modelagent.php';

// Vérifier si le formulaire de modification d'agent a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['modifier_agent'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];

    // Créer une instance de la classe Modelagent
    $modelAgent = new Modelagent();

    // Appeler la méthode updateAgent pour mettre à jour les détails de l'agent dans la base de données
    $modelAgent->updateAgent($id, $nom, $prenom, $username, $email, $password, $cin);

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_agent/liste_agent.php");
    exit();
}
?>
