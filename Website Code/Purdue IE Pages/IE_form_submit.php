<!DOCTYPE html>
<html>
<body>
	Welcome <?php echo $_GET["fname"]; ?><br>
	Your email address is: <?php echo $_GET["email"]; ?> <br>
	<?php

	echo "Database Connection" . "<br>" . "<br>";
	//Connecting to database
	$servername = "mydb.itap.purdue.edu";
	$username = "g1116905";
	$password = "iegroup25";
	$dbname = "g1116905";

	$data_base = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}else{
		echo "Connected Successfully!" . "<br>";
	}

	echo "Inserting Data". "<br>" . "<br>";

	$advisoremail = $_GET["email"];
	$advisorpass = $_GET["password"];
	$afirst = $_GET["fname"];
	$alast = $_GET["lname"];

	$sql = "INSERT INTO Purdue_IE (Email, Password, Fname, Lname)
	VALUES('" . $advisoremail . "', '" . $advisorpass . "', '" . $afirst . "', '" . $alast . "')";

	if (mysqli_query($data_base, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
	}

	mysqli_close($data_base);

	?>
	<p><a href = "IE_login.php">Login Page</a></p>
</body>
</html>