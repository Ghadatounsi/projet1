<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Détruire toutes les données de session
    session_destroy();

    // Rediriger vers la page de connexion
    header("Location: http://localhost/projet1/dashboard/index.php");
    exit(); // Terminer le script
}
?>
