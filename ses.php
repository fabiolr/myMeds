<?php
session_start();
echo $_SESSION['user'];

if (!isset($_SESSION['user']))
{

header("Location: index.php?m=login_error"); // Redirecting To Home Page

}
	echo "is  set";
?>