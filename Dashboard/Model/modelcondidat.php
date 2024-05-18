<?php
// model.php

class condidatModel {
    private $db;

    public function __construct() {
        // Database parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet1";

        // Establish connection
        $this->db = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    // Method to add a condidat to the database
    public function ajoutercondidat($nom, $prenom, $email, $motdepasse) {
        $stmt = $this->db->prepare("INSERT INTO condidat (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $motdepasse);
        $stmt->execute();
        $stmt->close();
    }

    // Method to get all condidats
    public function getAllcondidats() {
        $result = $this->db->query("SELECT * FROM condidat");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Method to get a condidat by ID
    public function getcondidatById($id) {
        $stmt = $this->db->prepare("SELECT * FROM candidat WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    

    // Method to update a condidat
    public function updatecondidat($id, $username, $email, $password) {
        $stmt = $this->db->prepare("UPDATE candidat SET username=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("sssi",$username, $email, $password, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Method to delete a condidat
    public function supprimercondidat($condidatId) {
        $stmt = $this->db->prepare("DELETE FROM condidat WHERE id = ?");
        $stmt->bind_param("i", $condidatId);
        $stmt->execute();
        $stmt->close();
    }
}
?>
