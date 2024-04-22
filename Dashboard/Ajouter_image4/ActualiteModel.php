<?php
class ActualiteModel { // Modification de UtilisateurModel à ActualiteModel
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

    public function insertActualite($titre, $contenu, $date, $image) { // Remplacer insertUtilisateur par insertActualite
        $stmt = $this->db->prepare("INSERT INTO actualité (titre, contenu, date, image) VALUES (?, ?, ?, ?)"); // Modification de la requête pour correspondre à la table actualite
        $stmt->bind_param("ssss", $titre, $contenu, $date, $image); // Modification des types de données à lier
        $stmt->execute();
        $stmt->close();
    }

    // Une fonction de mise à jour peut être ajoutée ici si nécessaire
}
?>

