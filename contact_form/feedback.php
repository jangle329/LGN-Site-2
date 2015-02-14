<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/

include 'config.php';

error_reporting (E_ALL ^ E_NOTICE);

$post = (!empty($_POST)) ? true : false;

if($post)
{
include 'functions.php';

$name = stripslashes($_POST['name']);
$message = stripslashes($_POST['message']);

$error = '';

// Check name

if(!$name)
{
$error .= 'Please enter a valid name<br />';
}

// Check message (length)

if(!$message || strlen($message) < 15)
{
$error .= "Your message must be at least 15 charecters long.<br />";
}


if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, 'Feedback', $message,
     "From: ".$email."\r\n"
    ."Reply-To: ".$email."\r\n"
    ."X-Mailer: PHP/" . phpversion());

if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}
?>