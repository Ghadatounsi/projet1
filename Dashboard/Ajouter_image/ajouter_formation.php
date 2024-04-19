<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion de Formation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Insertion de Formation</div>
                <div class="card-body">
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="titre">Titre:</label>
                            <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" id="description" name="description" class="form-control" placeholder="Description" required>
                        </div>
                        <div class="form-group">
                            <label for="objectif">Objectif:</label>
                            <input type="text" id="objectif" name="objectif" class="form-control" placeholder="Objectif" required>
                        </div>
                        <div class="form-group">
                            <label for="programme">Programme:</label>
                            <input type="text" id="programme" name="programme" class="form-control" placeholder="Programme" required>
                        </div>
                        <div class="form-group">
                            <label for="durée">Durée (en heures):</label>
                            <input type="number" id="durée" name="durée" class="form-control" placeholder="Durée" required>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix (en €):</label>
                            <input type="number" id="prix" name="prix" class="form-control" placeholder="Prix" required>
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" class="form-control" placeholder="Date" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" id="image" name="image" class="form-control-file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
