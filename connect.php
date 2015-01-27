<?php
$conn=mysql_connect('localhost','root','innoraft');
if(!$conn)
{die("Database Connection Failed".mysql_error());
}
$select_db=mysql_select_db('registration');
if(!$select_db)
{die("Database Connection Failed".mysql_error());
}
?>