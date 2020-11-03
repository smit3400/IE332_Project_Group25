<!DOCTYPE html>
<html>
<body>

<h2>Hello Student!</h2>

</body>

<h5>Login</h5>
<form method = "post" action = "#">
	<label>Email:</label><br>
	<input type="email" id="Email" name="Email" placeholder="Email address"<br>
	<br>
	<label>Password:</label><br>
	<input type="password" id="Password" name="Password" placeholder="Password" <br>
	<br>
	<br>
	<input type="submit" value="Sign in">
	<p> New user? Create an account <a href = "student_form.php">here</a></p>

<?php
session_start();
include 'new_connection.php';

if(isset($_POST['submit'])){
  $Email = $_POST['Email'];
  $Password = $_POST['Password'];
  $query=mysqli_query($data_base,"SELECT * FROM Student WHERE Email = '$Email' AND Password = '$Password'");
  $num_rows=mysqli_num_rows($query);
  $row=mysqli_fetch_array($query);
  $_SESSION["id"]=$row['user_id'];
if ($num_rows>0)
{
?>
    <script>
      alert('Successfully Log In');
      document.location='student_profile.php'
    </script>
    <?php
}
}
      ?>
</form> 
</html>
