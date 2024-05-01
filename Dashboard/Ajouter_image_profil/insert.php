<?php


// Vérifier si une image a été soumise
if(isset($_FILES['image'])) {
    // Inclure le fichier de connexion à la base de données
    include("../include/connect.php");
    
    // Récupérer le chemin de l'image téléchargée
    $image_path = $_FILES['image']['tmp_name'];
    
    // Vérifier si l'image a été téléchargée avec succès
    if($image_path !== "") {
        // Ouvrir et lire le contenu de l'image en binaire
        $image_data = file_get_contents($image_path);
        
        // Préparer la requête pour mettre à jour l'image dans la table admins
        $stmt = $conn->prepare("UPDATE admins SET image = ? WHERE id = ?");
        $stmt->bind_param("si", $image_data, $user_id);
        
        // Exécuter la requête
        if($stmt->execute()) {
            echo "L'image a été insérée avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion de l'image.";
        }
        
        // Fermer la connexion à la base de données
        $conn->close();
    } else {
        echo "Veuillez sélectionner une image valide.";
    }
} else {
    echo "Aucune image n'a été soumise.";
}
?>
