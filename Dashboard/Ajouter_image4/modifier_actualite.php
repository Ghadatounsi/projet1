<?php
// Inclure la logique de gestion des actualités
require_once 'ActualiteController.php'; // Remplacer FormationController.php par ActualiteController.php

// Vérifier si l'identifiant de l'actualité à mettre à jour est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant de l'actualité depuis l'URL
    $actualite_id = $_GET['id']; // Remplacer formation_id par actualite_id
    
    // Récupérer les détails de l'actualité à modifier
    $actualite = $controller->getActualiteById($actualite_id); // Remplacer getFormationById par getActualiteById
    
    // Vérifier si l'actualité existe
    if($actualite) {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $titre = $_POST["titre"];
            $description = $_POST["contenu"];
            $date = $_POST["date"];
            
            // Mettre à jour l'actualité dans la base de données
            $controller->updateActualite($actualite_id, $titre, $contenu, $date); // Remplacer updateFormation par updateActualite
            
            // Rediriger vers la liste des actualités après la mise à jour
            header("Location: liste.php");
            exit();
        }
    } else {
        // Gérer le cas où l'actualité n'existe pas
        echo "L'actualité que vous essayez de modifier n'existe pas.";
        exit();
    }
} else {
    // Gérer le cas où l'identifiant de l'actualité n'est pas présent dans l'URL
    echo "Identifiant d'actualité non spécifié.";
    exit();
}
?>
