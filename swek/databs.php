<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "myDB";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
echo "connected"."<br>";

$q="SELECT * FROM login";
$result = $conn->query($q);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: ".$row["email"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>