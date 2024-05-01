<?php
class ContactModel  {
    private $db;

    
    public function __construct() {
        // Modifier ces informations avec les paramètres de votre propre base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet1";

        // Établir la connexion
        $this->db = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($this->db->connect_error) {
            die("Connexion à la base de données a échoué : " . $this->db->connect_error);
        }
    }

    public function insertContact($first_name, $last_name, $email, $message) {
        $sql = "INSERT INTO contacts (first_name, last_name, email, message) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $message);
        return $stmt->execute();
    }
}
?>
