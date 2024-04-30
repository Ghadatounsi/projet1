<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Inclusion du modèle
include '../Model/inscription.php';

// Création d'une instance du modèle
$inscriptionModel = new Inscription_model($conn);

// Récupération des données du formulaire
$id_candidat = $_POST['id_candidat'];
$id_formation = $_POST['id_formation'];
$titre_formation = $_POST['titre_formation'];
$duree_formation = $_POST['durée_formation'];
$username_candidat = $_POST['username_candidat'];
$email_candidat = $_POST['email_candidat'];

// Appel de la méthode pour créer une inscription
$result = $inscriptionModel->create_inscription($id_candidat, $id_formation, $titre_formation, $duree_formation, $username_candidat, $email_candidat);

if ($result) {
    header('Location: http://localhost/projet1/Frontend/inscription.php');
} else {
    echo "Erreur lors de l'inscription";
}

// Fermer la connexion à la base de données
$conn->close();
?>
