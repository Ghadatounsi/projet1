<?php
// Inclure le modèle de module
require_once '../Model/modelmodule.php';

// Vérifier si le formulaire de modification de module a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_module'])) {
    // Récupérer les données du formulaire
    $id = $_POST['id']; // Utilisation de l'identifiant récupéré depuis le formulaire
    $titre = $_POST['titre'];
    $discription = $_POST['discription']; // Assurez-vous que le nom du champ correspond à celui dans le formulaire HTML

    // Créer une instance de la classe ModuleModel
    $moduleModel = new ModuleModel();

    // Appeler la méthode updateModule pour mettre à jour les détails du module dans la base de données
    $moduleModel->updateModule($id, $titre, $discription); // Assurez-vous que les noms des variables correspondent à ceux dans le modèle

    // Rediriger vers une page de confirmation ou autre après la mise à jour
    header("Location:../Gestion_Module/liste_module.php");
    exit();
}
?>
