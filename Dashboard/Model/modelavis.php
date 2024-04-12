<?php
// modelavis.php

class AvisModel {
    private $db;

    public function __construct() {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projet1";

        $this->db = new mysqli($servername, $username, $password, $dbname);

        if ($this->db->connect_error) {
            die("Connexion à la base de données a échoué : " . $this->db->connect_error);
        }
    }

    public function ajouterAvis($contenu, $note, $date) {
        // Préparation de la date au format YYYY-MM-DD
        $dateFormatted = date('Y-m-d', strtotime($date));
    
        $stmt = $this->db->prepare("INSERT INTO avis (contenu, note, date) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $contenu, $note, $dateFormatted);
        $stmt->execute();
        $stmt->close();
    }
}
?>
