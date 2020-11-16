<!DOCTYPE html>
<html>
<body>

	Welcome <?php echo $_GET["Fname"]; ?>!<br>
	Your email address is: <?php echo $_GET["Email"]; ?> <br><br>
	<?php

	echo "Establishing Database Connection..." . "<br>";
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
		echo "Connected Successfully!" . "<br>" . "<br>";
	}

	echo "Inserting Data...". "<br>";

	$stud_email = $_GET['Email'];
	$stud_password = $_GET['Password'];
	$stud_fname = $_GET['Fname'];
	$stud_lname = $_GET['Lname'];
	$stud_phone = $_GET['Phone_Number'];
	$stud_major = $_GET['Major'];
	$stud_location = $_GET['Location'];
	$stud_GPA = $_GET['GPA'];
	$stud_experience = $_GET['Experience'];
	$stud_courses = $_GET['Courses'];
	$stud_year = $_GET['Year'];
	$stud_opp = $_GET['Opportunity_Type'];
	$stud_reloction = $_GET['Relocation'];
	$stud_sponsorship = $_GET['Work_Sponsorship'];

	$sql = "INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship)
	VALUES('" . $stud_email . "', '" . $stud_password . "', '" . $stud_fname . "', '" . $stud_lname . "', '" . $stud_phone . "', '" . $stud_major . "', '" . $stud_location . "', '" . $stud_GPA . "', '" . $stud_experience . "', '" . $stud_courses . "', '" . $stud_year . "', '" . $stud_opp . "', '" . $stud_reloction . "', '" . $stud_sponsorship . "')";

	if (mysqli_query($data_base, $sql)) {
	  echo "New record created successfully!" . "<br>" . "<br>";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
	}

	mysqli_close($data_base);

	?>
Please login <a href = "student_login.php">here</a>

</body>
</html>
