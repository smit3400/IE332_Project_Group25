<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
  Submitting job  <?php echo $_GET["job_title"]; ?><br>
  Your email address is: <?php echo $_SESSION["email"]; ?> <br>
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

  $type = $_GET["opportunity_type"];
  $gpa = $_GET["min_gpa"];
  $year = $_GET["min_year"];
  $major = $_GET["major"];
  $title = $_GET["job_title"];
  $description = $_GET["job_description"];
  $location = $_GET["location"];
  $sponsorship = $_GET["work_sponsorship"];
  $skill = $_GET["skill"];

  $sql = "INSERT INTO Opportunities(Email, Opportunity_Type, Min_GPA, Min_Year, Required_Major, Job_Title, Job_Description, Location, Work_Sponsorship, Skill)
  VALUES('" . $_SESSION["email"] . "', '" . $type . "', '" . $gpa . "', '" . $year . "', '" . $major . "', '" . $title . "', '" . $description . "', '" . $location . "', '" . $sponsorship . "', '" . $skill . "')";

  if (mysqli_query($data_base, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
  }

  mysqli_close($data_base);

  ?>
  <p><a href = "employer_main.php">Main Page</a></p>

</body>
</html>