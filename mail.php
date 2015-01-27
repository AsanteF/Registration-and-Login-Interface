<?php
// the message
$msg = "Welcome to InnoTraining!\nYou have successfully registered.";
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
// send email
echo $email;
mail($email,"My subject",$msg);
//header('Location: registration.html');
?> 