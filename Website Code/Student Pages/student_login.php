<?php

session_start();

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
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
		header("Location: student_main.php");

		$_SESSION["stud_email"] =  $_POST["stud_email"];

		while ($row=mysqli_fetch_row($result))
		{
			$_SESSION["fname"] = $row[2];
			$_SESSION["lname"] = $row[3];
			$_SESSION["number"] = $row[4];
			$_SESSION["major"] = $row[5];
			$_SESSION["gpa"] = $row[7];
			$_SESSION["skills"] = $row[8];
			$_SESSION["courses"] = $row[9];
			$_SESSION["year"] = $row[10];
			$_SESSION["oppor"] = $row[11];
			$_SESSION["relocate"] = $row[12];
			$_SESSION["location"] = $row[6];
			$_SESSION["visa"] = $row[13];
		}
	}

	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="login.css" rel="stylesheet" type="text/css" />
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
			    </div>
			    <br>
			    <br>
			    <input class="sign-in" type="submit" value="Sign in">
			</form>
			<p> New user? Create an account below!</p>
			<p><a class="new-account" href="student_form.php" target="_self" >Create account</a></p>
		</div>
		<div class="message"><?php if($message!="") { echo $message; } ?></div>
	</body>
</html>