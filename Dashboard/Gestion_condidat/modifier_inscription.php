<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: http://localhost/projet1/Frontend/index.php");
    exit(); // Terminer le script
}

// Inclure le fichier de connexion à la base de données
include("../include/connect.php");

// Initialiser les variables
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$statut = "";

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $statut = $_POST['statut'];
    
    // Requête SQL pour mettre à jour le statut
    $sql = "UPDATE inscription SET statut = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $statut, $id);
    
    if ($stmt->execute()) {
        echo "<p>Le statut a été mis à jour avec succès.</p>";
    } else {
        echo "<p>Erreur lors de la mise à jour du statut.</p>";
    }
}

// Récupérer les informations du candidat
$sql = "SELECT * FROM inscription WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $statut = $row['statut'];
} else {
    echo "<p>Aucun candidat trouvé avec cet ID.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>INIR - Modifier Statut</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../include/navbar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("../include/header.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Modifier le statut de l'inscription</h1>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="statut">Statut</label>
                            <select id="statut" name="statut" class="form-control">
                                <option value="en_attente" <?= ($statut == 'en_attente') ? 'selected' : '' ?>>En attente</option>
                                <option value="approuve" <?= ($statut == 'approuve') ? 'selected' : '' ?>>Approuvé</option>
                                <option value="rejete" <?= ($statut == 'rejete') ? 'selected' : '' ?>>Rejeté</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="liste_candidats.php" class="btn btn-secondary">Annuler</a>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
