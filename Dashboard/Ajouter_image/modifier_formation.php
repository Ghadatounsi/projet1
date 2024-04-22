<?php
// Inclure la logique de gestion des formations
require_once 'FormationController.php';

// Vérifier si l'identifiant de la formation à mettre à jour est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant de la formation depuis l'URL
    $formation_id = $_GET['id'];
    
    // Récupérer les détails de la formation à modifier
    $formation = $controller->getFormationById($formation_id);
    
    // Vérifier si la formation existe
    if($formation) {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $titre = $_POST["titre"];
            $description = $_POST["description"];
            $objectif = $_POST["objectif"];
            $programme = $_POST["programme"];
            $durée = $_POST["duree"];
            $prix = $_POST["prix"];
            $date = $_POST["date"];
            
            // Mettre à jour la formation dans la base de données
            $controller->updateFormation($formation_id, $titre, $description, $objectif, $programme, $durée, $prix, $date);
            
            // Rediriger vers la liste des formations après la mise à jour
            header("Location: liste.php");
            exit();
        }
    } else {
        // Gérer le cas où la formation n'existe pas
        echo "La formation que vous essayez de modifier n'existe pas.";
        exit();
    }
} else {
    // Gérer le cas où l'identifiant de la formation n'est pas présent dans l'URL
    echo "Identifiant de formation non spécifié.";
    exit();
}
?>

