<?php
session_start();

$_SESSION["emp_log"] = 0;

//End php session
unset($_SESSION['id']);
session_destroy();

//Redirect to login page
header("Location: employer_login.php");
?>
