<?php

function validateInput($data, $fieldName) {
    //$errorCount: gets added to if either validateEmail or validateInput recieves blank data
    global $errorCount;
    //$data: user input to be validated,  $fieldName: used for error message
    
    if (empty($data)) {
        echo "\"{$fieldName}\" is a required field.<br />\n";
        ++$errorCount;
        $retval = "";
    //prompts user to enter a value
    } else {        // Only clean up the input if it isn't empty
        $retval = trim($data);
        $retval = stripslashes($retval);

    //remove unwanted spaces, backslashes 
    }

    return($retval);
    //returns processed input (or blank if blank)
}

function validateEmail($data, $fieldName) {
    global $errorCount;

    if (empty($data)) {
        echo "\"{$fieldName}\" is a required field.<br />\n";
        ++$errorCount;
        $retval = "";
    } else {
//removes invalid characters for email
        $retval = filter_var($data, FILTER_SANITIZE_EMAIL);
//checks if processed input is a valid email
        if (!filter_var($retval, FILTER_VALIDATE_EMAIL)) {
            echo "\"{$fieldName}\" is not a valid e-mail address.<br />\n";
        }
    }

    return($retval);
}

function displayForm($Sender, $Email, $Subject, $Message) {
?>
// displays fields
<h2 style="text-align:center">Contact Me</h2>

<form name="Contact" action="ContactForm.php" method="post">

<p>Your Name:
<input type="text" name="Sender" value="<?php echo $Sender; ?>" /></p>

<p>Your Email:
<input type="text" name="Email" value="<?php echo $Email; ?>" /></p>

<p>Subject:
<input type="text" name="Subject" value="<?php echo $Subject; ?>" /></p>

<p>Message:<br />
<textarea name="Message"><?php echo $Message; ?></textarea></p>

<input type="reset" value="Clear Form" />&nbsp;
<input type="submit" name="Submit" value="Send Form" />

</form>

<?php
}

$ShowForm = TRUE;
$errorCount = 0;

$Sender = "";
$Email = "";
$Subject = "";
$Message = "";

if (isset($_POST['Submit'])) {
    $Sender = validateInput($_POST['Sender'], "Your Name");
    $Email = validateEmail($_POST['Email'], "Your E-mail");
    $Subject = validateInput($_POST['Subject'], "Subject");
    $Message = validateInput($_POST['Message'], "Message");

    if ($errorCount == 0)
        $ShowForm = FALSE;
} else {
    $ShowForm = TRUE;
}

if ($ShowForm == TRUE) {
    if ($errorCount > 0)
        echo "<p>Please re-enter the form information below.</p>\n";

    displayForm($Sender, $Email, $Subject, $Message);
} else {
    $SenderAddress = "$Sender <$Email>";
    $Headers = "From: $SenderAddress\nCC: $SenderAddress\n";

    $result = mail(
        "recipient@example.com",
        $Subject,
        $Message,
        $Headers
    );

    if ($result)
        echo "<p>Your message has been sent. Thank you, " .
             $Sender . ".</p>\n";
    else
        echo "<p>There was an error sending your message, " .
             $Sender . ".</p>\n";
}

?>

/*
validateEmail and validateInput are similar,
so it might be more efficient to combine them as one function.
function could check if $fieldName is email, then apply separate validation rule
*/
