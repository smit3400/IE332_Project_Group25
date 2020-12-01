<?php
session_start();

if ($_SESSION["emp_log"] == 1) {
	header("Location: employer_main.php");
}

$message="";
if(count($_POST)>0) {
  $servername = "mydb.itap.purdue.edu";
  $username = "g1116905";
  $password = "iegroup25";
  $dbname = "g1116905";

  //Database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  //Email and password verification
  $result = mysqli_query($conn,"SELECT * FROM Employer WHERE Email='" . $_POST["Email"] . "' AND Password ='" . $_POST["Password"] . "'");
  $count  = mysqli_num_rows($result);
  if($count==0) {
    $message = "Invalid Username or Password!";
  } else {
    $message = "You are successfully authenticated!";
    header("Location: employer_main.php");

	$_SESSION["emp_log"] = 1;

    $_SESSION["email"] =  $_POST["Email"];

  }

  mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html>
<!-- CSS Connection -->
	<head>
		<title>IE Connect</title>
		<link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
		<link href="login.css" rel="stylesheet" type="text/css" />
	</head>

	<!-- Website header -->
	<body>
		<img class="logo" src="https://wl.mypurdue.purdue.edu/static_resources/portal/images/logo.png">
		<div class="login-container">
			<h2 class="title">Welcome Employer!</h2>
			
			<!-- Login Form -->
			<form action="" method = "post">
				<div class="form">
					<label for="Email">Email:</label>
				    <input class="input" type="email" id="Email" name="Email" placeholder="Email address" required>
				</div>
			    <br>
			    <div class="form">
			    	<label for="Password">Password:</label>
				    <input class="input" type="password" id="Password" name="Password" placeholder="Password" required>
					
					<!-- Show password checkbox -->
					<input type="checkbox" onclick="myFunction()">Show Password
					<script>
					function myFunction() {
						var x = document.getElementById("Password");
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
			<p><a class="new-account" href="employer_form.php" target="_self" >Create account</a></p>
			<p><a class="new-account" href="https://web.ics.purdue.edu/~g1116905/main/mainpage.php" target="_self" >Home page</a></p>
		</div>
	</body>
</html>
