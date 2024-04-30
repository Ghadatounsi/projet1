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
<?php
// Inclure le contrôleur
include("../include/connect.php");
require_once '../Controller/modifier_module.php';
$id= $_GET['id'];

// Instancier le modèle
$moduleModel = new ModuleModel();
$module = $moduleModel->getModuleById($id); // Supposons que vous ayez une méthode getFormationById() dans votre modèle


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INIR Administration - Modifier une formation</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                <?php include("../include/header.php"); ?>


                <!-- Begin Page Content -->
                <form style="padding-left:5%;padding-right:5%" method="post" action="../Controller/modifier_module.php">
                    <div class="row mb-4">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="form6Example1">Titre</label>
                                <input type="text" name="titre" id="form6Example1" class="form-control" value="<?php echo $module['titre']; ?>" />
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="form6Example2">Description </label>
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" name="discription" id="form6Example2" class="form-control" value="<?php echo $module['discription']; ?>" />
                            </div>
                        </div>
                    </div>

                  
                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
                        <label class="form-check-label" for="form6Example8"> Create an account? </label>
                    </div>

                    <!-- Submit button -->
                    <button data-mdb-ripple-init type="submit" name="modifier_module" class="btn btn-primary btn-block mb-4">Modifier</button>
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
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor
