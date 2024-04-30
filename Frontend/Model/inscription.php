<?php
class Inscription_model {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create_inscription($id_candidat, $id_formation, $titre_formation, $duree_formation, $username_candidat, $email_candidat) {
        $sql = "INSERT INTO inscription (id_candidat, id_formation, titre_formation, duree_formation, username_candidat, email_candidat) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iisiss", $id_candidat, $id_formation, $titre_formation, $duree_formation, $username_candidat, $email_candidat);
        
        return $stmt->execute();
    }
}
?>
