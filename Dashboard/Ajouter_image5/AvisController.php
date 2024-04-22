<?php
require_once 'AvisModel.php'; // Remplacer FormationModel.php par AvisModel.php

class AvisController { // Remplacer FormationController par AvisController
    private $model;

    public function __construct() {
        $this->model = new AvisModel(); // Remplacer FormationModel par AvisModel
    }

    public function insertAvis($titre, $description, $note, $image) { // Remplacer insertFormation par insertAvis
        // Valider et traiter l'image ici si nécessaire

        // Appeler la méthode du modèle pour insérer l'avis
        $this->model->insertAvis($titre, $description, $note, $image); // Remplacer insertFormation par insertAvis
    }
}
?>
