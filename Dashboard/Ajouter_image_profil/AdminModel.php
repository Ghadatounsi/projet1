<?php
class AdminModel { // Remplacer FormationModel par AvisModel
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

    public function insertAdmin($image, $id) {
        $stmt = $this->db->prepare("INSERT INTO admins (image, id) VALUES (?, ?)");
        $stmt->bind_param("si", $image, $id); // 'i' pour integer, 's' pour string
        $stmt->execute();
        $stmt->close();
    }
    
    // Ajouter d'autres méthodes de modèle pour la gestion des avis au besoin
}
?>
