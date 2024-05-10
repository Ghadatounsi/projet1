<?php
// Inclure le modèle d'agent
require_once '../Model/modelagent.php';

// Vérifier si le formulaire d'ajout d'agent a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cin'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];

    // Créer une instance de la classe ModelAgent
    $agentModel = new Modelagent();

    // Appeler la méthode ajouterAgent pour ajouter l'agent à la base de données
    $agentModel->ajouterAgent($nom, $prenom, $username, $email, $password, $cin);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_agent/liste_agent.php");
    exit();
}

// Autres actions CRUD...
?>
