<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupérer l'ID de l'utilisateur depuis la session
    $userId = $_SESSION['user_id'];
} else {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header("Location: http://localhost/projet1/Frontend/index.php");
    exit(); // Terminer le script
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INIR Admininstation - Dashboard</title>

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

        <?php include("../include/navbar.php") ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("../include/header.php") ; ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
<form style="padding-left:5%;padding-right:5%" method="post" action="../Ajouter_image3/insert.php" enctype="multipart/form-data">
    <div class="row mb-4">
        <div class="col">
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" />
            </div>
        </div>
        <div class="col">
            <label class="form-label" for="prenom">Prénom</label>
            <div data-mdb-input-init class="form-outline">
                <input type="text" name="prenom" id="prenom" class="form-control" />
            </div>
        </div>
    </div>

    <!-- Text input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" />
    </div>

    <!-- Message input -->
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="motdepasse">Mot de passe</label>
        <input type="password" name="motdepasse" id="motdepasse" class="form-control" />
    </div>


    <label class="form-label" for="form6Example5"></label>
     <div data-mdb-input-init class="form-outline mb-4">
        <input type="file" name="image" class="form-control" id="form6Example5" style="margin-left:1%"/>
    </div>

   

    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="create_account" checked />
        <label class="form-check-label" for="create_account"> Create an account? </label>
    </div>

    <!-- Submit button -->
    <button data-mdb-ripple-init type="submit" name="ajouter_utilisateur_submit" class="btn btn-primary btn-block mb-4">Place order</button>
</form>

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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
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

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>
