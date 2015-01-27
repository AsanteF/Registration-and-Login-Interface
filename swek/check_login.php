<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "innoraft";
$dbname = "mydb";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
echo "connected"."<br>";

$email=$_POST['email']; 
$password=$_POST['password']; 

$email=stripslashes($email);
$password=stripslashes($password);

$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);
$sql="SELECT * FROM login WHERE email='$email' and password='$password'";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if($count==1)
{
header("location:login_success.php");
}
else
{
echo"<h1>Wrong Username or Password</h>";
header("location:login.php");

}
$conn->close();
?>
</body>
</html>