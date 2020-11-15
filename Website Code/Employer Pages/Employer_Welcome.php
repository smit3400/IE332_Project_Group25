<!DOCTYPE html>
<html>
<body>
	Welcome <?php echo $_GET["company"]; ?><br>
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

	$email = $_GET["email"];
	$pass = $_GET["password"];
	$company = $_GET["company"];
	$phone = $_GET["phone"];
	$description = $_GET["description"];
	$industry = $_GET["industry"];

	$sql = "INSERT INTO Employer(Email, Password, Company_Name, Phone_Number, Description, Industry)
	VALUES('" . $email . "', '" . $pass . "', '" . $company . "', '" . $phone . "', '" . $description . "', '" . $industry . "')";

	if (mysqli_query($data_base, $sql)) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
	}

	mysqli_close($data_base);

	?>



</body>
</html>