<?php
// Inclure le modèle UserModel
require_once('../Model/UserModel.php');

// Créer une instance du modèle UserModel
$userModel = new UserModel();

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    // Récupérer les données du formulaire
    $id=$_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Appeler la fonction pour vérifier les informations de connexion
    $user = $userModel->login($email, $password);

    if ($user) {
        $id = $user['id'];
        // L'utilisateur est connecté avec succès, vous pouvez rediriger vers une autre page par exemple
        header("Location: http://localhost/projet1/dashboard/index.php?id=$id");
        exit(); // Terminer le script
    } else {
        // Afficher un message d'erreur par exemple
        header('Location: http://localhost/projet1/dashboard/login.php');
        $error = "Email ou mot de passe incorrect";
    }
}
?>
