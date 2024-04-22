<?php
require_once 'FormateurController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $specialisation = $_POST["specialisation"];
    $biographe = $_POST["biographe"];
   
    // Traiter l'image
    $image = $_FILES['image']['name'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Créer une instance de FormateurController
    $controller = new FormateurController();

    // Appeler la méthode insertFormateur() de FormateurController
    $controller->insertFormateur($nom, $prenom, $specialisation, $biographe, $image);

    // Redirection après l'insertion
    header("Location: http://localhost/projet1/dashboard/Gestion_Formateur/liste_formateur.php");
    exit();
}
?>

