<?php
// Inclure la logique de gestion des utilisateurs
require_once 'UtilisateurController.php';

// Vérifier si l'identifiant de l'utilisateur à mettre à jour est présent dans l'URL
if(isset($_GET['id'])) {
    // Récupérer l'identifiant de l'utilisateur depuis l'URL
    $utilisateur_id = $_GET['id'];
    
    // Instancier le contrôleur des utilisateurs
    $controller = new UtilisateurController();

    // Récupérer les détails de l'utilisateur à modifier
    $utilisateur = $controller->getUtilisateurById($utilisateur_id);
    
    // Vérifier si l'utilisateur existe
    if($utilisateur) {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les données du formulaire
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $email = $_POST["email"];
            $motdepasse = $_POST["motdepasse"];
            
            // Mettre à jour l'utilisateur dans la base de données
            $controller->updateUser($utilisateur_id, $nom, $prenom, $email, $motdepasse);
            
            // Rediriger vers la liste des utilisateurs après la mise à jour
            header("Location: liste_utilisateurs.php");
            exit();
        }
    } else {
        // Gérer le cas où l'utilisateur n'existe pas
        echo "L'utilisateur que vous essayez de modifier n'existe pas.";
        exit();
    }
} else {
    // Gérer le cas où l'identifiant de l'utilisateur n'est pas présent dans l'URL
    echo "Identifiant d'utilisateur non spécifié.";
    exit();
}
?>
