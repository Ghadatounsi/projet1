<?php
class UtilisateurModel { // Changement de FormationModel à UtilisateurModel
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

    public function insertUtilisateur($nom, $prenom, $email, $motdepasse, $image) { // Remplacer insertFormation par insertUtilisateur
        $stmt = $this->db->prepare("INSERT INTO utilisateur (nom, prenom, email, motdepasse, image) VALUES (?, ?, ?, ?, ?)"); // Remplacer "formation" par "utilisateur"
        $stmt->bind_param("sssss", $nom, $prenom, $email, $motdepasse, $image); // Remplacer "formation" par "utilisateur"
        $stmt->execute();
        $stmt->close();
    }

    // La fonction de mise à jour peut être ajoutée ici si nécessaire
}
?>
