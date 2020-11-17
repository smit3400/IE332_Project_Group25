<?php

session_start();

$message="";
if(count($_POST)>0) {
	$servername = "mydb.itap.purdue.edu";
	$username = "g1116905";
	$password = "iegroup25";
	$dbname = "g1116905";

	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$result = mysqli_query($conn,"SELECT * FROM Student WHERE Email='" . $_POST["Email"] . "' AND Password = '". $_POST["Password"]."'");
	$count  = mysqli_num_rows($result);
	if($count==0) {
		$message = "Invalid Username or Password!";
	} else {
		$message = "You are successfully authenticated!";
		header("Location: student_main.php");

		$_SESSION["email"] =  $_POST["Email"];

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
<body>

<h2>Hello Student!</h2>

<h4>Login</h4>
<form action = "" method = "post">
	<label>Email:</label><br>
	<input type="email" name="Email" placeholder="Email address" required>
	<br>
	<label>Password:</label><br>
	<input type="password" name="Password" placeholder="Password" required>
	<br>
	<br>
	<input type="submit" value="Sign in">
</form>

<p> New user? Create an account <a href = "student_form.php">here</a></p>
<div class="message"><?php if($message!="") { echo $message; } ?></div>

</body>
</html>
