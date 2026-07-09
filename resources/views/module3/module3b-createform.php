
<form action="" method="GET">
  <label for="name">Full Name:</label>
  <input type="text" id="name" name="name" required><br>
  
  <label for="email">Email Address:</label>
  <input type="text" id="email" name="email" required><br>

  <label for="topic">Topic of Message (something meaningful to you):</label>
  <input type="text" id="topic" name="topic" required><br>

  <label for="message">Message (textarea, 50–150 words required):</label>
  <input type="text" id="message" name="message" required><br>
  
  <input type="submit" value="Submit">
</form>
  





<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
  echo "<h3>your message:</h3>";
  echo "<p>Full Name: " . htmlspecialchars($_GET['name']) . "</p>";
  echo "<p>Email Address: " . htmlspecialchars($_GET['email']) . "</p>";
  echo "<p>Topic of Message: " . htmlspecialchars($_GET['topic']) . "</p>";
  echo "<p>Message:" . htmlspecialchars($_GET['message']) . "</p>";
}
?>
