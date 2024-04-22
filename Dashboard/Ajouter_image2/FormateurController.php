<?php
require_once 'FormateurModel.php';

class FormateurController {
    private $modelformateur;

    public function __construct() {
        $this->modelformateur = new FormateurModel();
    }

    public function insertFormateur($nom, $prenom, $specialisation, $biographe, $image) {
        // Appeler la méthode du modèle pour insérer le formateur avec l'image
        $this->modelformateur->insertFormateur($nom, $prenom, $specialisation, $biographe, $image);
    }

  
}
?>

