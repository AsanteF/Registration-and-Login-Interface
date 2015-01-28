<html> 
<head> 
<title>Creating database</title>
<link rel="stylesheet" type="text/css" href="signup.css">
</head> 
<body>
<?php
if ( isset( $_POST['register'] ) ) 
{ 
$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$dbname = filter_var($_POST['dbname'], FILTER_SANITIZE_STRING);
$conn=mysql_connect('localhost',$uname,$pass);
//if(!$conn)
//{$submitted="Database Connection Failed";
//}
if(!$conn)
{die("Database Connection Failed".mysql_error());
}
$sql =  'CREATE DATABASE '.$dbname;
$retval = mysql_query( $sql, $conn );
$select_db=mysql_select_db($dbname) or die(mysql_error());
$query = 'CREATE TABLE users (userid int(11) NOT NULL AUTO_INCREMENT,name varchar(50),email varchar(40) ,username varchar(30) ,gender varchar(20) ,phone varchar(20) ,password varchar(60),type_of_user varchar(30),PRIMARY KEY(userid))';

$val = mysql_query( $query, $conn ) or die(mysql_error());
$password=md5('innoraft');
$query1 = mysql_query("INSERT INTO users(name,email,username,gender,phone,password,type_of_user)VALUES('sonam','shreyasingh28592@gmail.com','shreyasingh28592','Female','9876567654','$password','admin')",$conn); //Insert query
if(!$retval)
{
 $submitted='Could not create database.';
}
else if(!$select_db)
{
 $submitted="Database Selection Failed";
}
else if(!$val)
{
 $submitted='Could not create table.';	
}
else if(!$query)
{
$submitted="Could not insert in table. ";	
}
else
	$submitted="Database and Tables successfully created.\n";
mysql_close($conn);
}
?>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="42" width="187">
</div> <!--left header end -->
<div id="menu">
<a href="login.php" style="text-decoration: none" >LOGIN</a>
</div><!--menu header end -->
</div><!--header end -->
<div id="content" class="required">
<?php if($submitted) { ?>
<center><div id="msg"><center> <?php echo $submitted; }?> </center></div><br><br></center>
<h2><center>Create Your Database</center><h2>
<form method="post" action="">
<table border="0" align="center" cellspacing="10"> 
<tr> 
<td><input type="text" name="uname" id="name" placeholder="Enter your mysql username                                                              *" required style="border:5px solid #7C70B8 ;">
</td> </tr>        
<tr> <td> <input type="password" name="pass" id="pass" placeholder="Enter your mysql password                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr> <td> <input type="text" name="dbname" id="name" placeholder="Enter your database name                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr>
<td><input type="submit" name="register" id="register" value="Create" style="font-size:97%"></td> </tr>  
</table> 
</form>
</div> 
</div>

</body> 
</html>