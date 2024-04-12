<?php
// model.php

class ActualiteModel {
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

    public function ajouterActualite($titre, $contenu, $date) {
        $dateFormatted = date('Y-m-d', strtotime($date));

        $stmt = $this->db->prepare("INSERT INTO actualité (titre, contenu, date) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $titre, $contenu, $dateFormatted);
        $stmt->execute();
        $stmt->close();
    }
   // Fonction pour récupérer toutes les actualités de la base de données
public function getAllActualites() {
    $result = $this->db->query("SELECT * FROM actualite");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fonction pour récupérer une actualité par son identifiant
public function getActualiteById($id) {
    $stmt = $this->db->prepare("SELECT * FROM actualité WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Fonction pour mettre à jour une actualité dans la base de données
public function updateActualite($id, $titre, $contenu, $date) {
    $dateFormatted = date('Y-m-d', strtotime($date));
    $stmt = $this->db->prepare("UPDATE actualité SET titre=?, contenu=?, date=? WHERE id=?");
    $stmt->bind_param("sssi", $titre, $contenu, $dateFormatted, $id);
    $stmt->execute();
    $stmt->close();
}

// Fonction pour supprimer une actualité de la base de données
public function supprimerActualité($actId) {
    $stmt = $this->db->prepare("DELETE FROM Actualité WHERE id = ?");
    $stmt->bind_param("i", $actId);
    $stmt->execute();
    $stmt->close();
}

}


?>
