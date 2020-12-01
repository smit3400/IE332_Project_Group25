<?php
session_start();

if ($_SESSION["log"] == 1) {
	header("Location: student_main.php");
}

$message = "";

if(count($_POST)>0) {
	$servername = "mydb.itap.purdue.edu";
	$username = "g1116905";
	$password = "iegroup25";
	$dbname = "g1116905";

	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM Student WHERE Email='" . $_POST["stud_email"] . "' AND Password = '". $_POST["stud_password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid username or password!";
	} else {
		header("Location: student_main.php");
		
		$_SESSION["log"] = 1;

		$_SESSION["stud_email"] =  $_POST["stud_email"];
	}

	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<!-- importing css from external file-->
	<head>
		<title>IE Connect</title>
		<link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
		<link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<img class="logo" src="https://wl.mypurdue.purdue.edu/static_resources/portal/images/logo.png">
		<div class="login-container">
			<h2 class="title">Welcome Student!</h2>
			<form action="" method = "post">
				<div class="form">
					<label for="stud_email">Email:</label>
				    <input class="input" type="email" id="stud_email" name="stud_email" placeholder="Email address" required>
				</div>
			    <br>
			    <div class="form">
			    	<label for="stud_password">Password:</label>
				    <input class="input" type="password" id="stud_password" name="stud_password" placeholder="Password" required>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script>
					<!-- java function for showing password after checking box-->
					function myFunction() {
						var x = document.getElementById("stud_password");
						if (x.type === "password") {
							x.type = "text";
						} else {
							x.type = "password";
						}
					}
					</script>
			    </div>
			    <br>
				<div class="message"><?php if($message!="") { echo $message; } ?></div>
			    <br>
			    <input class="sign-in" type="submit" value="Sign in">
			</form>
			<p> New user? Create an account below!</p>
			<p><a class="new-account" href="student_form.php" target="_self" >Create account</a></p>
			<p><a class="new-account" href="https://web.ics.purdue.edu/~g1116905/main/mainpage.php" target="_self" >Home page</a></p>
		</div>
	</body>
</html>
