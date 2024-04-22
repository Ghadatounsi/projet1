<?php
require_once 'UtilisateurModel.php'; // Remplacer ActualiteModel.php par UtilisateurModel.php

class UtilisateurController { // Remplacer ActualiteController par UtilisateurController
    private $model;

    public function __construct() {
        $this->model = new UtilisateurModel(); // Remplacer ActualiteModel par UtilisateurModel
    }

    public function insertUtilisateur($nom, $prenom, $email, $motdepasse, $image) { // Remplacer insertActualite par insertUtilisateur
        // Valider et traiter les données ici si nécessaire

        // Appeler la méthode du modèle pour insérer l'utilisateur
        $this->model->insertUtilisateur($nom, $prenom, $email, $motdepasse, $image); // Remplacer insertActualite par insertUtilisateur
    }
}
?>

