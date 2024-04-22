<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INIR - Liste </title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">
        <?php include("../include/navbar.php") ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("../include/header.php") ; ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">liste des actualités</h1>
                    <p class="mb-4"> <a target="_blank"
                            href="https://datatables.net"></a>.</p>

                    <?php
                    include("../include/connect.php") ;
                    $sql = "SELECT * FROM actualité";
                    $result = $conn->query($sql);
                    ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">id</th>
                                <th scope="col">titre</th>
                                <th scope="col">contenu</th>
                                <th scope="col">date</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider table-divider-color">
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th scope='row'>" . $row["id"] . "</th>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["titre"] . "</td>";
                                    echo "<td>" . $row["contenu"] . "</td>";
                                    echo "<td>" . $row["date"] . "</td>";
                                    echo "<td><img src='../upload/".$row["image"]."' style='max-width: 100px;'></td>";

                                    echo "<td>";
                                    echo "<form action='modifier_Actualite.php?id=" . $row['id'] . "' method='post'>";
                                    echo "<input type='hidden' name='actualite_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i> Modifier</button>";
                                    echo "</form>";
                echo "<form action='../Controller/supprimer_Actualite.php' method='post'>";
                echo "<input type='hidden' name='supprimer_actualite' value='1'>";
                echo "<input type='hidden' name='actualite_id' value='" . $row['id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i>
                </button>";
                echo "</form>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='9'>Aucun résultat trouvé</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
