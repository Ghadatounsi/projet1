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
$username_candidat = $_POST['username_candidat'];
$email_candidat = $_POST['email_candidat'];
$id_formation = $_POST['id_formation'];
$titre_formation = $_POST['titre_formation'];
$duree_formation = $_POST['durée_formation'];
$prix_formation = $_POST['prix_formation'];
$statut = $_POST['statut'];
$date_inscription = date("Y-m-d");

// Appel de la méthode pour créer une inscription
$result = $inscriptionModel->create_inscription($id_candidat, $username_candidat, $email_candidat, $id_formation, $titre_formation, $duree_formation,$prix_formation,$statut,$date_inscription);

if ($result) {
    header("Location: http://localhost/projet1/Frontend/index2.php");
} else {
    echo "Erreur lors de l'inscription";
}

// Fermer la connexion à la base de données
$conn->close();
?>
