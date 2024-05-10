<?php
class Modelagent {
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
            throw new Exception("Connexion à la base de données a échoué : " . $this->db->connect_error);
        }
    }

    
    // Fonction pour ajouter un agent à la base de données
    public function ajouterAgent($nom, $prenom, $username, $email, $password, $cin) {
        // Vous devriez utiliser des techniques de hachage sécurisé pour stocker les mots de passe
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO agent (nom, prenom, username, email, password, cin) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom, $prenom, $username, $email, $passwordHash, $cin); // Utilisation du mot de passe haché
        $stmt->execute();
        $stmt->close();
    }

    // Fonction pour modifier un agent dans la base de données
    public function updateAgent($id, $nom, $prenom, $username, $email, $password, $cin) {
        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Préparer et exécuter la requête
        $stmt = $this->db->prepare("UPDATE agent SET nom=?, prenom=?, username=?, email=?, password=?, cin=? WHERE id=?");
        $stmt->bind_param("ssssssi", $nom, $prenom, $username, $email, $hashedPassword, $cin, $id);
        $stmt->execute();
        $stmt->close();
    }
    
    // Fonction pour récupérer un agent par son identifiant
    public function getAgentById($id) {
        $stmt = $this->db->prepare("SELECT * FROM agent WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Fonction pour supprimer un agent de la base de données
    public function supprimerAgent($id) {
        $stmt = $this->db->prepare("DELETE FROM agent WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    // Autres fonctions CRUD...
}
?>
