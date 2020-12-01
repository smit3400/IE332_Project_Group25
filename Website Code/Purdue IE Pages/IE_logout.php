<?php
session_start();

// ending session to logout

$_SESSION["ad_log"] = 0;
unset($_SESSION['id']);
session_destroy();
header("Location: IE_login.php");
?>
