<?php
$EmailFrom = "Inquiry@ludicrousgamingnetwork.com";
$EmailTo = "ludicrousgamingnetwork@gmail.com";
$Subject = "Ludicrous Gaming Network";
$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 
$Description = Trim(stripslashes($_POST['Description']));
// prepare email body text
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Description: ";
$Body .= $Description;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";
// send email 
$success = mail($EmailTo,"From: <$EmailFrom>");
// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/index.html#success\">";
  echo '<script>$.notify("Thank you for your order. We will contact you shortly.", "info");</script>';
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=/index.html#error\">";
}
?>