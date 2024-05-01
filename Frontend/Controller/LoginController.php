<?php
// Inclure le modèle UserModel
require_once('../Model/UserModel.php');

// Démarrer la session
session_start();

// Créer une instance du modèle UserModel
$userModel = new UserModel();

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Appeler la fonction pour vérifier les informations de connexion
    $user = $userModel->login($email, $password);

    if ($user) {
        // L'utilisateur est connecté avec succès, stocker l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];
        // Rediriger vers une autre page par exemple
        header("Location: http://localhost/projet1/Frontend/index2.php?id=" . $user['id']);
        exit(); // Terminer le script
    } else {
        // Afficher un message d'erreur par exemple
        header("Location: http://localhost/projet1/Frontend/login.php?error=1");
        exit(); // Terminer le script
    }
}


?>
