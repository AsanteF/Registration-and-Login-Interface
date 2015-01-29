<html> 
<head> 
<title>Sign-Up</title>
<link rel="stylesheet" type="text/css" href="signup.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" >
$(document).ready(function() {
$("#register").click(function() {
var name = $("#name").val();
var email = $("#email").val();
var pass = $("#pass").val();
var phone = $("#phone").val();
var gender = $("#gender").val();
var filter = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

if (name == '' || email == '' || pass == '' || phone == '' || gender == '' ) {
alert("Please fill all fields...!!!!!!");
return false;
}else if(!filter.test(email))
{
alert("Please enter valid email...!!!!!");
return false;
} else if ((phone.length) <10) {
alert("Your phone number should have atleast 10 digits...!!!!!");
return false;
} else if ((pass.length) < 8) {
alert("Password should atleast be 8 characters in length...!!!!!!");
return false;
} 
else if ($("#gender:checked").length == 0){
	alert("Please select gender .. !!");
	return false;
}
else {
$.post("register.php", {

}, function(data) {

//if (data == 'You have Successfully Registered.....') {
//$("form")[0].reset();
//}
//alert(data);
});
}
});
});

</script>
	<?php 
	session_start();
	if(!(strcmp($_SESSION['count'],"double")))
	{
		header("Location: user-info.php");	
		exit;
	} 
	?>
</head> 
<body>
	<?php 
	include('connect.php');
	if(!$conn){
	header("Location: create_db.php");}
	?>
<div id="container">
<div id="header">
<div id="left_header">
<img src="logo.png" height="42" width="187">
</div> <!--left header end -->
<div id="menu">
<a href="index.php" style="text-decoration: none" >LOGIN</a>
</div><!--menu header end -->
</div><!--header end -->
<div id="content" class="required">
<center>
 	<?php 
//setcookie ("phone", "", time() - 3600);
	if($_GET['status'])
	{
	$submitted=$_GET['status']; ?>
    <div id="msg"><center> <?php echo $submitted; ?> </center></div><br><br>
	<?php } ?>
</center>
<h2><center>Register Here</center><h2>
<form method="post" action="register.php">
<table border="0" align="center" cellspacing="10"> 
<tr> 
<td><input type="text" name="name" value="<?php echo $_COOKIE["nam"]; setcookie ("nam", "", time() - 3600); ?>" id="nm" placeholder="Enter your name                                                              *" required style="border:5px solid #7C70B8 ;">
</td> </tr>        
<tr> <td> <input type="email" name="email" value="<?php echo $_COOKIE["mail"]; setcookie ("mail", "", time() - 3600); ?>" required id="email" placeholder="Enter your email                                                              *" style="border:5px solid #7C70B8;"></td> </tr> 
<tr> <td><h4>Gender &nbsp;:&nbsp; &nbsp; &nbsp;&nbsp;<input type="radio" name="gender" id="gender" value="Male" <?php echo ($_COOKIE['radio'] == 'Male') ? 'checked="checked"' : ''; setcookie ("radio", "", time() - 3600);?> />&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" id="gender" value="Female" <?php echo ($_COOKIE['radio'] == 'Female') ? 'checked="checked"' : ''; setcookie ("radio", "", time() - 3600);?> >&nbsp;Female</td> </tr> </h4>
<tr> <td> <input type="text" name="phone" id="phone" value="<?php echo $_COOKIE["phn"]; setcookie ("phn", "", time() - 3600); ?>" placeholder="Enter your phone number                                                 *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr> <td> <input type="password" name="pass" id="pass" placeholder="Create a password                                                          *" required style="border:5px solid #7C70B8;"></td> </tr> 
<tr>
<td><input type="submit" name="register" id="register" value="Complete  Sign-Up" style="font-size:97%"></td> </tr>  
</table> 
</form>
</div> 
</div>
</body> 
</html>