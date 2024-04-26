<?php
// Inclure le modèle AdminModel
require_once('../Model/AdminModel.php');

// Créer une instance du modèle AdminModel

// Vérifier si le formulaire d'ajout d'administrateur a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $adminModel = new AdminModel();

    // Appeler la fonction pour ajouter un administrateur
    $adminModel->ajouterAdmin($username, $email, $password);

    // Rediriger vers une autre page après l'ajout de l'administrateur
    header('Location: http://localhost/projet1/Frontend/login.php');
    exit(); // Terminer le script
}

// Si une autre action est requise, vous pouvez l'ajouter ici, par exemple pour supprimer un administrateur


?>
