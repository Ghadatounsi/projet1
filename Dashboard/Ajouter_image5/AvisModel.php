<?php
class AvisModel { // Remplacer FormationModel par AvisModel
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

    public function insertAvis($titre, $description, $note, $image) { // Remplacer insertFormation par insertAvis
        $stmt = $this->db->prepare("INSERT INTO avis (titre, description, note, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $titre, $description, $note, $image); // Remplacer "idds" par "ssds" pour correspondre à la nouvelle signature
        $stmt->execute();
        $stmt->close();
    }

    // Ajouter d'autres méthodes de modèle pour la gestion des avis au besoin
}
?>
