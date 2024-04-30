<?php
class Inscription_model {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create_inscription($id_candidat, $username_candidat, $email_candidat, $id_formation, $titre_formation, $duree_formation, $prix_formation, $statut) {
        $sql = "INSERT INTO inscription (id_candidat, username_candidat, email_candidat, id_formation, titre_formation, duree_formation,prix_formation,statut) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issisiss", $id_candidat, $username_candidat, $email_candidat, $id_formation, $titre_formation, $duree_formation, $prix_formation, $statut);
        
        return $stmt->execute();
    }
}
?>
