<html>
<head>
<title>User Information</title>
<link rel="stylesheet" type="text/css" href="info.css">
</head>
<body>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="45" width="180">
</div> <!--left header end -->
<div id="menu">
	<?php 
	include 'connect.php'; //connect the connection page
	if(!$conn){
	header("Location: create_db.php");}
	if(empty($_SESSION)) // if the session not yet started 
   		session_start();
	if(isset($_SESSION['username'])) 
 		echo '<a href="logout.php" style="text-decoration: none" >LOGOUT</a>';
 	else
 	    echo '<a href="index.php" style="text-decoration: none" >LOGIN</a>';
 	?>
</div><!--menu header end -->
</div><!--header end -->
	<?php 
	if(!isset($_SESSION['username'])) { //if not yet logged in
		$name=$_GET['name'];
		$userid=$_GET['userid'];
		if($_GET['userid'])//if url contains userid
			$query = sprintf("SELECT * FROM users WHERE userid='%s'",
            mysql_real_escape_string($userid));
		else if($_GET['name'])//if url contains name
			header("Location: error.php");
        else
            header("Location: error.php");
	} 
	else //logged in
	{
		$uname=$_SESSION['username'];
		$name=$_GET['name'];
		$userid=$_GET['userid'];
		if($_GET['userid'])//if url contains userid
			$query = sprintf("SELECT * FROM users WHERE userid='%s'",
            mysql_real_escape_string($userid));
		else if($_GET['name'])//if url contains name
			$query = sprintf("SELECT * FROM users WHERE name='%s'",
            mysql_real_escape_string($name));
        else
            $query = sprintf("SELECT * FROM users WHERE username='%s'",
            mysql_real_escape_string($uname));
	}

	$rs=mysql_query( $query, $conn );

	$data = mysql_num_rows($rs);
	if($data==0)
	{
		if(isset($_SESSION['username'])) 
		header("Location: user-info.php?msg=Invalid Input!!");
		else
		header("Location: error.php");
	}
	while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
	{ ?>
		
<div id="content">
<center>
	<?php 
	if($_GET['msg'])
	{
	$submitted=$_GET['msg']; ?>
<div id="msg"><center> <?php echo $submitted; ?> </center></div><br><br>
	<?php } else {?>
</center>
<h2><center><?php echo " {$row['name']}  " ;?></center></h2>
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
 	<?php } ?>
</div>
</div>
 	<?php mysql_close($conn);?>
</body>
</html> 