

<form action="" method="GET">
  <label for="color">Favorite Color:</label>
  <input type="text" id="color" name="color" required><br>
  <label for="movie">Favorite Movie:</label>
  <input type="text" id="movie" name="movie" required><br>
  <input type="submit" value="Submit Survey">
</form>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
  echo "<h3>Survey Results</h3>";
  echo "<p>Favorite Color: " . htmlspecialchars($_GET['color']) . "</p>";
  echo "<p>Favorite Movie: " . htmlspecialchars($_GET['movie']) . "</p>";

}
?>
