<html>
<head>
<title>Checkin login...</title>
</head>
<?php


require_once 'medoo.php';
require_once 'database.php';

if ($database->has("users", [
	"AND" => [
		"email" => $_POST[email],
		"password" => $_POST[password]
	]
]))

{	
session_start();
$_SESSION['user'] = "fabio";
//header("location:index.php")
}

header("location:dashboard.php");

?>
<body>


</body>
</html>