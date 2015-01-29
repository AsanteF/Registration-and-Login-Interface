<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['count']);

session_destroy();

header("Location: index.php");
exit;
?>