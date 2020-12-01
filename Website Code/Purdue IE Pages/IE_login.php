<?php

session_start();

if ($_SESSION["ad_log"] == 1) {
	header("Location: IE_main.php");
}

$message="";
if(count($_POST)>0) {
  
  //connecting to DB
  $servername = "mydb.itap.purdue.edu";
  $username = "g1116905";
  $password = "iegroup25";
  $dbname = "g1116905";

	//authenticating login credentials
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $result = mysqli_query($conn,"SELECT * FROM Purdue_IE WHERE Email='" . $_POST["Email"] . "' AND Password = '". $_POST["Password"]."'");
  $count  = mysqli_num_rows($result);
  if($count==0) {
    $message = "Invalid username or password!";
  } else {
    $message = "You are successfully authenticated!";
    header("Location: IE_main.php");

	$_SESSION["ad_log"] = 1;

    $_SESSION["email"] =  $_POST["Email"];

  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<!-- calling in css external file -->

	<head>
		<title>IE Connect</title>
		<link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
		<link href="login.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<img class="logo" src="https://wl.mypurdue.purdue.edu/static_resources/portal/images/logo.png">
		<div class="login-container">
			<h2 class="title">Welcome IE Advisor!</h2>
			<form action="" method = "post">
				<div class="form">
					<label for="Email">Email:</label>
				    <input class="input" type="email" id="Email" name="Email" placeholder="Email address" required>
				</div>
			    <br>
			    <div class="form">
			    	<label for="Password">Password:</label>
				    <input class="input" type="password" id="Password" name="Password" placeholder="Password" required>
					<input type="checkbox" onclick="myFunction()">Show Password
					<script>
					
					// function to see password 
					
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
				<!-- submission will go to main -->
			    <input class="sign-in" type="submit" value="Sign in">
			</form>
			<p> New user? Create an account below!</p>
			<p><a class="new-account" href="IE_form.php" target="_self" >Create account</a></p>
			<p><a class="new-account" href="https://web.ics.purdue.edu/~g1116905/main/mainpage.php" target="_self" >Home page</a></p>
		</div>
	</body>
</html>
