<?php
session_start();
unset($_SESSION['id']);
session_destroy();
header("Location: student_login.php");
?>