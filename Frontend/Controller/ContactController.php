<?php
require_once '../Model/ContactModel.php';

class ContactController {
    private $model;

    public function __construct() {
        $this->model = new ContactModel(/* injecter la connexion à la base de données ici */);
    }

    public function handleFormSubmission() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $this->model->insertContact($first_name, $last_name, $email, $message);
            // Rediriger vers une page de confirmation
            header("Location: http://localhost/projet1/Frontend/contact.php?id=" . $user['id']);

            exit();
        }
    }
}

// Utilisation du contrôleur
$controller = new ContactController();
$controller->handleFormSubmission();
?>
