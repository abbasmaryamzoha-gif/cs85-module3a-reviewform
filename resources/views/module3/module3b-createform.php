GITHUB URL: https://github.com/abbasmaryamzoha-gif/cs85-module3a-reviewform/blob/main/resources/views/module3/module3b-createform.php


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
//using functions for email and message, since they have restrictions for what can go in them


// email validation from module 3a:
function validateEmail($data) {
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL);
        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
        return "<strong>Not a valid e-mail address.</strong><br />\n";
    
    }
    return($retval);
}

//check for word count in message:
function validateMessage($data) {
    $count = str_word_count($data);
    if ($count<50 or $count>150) {
        $retval = "";
        return "<strong> Message must be between 4 and 150 words.</strong><br />\n";
        
    } else {        
        $retval = trim($data);
        $retval = stripslashes($retval);
    }

    return($retval);
}


//page output:
if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {

  echo "<h3>your message:</h3>";

  echo "<p>Full Name: " . htmlspecialchars($_GET['name']) . "</p>";

  echo "<p>Email Address: " . validateEmail(htmlspecialchars($_GET['email'])) . "</p>";
  
  echo "<p>Topic of Message: " . htmlspecialchars($_GET['topic']) . "</p>";

  echo "<p>Message:" . validateMessage(htmlspecialchars($_GET['message'])) . "</p>";

  
}

// when testing, thought it was interesting that you can have multiple of the same field on the same page, and it will accept the last one entered 
?>
