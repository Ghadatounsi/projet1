<?php
require_once 'AvisController.php'; // Remplacer FormationController.php par AvisController.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $note = $_POST["note"]; // Ajouter la récupération de la note
    $image = $_FILES['image']['name'];
    
    // Traiter l'image
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $controller = new AvisController(); // Remplacer FormationController par AvisController
    $controller->insertAvis($titre, $description, $note, $image); // Remplacer insertFormation par insertAvis

    header("Location: http://localhost/projet1/dashboard/Gestion_Avis/liste_avis.php"); // Modifier l'URL de redirection
    exit();
}
?>
