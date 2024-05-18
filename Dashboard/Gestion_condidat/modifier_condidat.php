<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header("Location: http://localhost/projet1/Frontend/index.php");
    exit();
}

// Include necessary files
include("../include/connect.php");
require_once '../Controller/modifier_condidat.php';
require_once '../Model/model.php';

// Get the condidat ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $username = $_GET['username'];
    $email = $_GET['email'];
    $password = $_GET['password'];
} else {
    echo "Condidat ID is missing.";
    exit();
}

// Instantiate the model
$condidatModel = new condidatModel();
$condidat = $condidatModel->getcondidatById($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INIR Administration - Modifier un condidat</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <div id="wrapper">
        <?php include("../include/navbar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("../include/header.php"); ?>
                <form style="padding: 5%;" method="post" action="../Controller/modifier_condidat.php">
                    <div class="row mb-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="username">Nom d'utilsateur</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo $condidat['username']; ?>" />
                            </div>
                        </div>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $condidat['email']; ?>" />
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="password">Mot De Passe</label>
                        <textarea class="form-control" name="password" id="password" rows="4"><?php echo $condidat['password']; ?></textarea>
                    </div>
                    <button data-mdb-ripple-init type="submit" name="modifier_condidat" class="btn btn-primary btn-block mb-4">Modifier</button>
                </form>
                <div class="container-fluid">
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
