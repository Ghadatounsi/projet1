<?php
require_once 'FormationModel.php';

class FormationController {
    private $model;

    public function __construct() {
        $this->model = new FormationModel();
    }

    public function insertFormation($titre, $description, $objectif, $programme, $durée, $prix, $date, $image) {
        // Valider et traiter l'image ici si nécessaire

        // Appeler la méthode du modèle pour insérer la formation
        $this->model->insertFormation($titre, $description, $objectif, $programme, $durée, $prix, $date, $image);
    }
}
?>
