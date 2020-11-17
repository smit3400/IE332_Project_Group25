<!DOCTYPE html>
<html>
<body>

	Welcome <?php echo $_POST["Fname"]; ?>!<br>
	
	<?php

	//Connecting to database
	$servername = "mydb.itap.purdue.edu";
	$username = "g1116905";
	$password = "iegroup25";
	$dbname = "g1116905";

	$data_base = mysqli_connect($servername, $username, $password, $dbname);

	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
	$stud_email = $_POST['Email'];
	$stud_password = $_POST['Password'];
	$stud_fname = $_POST['Fname'];
	$stud_lname = $_POST['Lname'];
	$stud_phone = $_POST['Phone_Number'];
	$stud_major = $_POST['Major'];
	$stud_location = $_POST['Location'];
	$stud_GPA = $_POST['GPA'];
	$stud_experience = $_POST['Experience'];
	$stud_courses = $_POST['Courses'];
	$stud_year = $_POST['Year'];
	$stud_opp = $_POST['Opportunity_Type'];
	$stud_reloction = $_POST['Relocation'];
	$stud_sponsorship = $_POST['Work_Sponsorship'];

	$check = mysqli_query($data_base, "SELECT * FROM Student WHERE Email = '$stud_email'");
	if(mysqli_num_rows($check) > 0){
		echo "This account already exists!" . "<br>" . "<br>";
	}else{
		echo "Inserting Data...". "<br>";

		$sql = "INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship)
		VALUES('" . $stud_email . "', '" . $stud_password . "', '" . $stud_fname . "', '" . $stud_lname . "', '" . $stud_phone . "', '" . $stud_major . "', '" . $stud_location . "', '" . $stud_GPA . "', '" . $stud_experience . "', '" . $stud_courses . "', '" . $stud_year . "', '" . $stud_opp . "', '" . $stud_reloction . "', '" . $stud_sponsorship . "')";

		if (mysqli_query($data_base, $sql)) {
			echo "New record created successfully!" . "<br>" . "<br>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
		}
	}
	mysqli_close($data_base);

	?>
Please login <a href = "student_login.php">here</a>

</body>
</html>
