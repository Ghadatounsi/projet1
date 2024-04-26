<?php
class UserModel {
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

    // Fonction pour vérifier les informations de connexion de l'utilisateur
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM candidat WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Vérifier si l'utilisateur existe
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false; // Mot de passe incorrect
            }
        } else {
            return false; // Utilisateur non trouvé
        }
    }
}
?>
