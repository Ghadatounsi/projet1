<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: http://localhost/projet1/Frontend/index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../include/connect.php");

    // Récupérer les données du formulaire de modification de l'agent
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cin = $_POST['cin'];

    // Préparer la requête SQL pour mettre à jour les données de l'agent
    $sql = "UPDATE agent SET nom=?, prenom=?, username=?, email=?, password=?, cin=? WHERE id=?";

    // Préparer la déclaration
    $stmt = $conn->prepare($sql);
    
    // Liage des paramètres
    $stmt->bind_param("ssssssi", $nom, $prenom, $username, $email, $password, $cin, $id);
    
    // Exécution de la requête de mise à jour
    if ($stmt->execute()) {
        header("Location: liste_agent.php");
        exit();
    } else {
        echo "Erreur : " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    include("../include/connect.php");
    $id = $_GET['id'];

    // Préparer la requête SQL pour récupérer les données de l'agent à modifier
    $sql = "SELECT * FROM agent WHERE id=?";

    // Préparer la déclaration
    $stmt = $conn->prepare($sql);

    // Liage des paramètres
    $stmt->bind_param("i", $id);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $result = $stmt->get_result();

    // Récupération de la ligne associée à l'agent
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un agent</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">
        <?php include("../include/navbar.php") ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("../include/header.php"); ?>

                <form style="padding-left:5%;padding-right:5%" method="POST">
                    <div class="row mb-4">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo htmlspecialchars($row['nom']); ?>" required>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="prenom">Prénom :</label>
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" id="prenom" name="prenom" class="form-control" value="<?php echo htmlspecialchars($row['prenom']); ?>" required>
                            </div>
                        </div>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label class="form-label" for="email">Email :</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label class="form-label" for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" class="form-control" value="<?php echo htmlspecialchars($row['password']); ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <label class="form-label" for="cin">CIN :</label>
                            <input type="text" id="cin" name="cin" class="form-control" value="<?php echo htmlspecialchars($row['cin']); ?>" required>
                        </div>
                    </div>

                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Modifier</button>
                </form>

                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
            </div>
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
