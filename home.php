<html>
<head>
<link rel="stylesheet" type="text/css" href="info.css">
<title>Home</title>
</head>
<body>
<?php
include 'connect.php'; //connect the connection page
if(empty($_SESSION)) // if the session not yet started 
   	session_start();
if(!isset($_SESSION['username'])) { //if not yet logged in
   header("Location: login.php");// send to login page
   exit;
} 

$uname=$_SESSION['username'];
$query = sprintf("SELECT * FROM users WHERE username='%s'",
            mysql_real_escape_string($uname));
$rs=mysql_query( $query, $conn );
if(!$rs )
{
  die('Could not get data : ' . mysql_error());
}
?>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="45" width="180">
</div> <!--left header end -->
<div id="menu">
<a href="logout.php" style="text-decoration: none" >LOGOUT</a>
</div><!--menu header end -->
</div><!--header end -->
<div id="content">
<?php
while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
{
?>
<h2><center>Welcome <label id="name"><?php echo " {$row['name']}  " ;?></label></center></h2>
<br><br>
<table border="0" align="center" cellspacing="10"> 
<tr> 
<td>Email :</td><td><?php echo " {$row['email']} ";?></td>
</tr>
<tr> 
<td>Gender :</td><td><?php echo "{$row['gender']} ";?></td>
</tr>
<tr> 
<td>Phone :</td><td>+91-<?php echo " {$row['phone']}";}?></td>
</tr>
</table>
</div>
</div>
	<?php mysql_close($conn);?>
</body>
</html> 