<html>
<head>
<title>User List</title>
<link rel="stylesheet" type="text/css" href="list.css">
</head>
<body>
	<?php 
	include('connect.php');
	if(!$conn){
	header("Location: create_db.php");}
	if(empty($_SESSION)) // if the session not yet started 
   	session_start();

	if((strcmp($_SESSION['username'],"shreyasingh28592"))) { //if not yet logged in as superuser
   	header("Location: login.php");// send to login page
   	exit;
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
 <h2><center>User List</center></h2>
 <br><br>
 <div id="search">
 <form method="post" action="" >
 <input type="text" name="name" id="name" value="<?php include 'connect.php'; //connect the connection page
 												       if ( isset( $_POST['search'] ) ) { 
 													    $name=$_POST['name'];
 													    echo $name;
 													   if($_POST['name']=='')
 													   	$query = "SELECT * FROM users"; }
 													   else
 													   	$query = "SELECT * FROM users";
 													   	?>"
  placeholder="Search by name"  style="border:5px solid #7C70B8;">&nbsp;&nbsp;&nbsp;
 <input type="submit" name="search" id="register" value="Search" style="font-size:97%">
 </form>
 </div>
 <div id="content">
 
 <table border="0" align="center" cellspacing="10"> 
 <tr> 
 <th align="left">Name</th><th align="left">Email</th>
 </tr>
 <?php
 	if ( isset( $_POST['search'] ) ) { 
 		$name=$_POST['name'];
 		$query = "SELECT * FROM users where name LIKE '%$name%'";
 }	
 else
 {
 	$query = "SELECT * FROM users";
 }
 $rs=mysql_query( $query, $conn );
 if(!$rs )
 {
  die('Could not get data : ' . mysql_error());
 }
 $data = mysql_num_rows($rs);
 if($data==0)
 {
 	echo '<center><div id="msg"><center>Invalid Input!</center></div></center><br><br>';
 }

 while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
 {
 ?>	

<tr> 
<td><?php echo "{$row['name']} ";?></td>
<td><?php echo " {$row['email']} ";?></td>
<td align="right"><a href="user-info.php?name=<?php echo $row['name']; ?>" id="viewlink"><center>View</center></a>

 <?php } ?>
</td>
</tr> 
</table>
</div>
</div>
 <?php mysql_close($conn);?>
</body>
</html> 