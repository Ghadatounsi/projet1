<div class="container">
  <h2>Avis des utilisateurs</h2>
  <?php
  // Connexion à la base de données et récupération des avis
  $conn = mysqli_connect("localhost", "root", "", "projet1");
  if ($conn) {
    $query = "SELECT * FROM avis ORDER BY date DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
  ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="carousel-item">
            <div class="card">
              <div class="card-body text-center">
                <h5 class="card-title">Note: <?php echo $row['note']; ?></h5>
                <p class="card-text"><?php echo $row['contenu']; ?></p>
                <p class="card-text"><small class="text-muted">Publié le <?php echo $row['date']; ?></small></p>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  <?php
    } else {
      echo "<p>Aucun avis disponible pour le moment.</p>";
    }
    mysqli_close($conn);
  } else {
    echo "<p>Erreur de connexion à la base de données.</p>";
  }
  ?>
</div>
