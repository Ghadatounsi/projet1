<?php
require_once 'ActualiteController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $date = $_POST["date"];
    
    // Traiter l'image
    $image = $_FILES['image']['name'];
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    $controller = new ActualiteController();
    $controller->insertActualite($titre,$contenu,$date,$image);

    header("Location:http://localhost/projet1/dashboard/Gestion_Actualite/liste_actualite.php");
    exit();


}
?>