<div class="container">
  <h2>Avis</h2>
  <form action="http://localhost/projet1/Frontend/include/submit_review.php" method="POST">
    <div class="mb-3">
      <label for="contenu" class="form-label">Contenu de l'avis</label>
      <textarea class="form-control" id="contenu" name="contenu" required></textarea>
    </div>
    <div class="mb-3">
      <label for="note" class="form-label">Note</label>
      <input type="number" class="form-control" id="note" name="note" min="1" max="5" required>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
  </form>
</div>
