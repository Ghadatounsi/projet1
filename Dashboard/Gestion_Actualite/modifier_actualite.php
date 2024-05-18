<?php
// Démarrer la session si ce n'est pas déjà fait
session_start();

// Vérifier si l'utilisateur est connecté et si oui, récupérer son ID de session
if (!isset($_SESSION['user_id'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: http://localhost/projet1/Frontend/index.php");
    exit(); // Terminer le script
}

// Inclure les fichiers nécessaires
include("../include/connect.php");
require_once '../Controller/modifier_actualite.php';
require_once '../Model/modelact.php';

// Récupérer l'identifiant de l'actualité à modifier depuis l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "ID de l'actualité manquant.";
    exit();
}

// Instancier le modèle pour obtenir les détails de l'actualité
$actualiteModel = new ActualiteModel();
$actualite = $actualiteModel->getActualiteById($id);

// Vérifier si l'actualité existe
if ($actualite) {
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_actualite'])) {
        // Récupérer les données du formulaire
        $titre = $_POST["titre"];
        $contenu = $_POST["contenu"];
        $date = date('Y-m-d', strtotime($_POST["date"])); // Conversion de la date

        // Mettre à jour l'actualité dans la base de données
        $actualiteModel->updateActualite($id, $titre, $contenu, $date);

        // Rediriger vers la liste des actualités après la mise à jour
        header("Location: ../Gestion_Actualite/liste_actualite.php?admin_id=" . $_SESSION['user_id'] . "&id=" . $row['id']);
        exit();
    }
} else {
    // Gérer le cas où l'actualité n'existe pas
    echo "L'actualité que vous essayez de modifier n'existe pas.";
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

    <title>INIR Administration - Modifier une actualité</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include("../include/navbar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php include("../include/header.php"); ?>

                <!-- Begin Page Content -->
                <form style="padding-left:5%;padding-right:5%" method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example1">Titre</label>
                                <input type="text" name="titre" id="form6Example1" class="form-control" value="<?php echo htmlspecialchars($actualite['titre']); ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form6Example3">Contenu</label>
                        <input type="text" name="contenu" id="form6Example3" class="form-control" value="<?php echo htmlspecialchars($actualite['contenu']); ?>" />
                    </div>

                    <label class="form-label" for="form6Example4">Date </label>
                    <div class="form-outline mb-4">
                        <input type="date" name="date" id="form6Example4" class="form-control" value="<?php echo htmlspecialchars($actualite['date']); ?>" />
                    </div>

                    <button type="submit" name="modifier_actualite" class="btn btn-primary btn-block mb-4">Modifier</button>
                </form>

                <div class="container-fluid">
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>
    </div>
</body>
</html>
