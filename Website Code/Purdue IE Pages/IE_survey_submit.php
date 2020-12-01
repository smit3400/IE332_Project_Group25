<!DOCTYPE html>
<html>

<!-- calling in css external file-->

<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="advisorForm.css" rel="stylesheet" type="text/css" />
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

	<h1>Survey Closed</h1>
	
	<?php

	if ($_POST["email"] == "") {
		echo "<p><b>You have not submitted any survey.<br>If you received an email, follow that link and complete the survey.</b></p>";
	} else {

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

	//pulling values from student or employer survey

	$email = $_POST["email"];
	$survey_answer = $_POST["survey_answer"];
	
	$result = mysqli_query($data_base,"SELECT Student.Email, Employer.Email FROM Student, Employer WHERE Student.Email='" . $_POST["email"] . "' OR Employer.Email='" . $_POST["email"] . "'");
	$count  = mysqli_num_rows($result);
	
	//checking if these emails exist in either Student or Employer table
	if($count==0) {
    echo "<p><b>This email does not exist! Try again later.</p></b>";
	} else {
		//inserting feedback from student or employer into feedback table in database
		$sql = "INSERT INTO Feedback(Email, Feedback_Text)
		VALUES('" . $email . "', '" . $survey_answer . "')";

		if (mysqli_query($data_base, $sql)) {
			echo "<p><b>Survey submitted successfully! Thank you for your time.</b></p>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
		}
	}
	}
	mysqli_close($data_base);

	?>
</body>
</html>
