<?php
require_once 'AdminModel.php';

class AdminController {
    private $model;

    public function __construct() {
        $this->model = new AdminModel();
    }

    public function insertAdmin($image, $id) {
        // Appeler la méthode du modèle pour insérer l'administrateur avec son image
        $this->model->insertAdmin($image, $id);
    }
}
?>
