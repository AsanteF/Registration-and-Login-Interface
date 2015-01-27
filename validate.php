<?php
if($_POST)
{
	$name = $_POST['name']; 
	$password = $_POST['pass']; 
	$gender = $_POST['gender']; 
	$phone = $_POST['phone']; 
	$email = $_POST['email']; 
	
	//Name
	if (!preg_match("%[^A-Za-z\s0-9 - @ .]/%",$name)){
		$val_name = $name;
	}else{ 
		$err_name='Please enter valid Name.'; 
	}
 
	// Email
	if (preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
		$val_email = $email; 
	}else{ 
		$err_email = 'Please enter valid Email.'; 
	}
 
	// Password min 6 char max 20 char
	if (preg_match("/^[a-z0-9_-]{6,20}$/i", $password)){
		$val_password = $password;
	}else{ 
		$err_password = 'Please enter valid Password (minimum 6 characters)'; 
	}
 
 if ((strlen($phone) !=10)){ 
		$err_phone = 'Please enter valid Phone number (10 digits)'; 
	}
 
	if((strlen($val_name)>0)&&(strlen($val_email)>0)
			&&(strlen($val_phone)>0)&&(strlen($val_password)>0) ){
		header("Location: home.php");
	}else{ }
}
?>