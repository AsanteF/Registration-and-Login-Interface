<html>
<head>
<title>Login Script</title>
<link rel="stylesheet" type="text/css" href="signup.css">
	<?php 
	include('connect.php');
	if(!$conn){
	header("Location: create_db.php");}
	session_start();
	if(!(strcmp($_SESSION['count'],"double")))
	{
		header("Location: user-info.php");	
		exit;
	} 
	?>
</head>
<body>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="45" width="180">
</div> <!--left header end -->
<div id="menu">
<a href="registration.php" style="text-decoration: none" >REGISTER</a>
</div><!--menu header end -->
</div><!--header end -->
<div id="content">
<center>
	<?php 
	if($_GET['status'])
	{
	$submitted=$_GET['status']; ?>
    <div id="msg"><center> <?php echo $submitted; ?> </center></div><br><br>
	<?php } ?>
</center>
	<br>
	<h2><center>Login</center></h2>
	<form action="login_process.php" method="POST">
    <table align="center" cellspacing="15">
	<tr>
	<td>
	<input id="username" type="text" name="username" value="<?php echo $_COOKIE["username"]; setcookie ("username", "", time() - 3600); ?>" placeholder="Type in your username                                                     *" required style="border:5px solid #7C70B8;">
	</td>
	</tr>
	<tr>
	<td>
	 <input id="password" type="password" name="password" placeholder="Type in your password                                                     *" required style="border:5px solid #7C70B8;">
	</td>
	</tr>
	<tr>
	<td>
    <input type="submit" name="submit" id="register" value="Login" style="font-size:97%">
    </td>
	</tr>
	</table>
	
	</form>
</div>
</div>
</body>
</html>