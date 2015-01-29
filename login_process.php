	<?php  
	include('connect.php');
	if(!$conn){
	header("Location: create_db.php");}
	$username = $_POST['username'];
	$password =md5(mysql_real_escape_string($_POST['password']));

	$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
 
	$result = mysql_query($query,$conn);
	/*if(!$result )
		{
			die('Could not store data: ' . mysql_error());
		}
	*/
	if(empty($_SESSION)) // if the session not yet started 
   			session_start();
   

	$count = mysql_num_rows($result);
	$_SESSION['username'] = $username;
	
	if ($count == 1)
	{
		
		if(!(strcmp($_SESSION['username'],"shreyasingh28592")))
		{	
			$_SESSION['count']= "double";
			header("Location: user-list.php");
            exit;
		}
		else
		{	$_SESSION['count']= "double";
	
			header("Location: home.php");
            exit;
	    }
	}
	else
	{
		setcookie("username", $username );
		header('Location: index.php?status=Invalid Login Credentials.');
	}
	
	?>

