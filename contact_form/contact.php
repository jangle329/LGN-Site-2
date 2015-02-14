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
$email = trim($_POST['email']);
$subject = stripslashes($_POST['subject']);
$message = stripslashes($_POST['message']);


$error = '';

// Check name

if(!$name)
{
$error .= 'This appears to be an invalid name please re-enter<br />';
}

// Check email

if(!$email)
{
$error .= 'Please enter your email address.<br />';
}

if($email && !ValidateEmail($email))
{
$error .= 'Please enter a valid email address.<br />';
}

// Check message (length)

if(!$message || strlen($message) < 15)
{
$error .= "Your message must be at least 15 charecters long.<br />";
}


if(!$error)
{
$mail = mail(WEBMASTER_EMAIL, $subject, $message,
     "From: ".$name." <".$email.">\r\n"
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