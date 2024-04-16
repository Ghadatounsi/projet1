<?php
class AdminModel {
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

    // Fonction pour ajouter un administrateur à la base de données
    public function ajouterAdmin($username, $email, $password) {
        // Vous devriez utiliser des techniques de hachage sécurisé pour stocker les mots de passe
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $passwordHash);
        $stmt->execute();
        $stmt->close();
    }

    // Fonction pour récupérer tous les administrateurs de la base de données
    public function getAllAdmins() {
        $result = $this->db->query("SELECT * FROM admins");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Fonction pour récupérer un administrateur par son identifiant
    public function getAdminById($id) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fonction pour supprimer un administrateur de la base de données
    public function supprimerAdmin($adminId) {
        $stmt = $this->db->prepare("DELETE FROM admins WHERE id = ?");
        $stmt->bind_param("i", $adminId);
        $stmt->execute();
        $stmt->close();
    }
}
?>
