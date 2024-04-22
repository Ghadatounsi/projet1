<?php
class FormateurModel {
    private $db;

    public function __construct() {
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

    public function insertFormateur($nom, $prenom, $specialisation, $biographe, $image){
        $stmt = $this->db->prepare("INSERT INTO formateur (nom, prenom, specialisation, biographe, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nom, $prenom, $specialisation, $biographe, $image);
        $stmt->execute();
        $stmt->close();
    }

    public function updateFormateur($formateur_id, $nom, $prenom, $specialisation, $biographe) {
        $stmt = $this->db->prepare("UPDATE formateur SET nom=?, prenom=?, specialisation=?, biographe=? WHERE id=?");
        $stmt->bind_param("ssssi", $nom, $prenom, $specialisation, $biographe, $formateur_id);
        $stmt->execute();
        $stmt->close();
    }
}
?>

