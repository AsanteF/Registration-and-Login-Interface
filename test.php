<html>
<head>



</head>
<body>
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
include 'connect.php'; //connect the connection page


echo 'helooo'; 

$rslt = mysql_query("SELECT * FROM users WHERE username='tiya'",$conn);
$data = mysql_num_rows($rslt);
$num=$data-1;
$usrnm=array(tiya,$num);
$username=join("_",$usrnm);
echo $data;
echo $num;
echo $username;

?>
 
 
 </div>
 </div>
 <?php mysql_close($conn);?>
</body>
</html> 