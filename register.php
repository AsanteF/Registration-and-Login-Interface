<html>
<head></head>
<body>

	<?php
	require('connect.php');
	if(!$conn){
	header("Location: create_db.php");}
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$parts = explode("@", $email);
	$username = $parts[0];
	$gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
	$phone =  filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $password =md5($_POST['pass']);
	$i=0;
	$first=$username;
		do
		{
			$rslt = mysql_query("SELECT * FROM users WHERE username='$username'",$conn);
			$count = mysql_num_rows($rslt);
			if($count)
			{
				$i++;
				$usrnm=array($first,$i);
				$username=join("_",$usrnm);
			}
		}while($count>0);


	$result = mysql_query("SELECT * FROM users WHERE email='$email'",$conn);
	$data = mysql_num_rows($result);
	if(($data)==0)
	{
	$query = mysql_query("INSERT INTO users (name,email,username,gender,phone,password,type_of_user) VALUES ('$name','$email','$username','$gender','$phone','$password','normal')",$conn); //Insert query

	if($query)
	{
		// the message
		$msg = "Welcome to InnoTraining!\nYou have successfully registered.\nYour username is ".$username." .";
		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);
		// send email
		if(mail($email,"Welcome Email",$msg)) $submitted = true;
		if($submitted) header('Location: registration.php?status=Successfully Registered');
		else header('Location: registration.php?status=Sending confirmation email failed. Please try again!');
	}else
	{
		die('Could not store data: ' . mysql_error());
	}
	}else
	{	
		setcookie("nam", $name );
		setcookie("mail", $email );
		setcookie("phn", $phone );
		setcookie("radio", $gender );
		header('Location: registration.php?status=Email already registered.');
	}
	?>

 </body>
 </html>
  
      


