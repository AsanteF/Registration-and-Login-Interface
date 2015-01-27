<html> 
<head> 
<title>Creating database</title>
<link rel="stylesheet" type="text/css" href="signup.css">

</head> 
<body>
<?php
$uname = filter_var($_POST['uname'], FILTER_SANITIZE_STRING);
$pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
$conn=mysql_connect('localhost',$uname,$pass);
if(!$conn)
{die("Database Connection Failed".mysql_error());
}
$select_db=mysql_select_db('registration');
if(!$select_db)
{die("Database Connection Failed".mysql_error());
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
<h2><center>Create Your Database</center><h2>
<form method="post" action="#">
<table border="0" align="center" cellspacing="10"> 
<tr> 
<td><input type="text" name="uname" id="name" placeholder="Enter your mysql username                                                              *" required style="border:5px solid #7C70B8 ;">
</td> </tr>        
<tr> <td> <input type="password" name="pass" id="pass" placeholder="Enter your mysql password                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr> <td> <input type="dbname" name="pass" id="pass" placeholder="Enter your mysql password                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr>
<td><input type="submit" name="register" id="register" value="Create" style="font-size:97%"></td> </tr>  
</table> 
</form>
</div> 
</div>
</body> 
</html>