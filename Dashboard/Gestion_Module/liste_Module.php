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

    <title>INIR - Liste des modules</title>

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
                    <h1 class="h3 mb-2 text-gray-800">Liste des modules</h1>
                    <p class="mb-4">
                        <a target="_blank" href="https://datatables.net"></a>.</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Actions</th> <!-- Nouvelle colonne pour les actions -->
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            <?php
                            // Connexion à la base de données
                            include("../include/connect.php");

                            // Requête SQL pour sélectionner toutes les lignes de la table 'module'
                            $sql = "SELECT * FROM module";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["titre"] . "</td>";
                                    echo "<td>" . $row["discription"] . "</td>";
                                    echo "<td>";
                                    echo "<a href='modifier_module.php?admin_id=" . $_SESSION['user_id'] . "&id=" . $row['id'] . "'>Modifier</a>";
                                    
                                    echo "<form action='../Controller/supprimer_module.php' method='post'>";
                                    echo "<input type='hidden' name='supprimer_module' value='1'>";
                                    echo "<input type='hidden' name='module_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-danger'><i class='fas fa-trash'></i> Supprimer</button>";
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

