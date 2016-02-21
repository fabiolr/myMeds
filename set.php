<?php
session_start();
$_SESSION['user'] = "fabio";
header("location:dashboard.php")

?>