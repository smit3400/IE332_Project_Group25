<?php
session_start();


if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
}

include("new_connection.php")

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
	<h1>Student Information</h1>
<div class="comp">

<?php
//Setting student email variable from link
$stud_email = $_GET["email"];

//Pulling student informaiton from SQL table
$sql = "SELECT * FROM Student WHERE Email = '$stud_email'";
$result = mysqli_query($data_base,$sql);
$rows = mysqli_num_rows($result);

//Displaying student information from table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      echo "<p><b>Name: </b>" . $row["Fname"] . "</p>";
      echo "<p><b>Email: </b>" . $row['Email'] . "</p>";
      echo "<p><b>Phone Number: </b>" . $row["Phone_Number"] . "</p>";
      echo "<p><b>Major: </b>" . $row["Major"] . "</p>";
	  echo "<p><b>GPA: </b>" . $row["GPA"] . "</p>";
	  echo "<p><b>Year in school: </b>" . $row["Year"] . "</p>";
	  echo "<p><b>Coursework </b>" . $row["Courses"] . "</p>";
	  echo "<p><b>Willing to relocate? </b>" . $row["Relocation"] . "</p>";
	  echo "<p><b>Location Preference </b>" . $row["Location"] . "</p>";
	  echo "<p><b>Visa sponsorship needed? </b>" . $row["Work_Sponsorship"] . "</p>";
	  
    }
  } else {
    echo "<p>No result found</p>";
  }
?>

<p><a href = "employer_student_finder.php" class = "button1">Back to Students Table</a><a href = "employer_main.php" class = "button1">Main Page</a></p>

</body>
</html>
