<?php
class FormationModel {
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

    public function insertFormation($titre, $description, $objectif, $programme, $durée, $prix, $date, $image) {
        $stmt = $this->db->prepare("INSERT INTO formation (titre, description, objectif, programme, durée, prix, date, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssidds", $titre, $description, $objectif, $programme, $durée, $prix, $date, $image);
        $stmt->execute();
        $stmt->close();
    }
    public function updateFormation($formation_id, $titre, $description, $objectif, $programme, $durée, $prix, $date) {
        $stmt = $this->db->prepare("UPDATE formation SET titre=?, description=?, objectif=?, programme=?, durée=?, prix=?, date=? WHERE id=?");
        $stmt->bind_param("ssssiddi", $titre, $description, $objectif, $programme, $durée, $prix, $date, $formation_id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
