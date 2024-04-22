<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Insertion d'Avis</div>
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
                            <label for="note">Note:</label>
                            <input type="number" id="note" name="note" class="form-control" placeholder="Note" min="1" max="5" required>
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
