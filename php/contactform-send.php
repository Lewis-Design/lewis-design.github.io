<?php
/* Set e-mail recipient */
$myemail  = "lewisflavell_2013@hotmail.co.uk";

/* Check all form inputs using check_input function */
$yourname = check_input($_POST['yourname'], "Please enter both your name and email address again, thank you.");
$email    = check_input($_POST['email']);
$date  = check_input($_POST['date']);
$month   = check_input($_POST['month']);
$subject = "Website contact form send";

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* Let's prepare the message for the e-mail */
$message = "Hello!

You have a message from your websites contact form, please see the response below.

Name: $yourname
E-mail: $email
Birthday (day): $date
Birthday (month): $month 
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: ../thankyou.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
    <body>

    <b>Please correct the following error:</b><br />
    <?php echo $myError; ?>

    </body>
    </html>
<?php
exit();
}
?>