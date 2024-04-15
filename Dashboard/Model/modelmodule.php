<?php
// model.php

class ModuleModel {
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

    // Fonction pour ajouter un module à la base de données
    public function ajouterModule($titre, $discription) {
        $stmt = $this->db->prepare("INSERT INTO module (titre, discription) VALUES (?, ?)");
        $stmt->bind_param("ss", $titre, $description);
        $stmt->execute();
        $stmt->close();
    }

    // Fonction pour récupérer tous les modules de la base de données
    public function getAllModules() {
        $result = $this->db->query("SELECT * FROM module");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fonction pour récupérer un module par son identifiant
    public function getModuleById($id) {
        $stmt = $this->db->prepare("SELECT * FROM module WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fonction pour mettre à jour les détails d'un module dans la base de données
    public function updateModule($id, $titre, $discription) {
        $stmt = $this->db->prepare("UPDATE module SET titre=?, discription=? WHERE id=?");
        $stmt->bind_param("ssi", $titre, $discription, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Fonction pour supprimer un module de la base de données
    public function supprimerModule($moduleId) {
        $stmt = $this->db->prepare("DELETE FROM module WHERE id = ?");
        $stmt->bind_param("i", $moduleId);
        $stmt->execute();
        $stmt->close();
    }
}
?>
