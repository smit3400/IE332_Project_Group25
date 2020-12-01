<?php
session_start();

if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
}

if ($_GET["job_title"] == "") {
	header("Location:  employer_login.php");
}

?>

<!DOCTYPE html>
<html>
<!-- CSS connection -->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employerForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <!-- Website header -->
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
  <p>Submitting job  <?php echo $_GET["job_title"]; ?></p>
  
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

  //Pulling data from form submission
  $type = $_GET["opportunity_type"];
  $gpa = $_GET["min_gpa"];
  $year = $_GET["min_year"];
  $major = $_GET["major"];
  $title = $_GET["job_title"];
  $description = $_GET["job_description"];
  $location = $_GET["location"];
  $sponsorship = $_GET["work_sponsorship"];
  $skill = $_GET["skill"];

  //Inserting data into SQL table
  $sql = "INSERT INTO Opportunities(Email, Opportunity_Type, Min_GPA, Min_Year, Required_Major, Job_Title, Job_Description, Location, Work_Sponsorship, Skill)
  VALUES('" . $_SESSION["email"] . "', '" . $type . "', '" . $gpa . "', '" . $year . "', '" . $major . "', '" . $title . "', '" . $description . "', '" . $location . "', '" . $sponsorship . "', '" . $skill . "')";

  if (mysqli_query($data_base, $sql)) {
    echo "<p>New job opportunity created successfully</p>";
    shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchingInputs.R");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
  }

  //Closing connection
  mysqli_close($data_base);

  ?>
  <p><a href = "employer_main.php" class = "button1">Main Page</a></p>

</body>
</html>
