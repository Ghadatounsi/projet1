<?php
// Inclure la logique de gestion des formateurs
require_once 'FormateurController.php';

// Vérifier si l'identifiant du formateur à mettre à jour est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant du formateur depuis l'URL
    $formateur_id = $_GET['id'];
    
    // Récupérer les détails du formateur à modifier
    $formateur = $controller->getFormateurById($formateur_id);
    
    // Vérifier si le formateur existe
    if($formateur) {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $specialisation = $_POST["specialisation"];
            $biographe = $_POST["biographe"];
            
            // Mettre à jour le formateur dans la base de données
            $controller->updateFormateur($formateur_id, $nom, $prenom, $specialisation, $biographe);
            
            // Rediriger vers la liste des formateurs après la mise à jour
            header("Location: liste.php");
            exit();
        }
    } else {
        // Gérer le cas où le formateur n'existe pas
        echo "Le formateur que vous essayez de modifier n'existe pas.";
        exit();
    }
} else {
    // Gérer le cas où l'identifiant du formateur n'est pas présent dans l'URL
    echo "Identifiant de formateur non spécifié.";
    exit();
}
?>
