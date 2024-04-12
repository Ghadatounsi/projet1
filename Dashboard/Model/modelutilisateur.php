<?php
// model.php

class UtilisateurModel {
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

    // Fonction pour ajouter un utilisateur à la base de données
    public function ajouterUtilisateur($nom, $prenom, $email, $motdepasse) {
    
        $stmt = $this->db->prepare("INSERT INTO utilisateur (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $motdepasse);
        $stmt->execute();
        $stmt->close();
    }
    

    // Fonction pour récupérer tous les utilisateurs de la base de données
    public function getAllUtilisateurs() {
        $result = $this->db->query("SELECT * FROM utilisateur");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fonction pour récupérer un utilisateur par son identifiant
    public function getUtilisateurById($id) {
        $stmt = $this->db->prepare("SELECT * FROM utilisateur WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateUtilisateur($id, $nom, $prenom, $email, $mot_de_passe, $inscription) {
        $inscriptionFormatted = date('Y-m-d', strtotime($inscription));
        $stmt = $this->db->prepare("UPDATE utilisateur SET nom=?, prenom=?, email=?, mot_de_passe=?, inscription=? WHERE id=?");
        $stmt->bind_param("sssssi", $nom, $prenom, $email, $mot_de_passe, $inscriptionFormatted, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Fonction pour supprimer un utilisateur de la base de données
    public function supprimerUtilisateur($utilisateurId) {
        $stmt = $this->db->prepare("DELETE FROM utilisateur WHERE id = ?");
        $stmt->bind_param("i", $utilisateurId);
        $stmt->execute();
        $stmt->close();
    }
}
?>
