<?php
// Inclure le modèle de formateur
require_once '../Model/modelformateur.php';

// Vérifier si le formulaire d'ajout de formateur a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajouter_formateur'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $specialisation = $_POST['specialisation'];
    $biographe = $_POST['biographe'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "C:/xampp/htdocs/projet1/Dashboard/upload/";
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        
        // Vérifier la taille du fichier
        if ($_FILES['image']['size'] <= 5000000) { // 5 Mo
            
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $imagePath = $uploadFile;
                } else {
                    echo "Une erreur s'est produite lors du téléchargement du fichier.";
                }
           
    }
}

    // Créer une instance du modèle FormateurModel
    $formateurModel = new FormateurModel();

    // Appeler la méthode pour ajouter le formateur
    $formateurModel->ajouterFormateur($nom, $prenom, $specialisation, $biographe, $imagePath);

    // Rediriger vers une page de confirmation ou autre après l'ajout
    header("Location:../Gestion_Formateur/liste_formateur.php");
    exit();
}
?>
