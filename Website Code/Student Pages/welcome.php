<!DOCTYPE html>
<html>

<!-- importing external css file-->

<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="studentForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <header class="h1">
      <div class="left-side">
        <img class="banner3" src="https://www.cco.purdue.edu/Content/Layout/logo.svg" style= "width:250px">
        <hr class="divider">
        <div class="page-title">
          <p class="title-main">IE Connect</p>
          <p class="title">Simplifying the recruiting process</p>
        </div>
      </div>
      <img class="banner1" src="https://cdn.shopify.com/s/files/1/0241/9737/products/1008-PUR-Tank-black_2_1800x.jpg?v=1571442802" style= "width:100px">
    </header>

	<h1>Welcome <?php echo $_POST["Fname"]; ?></h1>
	<p>Your email address is: <?php echo $_POST["Email"]; ?></p>
	
	<?php

	if ($_POST["Email"] == "") {
		header("Location:  student_login.php");
	}

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
	
	//pulling variable values from student form

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
	
	
	//checking if an email already exists in the data base
	$check = mysqli_query($data_base, "SELECT * FROM Student WHERE Email = '$stud_email'");
	if(mysqli_num_rows($check) > 0){
		echo "This account already exists!" . "<br>" . "<br>";
	}else{
		//inserting all of student information into database
		$sql = "INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship)
		VALUES('" . $stud_email . "', '" . $stud_password . "', '" . $stud_fname . "', '" . $stud_lname . "', '" . $stud_phone . "', '" . $stud_major . "', '" . $stud_location . "', '" . $stud_GPA . "', '" . $stud_experience . "', '" . $stud_courses . "', '" . $stud_year . "', '" . $stud_opp . "', '" . $stud_reloction . "', '" . $stud_sponsorship . "')";
	
		//sending student to logging in
		if (mysqli_query($data_base, $sql)) {
			echo "<p>Please login below to see your account!</p>";
			shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchingInputs.R");
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
		}
	}
	mysqli_close($data_base);

	?>
<p><a href = "student_login.php" class = "button1">Login Page</a></p>
</body>
</html>
