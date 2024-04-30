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

    <title>INIR - Liste des Inscriptions </title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../include/navbar.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("../include/header.php") ; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Liste des candidats</h1>
                    <p class="mb-4">Voici la liste des candidats inscrits :</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">id_candidat </th>
                                <th scope="col">id_formation </th>
                                <th scope="col">titre_formation</th> 
                                <th scope="col">duree_formation</th>
                                <th scope="col">username_candidat</th>
                                <th scope="col">email_candidat</th> 
                                <th scope="col">Actions</th> 
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            <?php
                            // Connexion à la base de données
                            include("../include/connect.php");

                            // Requête SQL pour sélectionner toutes les lignes de la table 'candidat'
                            $sql = "SELECT * FROM inscription";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Afficher les données de chaque candidat
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["id_candidat"] . "</td>";
                                    echo "<td>" . $row["id_formation"] . "</td>";
                                    echo "<td>" . $row["titre_formation"] . "</td>";
                                    echo "<td>" . $row["duree_formation"] . "</td>";
                                    echo "<td>" . $row["username_candidat"] . "</td>";
                                    echo "<td>" . $row["email_candidat"] . "</td>";
                                    echo "<td>";
                                    echo "<form action='modifier_candidat.php?id=" . $row['id'] . "' method='post'>";
                                    echo "<input type='hidden' name='candidat_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i> Modifier</button>";
                                    echo "</form>";
                                    echo "<form action='../Controller/supprimer_candidat.php' method='post'>";
                                    echo "<input type='hidden' name='supprimer_candidat' value='1'>";
                                    echo "<input type='hidden' name='candidat_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i> Supprimer</button>";
                                    echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>Aucun résultat trouvé</td></tr>";
                            }
                            // Fermer la connexion à la base de données
                            $conn->close();
                            ?>
                        </tbody>
                    </table>

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
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
