<?php
require_once 'UtilisateurController.php'; // Assurez-vous de remplacer "FormationController.php" par le bon fichier pour gérer les utilisateurs

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"]; // Changer "titre" en "nom"
    $prenom = $_POST["prenom"]; // Changer "description" en "prenom"
    $email = $_POST["email"]; // Changer "objectif" en "email"
    $motdepasse = $_POST["motdepasse"]; // Changer "programme" en "motdepasse"

 // Traiter l'image
 $image = $_FILES['image']['name'];
 $target_dir = "../upload/";
 $target_file = $target_dir . basename($_FILES["image"]["name"]);
 move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
 
    
    // Appel de la méthode pour ajouter l'utilisateur
    $controller = new UtilisateurController(); // Assurez-vous de remplacer "FormationController" par le bon contrôleur pour les utilisateurs
    $controller->insertUtilisateur($nom, $prenom, $email, $motdepasse, $image);

    // Redirection vers une page appropriée après l'ajout de l'utilisateur
    header("Location:http://localhost/projet1/dashboard/Gestion_Utilisateur/liste_utilisateur.php");
    exit();
}
?>
