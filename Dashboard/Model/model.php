<?php
// model.php

class FormationModel {
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

    // Fonction pour ajouter une formation à la base de données
    public function ajouterFormation($titre, $description, $objectif, $programme, $duree, $prix, $date) {
        // Formater la date au format YYYY-MM-DD
        $dateFormatted = date('Y-m-d', strtotime($date));
    
        $stmt = $this->db->prepare("INSERT INTO formation (titre, description, objectif, programme, durée, prix, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssids", $titre, $description, $objectif, $programme, $duree, $prix, $dateFormatted);
        $stmt->execute();
        $stmt->close();
    }
    

    // Fonction pour récupérer toutes les formations de la base de données
    public function getAllFormations() {
        $result = $this->db->query("SELECT * FROM formation");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fonction pour récupérer une formation par son identifiant
    public function getFormationById($id) {
        $stmt = $this->db->prepare("SELECT * FROM formation WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateFormation($id, $titre, $description, $objectif, $programme, $duree, $prix, $date) {
        $dateFormatted = date('Y-m-d', strtotime($date));
        $stmt = $this->db->prepare("UPDATE formation SET titre=?, description=?, objectif=?, programme=?, durée=?, prix=?, date=? WHERE id=?");
        $stmt->bind_param("ssssiddi", $titre, $description, $objectif, $programme, $duree, $prix, $dateFormatted, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Fonction pour supprimer une formation de la base de données
    public function supprimerFormation($formationId) {
        $stmt = $this->db->prepare("DELETE FROM formation WHERE id = ?");
        $stmt->bind_param("i", $formationId);
        $stmt->execute();
        $stmt->close();
    }
}
?>