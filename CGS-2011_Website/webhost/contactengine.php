<?php

// CHANGE THE THREE VARIABLES BELOW

$EmailFrom = "cgsoldier@gmail.com";
$EmailTo = "cgsoldier@gmail.com";
$Subject = "Contact from PaoloHilario.com";

$Name = Trim(stripslashes($_POST['Name']));
$Email = Trim(stripslashes($_POST['Email']));
$Comments = Trim(stripslashes($_POST['Comments'])); 

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Comments;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
// CHANGE THE URL BELOW TO YOUR "THANK YOU" PAGE
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.html\">";

}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";

}
?>