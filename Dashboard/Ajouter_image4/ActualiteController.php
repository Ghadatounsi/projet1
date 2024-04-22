<?php
require_once 'ActualiteModel.php'; // Remplacer FormationModel.php par ActualiteModel.php

class ActualiteController { // Remplacer FormationController par ActualiteController
    private $model;

    public function __construct() {
        $this->model = new ActualiteModel(); // Remplacer FormationModel par ActualiteModel
    }

    public function insertActualite($titre, $contenu, $date, $image) { // Remplacer insertFormation par insertActualite
        // Valider et traiter l'image ici si nécessaire

        // Appeler la méthode du modèle pour insérer l'actualité
        $this->model->insertActualite($titre, $contenu, $date, $image); // Remplacer insertFormation par insertActualite
    }
}
?>
