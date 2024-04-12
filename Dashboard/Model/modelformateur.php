<?php
// modelformateur.php

class FormateurModel {
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

    // Fonction pour ajouter un formateur à la base de données
    public function ajouterFormateur($nom, $prenom, $specialisation, $biographe) {
        $stmt = $this->db->prepare("INSERT INTO formateur (nom, prenom, specialisation, biographe) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $specialisation, $biographe);
        $stmt->execute();
        $stmt->close();
    }

    // Fonction pour récupérer tous les formateurs de la base de données
    public function getAllFormateurs() {
        $result = $this->db->query("SELECT * FROM formateur");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fonction pour récupérer un formateur par son identifiant
    public function getFormateurById($id) {
        $stmt = $this->db->prepare("SELECT * FROM formateur WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fonction pour mettre à jour un formateur dans la base de données
    public function updateFormateur($id, $nom, $prenom, $specialisation, $biographe) {
        $stmt = $this->db->prepare("UPDATE formateur SET nom=?, prenom=?, specialisation=?, biographe=? WHERE id=?");
        $stmt->bind_param("ssssi", $nom, $prenom, $specialisation, $biographe, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Fonction pour supprimer un formateur de la base de données
    public function supprimerFormateur($formateurId) {
        $stmt = $this->db->prepare("DELETE FROM formateur WHERE id = ?");
        $stmt->bind_param("i", $formateurId);
        $stmt->execute();
        $stmt->close();
    }
}
?>


