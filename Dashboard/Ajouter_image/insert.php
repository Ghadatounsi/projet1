<?php
require_once 'FormationController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $objectif = $_POST["objectif"];
    $programme = $_POST["programme"];
    $durée = $_POST["durée"];
    $prix = $_POST["prix"];
    $date = $_POST["date"];
    
    // Traiter l'image
    $image = $_FILES['image']['name'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $controller = new FormationController();
    $controller->insertFormation($titre, $description, $objectif, $programme, $durée, $prix, $date, $image);

    header("Location:http://localhost/projet1/dashboard/Gestion_Formation/liste_formation.php");
    exit();


}
?>
