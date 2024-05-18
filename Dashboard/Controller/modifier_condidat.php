<?php
// Include the condidat model
require_once '../Model/modelcondidat.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_condidat'])) {
    // Retrieve form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create an instance of the condidatModel class
    $condidatModel = new condidatModel();

    // Call the method to update the condidat details in the database
    $condidatModel->updatecondidat($id,$username, $email, $password);

    // Redirect to a confirmation page or another page after the update
    header("Location: ../Gestion_condidat/liste_condidat.php");
    exit();
}
?>
