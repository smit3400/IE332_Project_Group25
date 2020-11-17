<?php

session_start();

$message="";
if(count($_POST)>0) {
  $servername = "mydb.itap.purdue.edu";
  $username = "g1116905";
  $password = "iegroup25";
  $dbname = "g1116905";

  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  $result = mysqli_query($conn,"SELECT * FROM Employer WHERE Email='" . $_POST["Email"] . "'");
  $count  = mysqli_num_rows($result);
  if($count==0) {
    $message = "Invalid Username or Password!";
  } else {
    $message = "You are successfully authenticated!";
    header("Location: employer_main.php");

    $_SESSION["email"] =  $_POST["Email"];

  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Hello Employer!</h2>

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

<p> New user? Create an account <a href = "employer_form.php">here</a></p>
<div class="message"><?php if($message!="") { echo $message; } ?></div>

</body>
</html>
