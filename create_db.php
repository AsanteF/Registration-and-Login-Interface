<html> 
<head> 
<title>Creating database</title>
<link rel="stylesheet" type="text/css" href="signup.css">
</head> 
<body>
<?php
if (isset($_POST['register'])) 
{ 
$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$dbname = filter_var($_POST['dbname'], FILTER_SANITIZE_STRING);
$conn=mysql_connect('localhost',$uname,$pass);
$sql =  'CREATE DATABASE '.$dbname;
$retval = mysql_query( $sql, $conn );
$select_db=mysql_select_db($dbname);
$query = 'CREATE TABLE users (userid int(11) NOT NULL AUTO_INCREMENT,name varchar(50),email varchar(40) ,username varchar(30) ,gender varchar(20) ,phone varchar(20) ,password varchar(60),type_of_user varchar(30),PRIMARY KEY(userid))';

$val = mysql_query( $query, $conn );
$password=md5('innoraft');
$query1 = mysql_query("INSERT INTO users(name,email,username,gender,phone,password,type_of_user)VALUES('sonam','shreyasingh28592@gmail.com','shreyasingh28592','Female','9876567654','$password','admin')",$conn); //Insert query

if(!$conn)
{
 $submitted="Database Connection Failed";
}
else if(!$retval)
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

}
?>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="42" width="187">
</div> <!--left header end -->
</div><!--header end -->
<div id="content" class="required">
	<?php
	//setcookie ("setup", "", time() - 3600);
    if(!$_COOKIE["setup"])
    {
    if($submitted) { ?>
<center><div id="msg"><center> <?php echo $submitted; }?> </center></div><br><br></center>
<h2><center>Create Your Database</center><h2>
<form method="post" action="#">
<table border="0" align="center" cellspacing="10"> 
<tr> 
<td><input type="text" name="uname" id="nm" placeholder="Enter your mysql username                                                              *" required style="border:5px solid #7C70B8 ;">
</td> </tr>        
<tr> <td> <input type="password" name="pass" id="pass"  placeholder="Enter your mysql password                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr> <td> <input type="text" name="dbname" id="nm" placeholder="Enter your database name                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr>
<td><input type="submit" name="register" id="register" value="Create" style="font-size:97%"></td> </tr>  
</table> 
	<?php 
			 //session_start();
		 // $_SESSION['setup'] = 1;
	setcookie("setup", 1 );
	?>
</form>
	<?php } else { ?>
<center><div >
<label id="name" >Database created!</label><table cellpadding="5" cellspacing="40"><tr>
<td id="msg" align="center"><a href="index.php" style="text-decoration: none" >LOGIN</a></td>
<td id="msg" align="center"><a href="registration.php" style="text-decoration: none" >REGISTER</a></td>
</tr></table></div></center>
	<?php } ?>
</div> 
</div>
<?php
if(isset($_POST['register']))
{ 
$data1 = "<?php";
$data2 = "$"."conn=mysql_connect('localhost','".$uname."','".$_POST['pass']."');";
$data3 = "$"."select_db=mysql_select_db('".$dbname."');";
$data4 = "?>";
$data = array($data1,$data2,$data3,$data4);
$filename = 'file://localhost/var/www/html/connect.php';
file_put_contents($filename, join("\n",$data));
}
mysql_close($conn); ?>
</body> 
</html>