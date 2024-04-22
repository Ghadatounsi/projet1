<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion une actualite </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Insertion une actualité</div>
                <div class="card-body">
                    <form action="insert.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="titre">Titre:</label>
                            <input type="text" id="titre" name="titre" class="form-control" placeholder="Titre" required>
                        </div>
                        <div class="form-group">
                            <label for="Contenue">Contenue:</label>
                            <input type="text" id="Contenue" name="Contenue" class="form-control" placeholder="Contenue" required>
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