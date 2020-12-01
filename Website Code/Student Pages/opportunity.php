<?php
session_start();

// keeping a user from being able to use back button when logging out
if ($_SESSION["log"] == 0) {
  header("Location:  student_login.php");
}

//including database connection to save lines of code
include("new_connection.php")

?>

<!DOCTYPE html>
<html>

<!-- adding css with external file-->
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
	<h1>Job Opportunity</h1>
	<p>Job posting with corresponding opportunity ID</p>

<?php

//pulling opportunity from the jobfinder table
$opportunity_id = $_GET["id"];

//selecting all of the opportunities that go with that company 
$sql = "SELECT O.*, E.Company_Name FROM Opportunities O, Employer E WHERE Opportunity_ID = '$opportunity_id' AND O.Email = E.Email";
$result = mysqli_query($data_base,$sql);

//displaying opportunity in table
if (mysqli_num_rows($result) > 0) {
    echo "<table class = 'center' border = '1'>
    <tr>
    <th>Job ID</th>
    <th>Company Name</th>
    <th>Job Title</th>
    <th>Job Type</th>
    <th>Job Description</th>
    <th>Minimum GPA</th>
    <th>Minimum Year</th>
    <th>Required Major</th>
    <th>Location</th>
    <th>Work Sponsorhip</th>
    <th>Desired Skill</th>
    </tr>
    ";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $row["Opportunity_ID"] . "</td>";
      echo '<td> <a href="company.php?company=' . $row["Company_Name"] . '">' . $row["Company_Name"] . "</a></td>";
      echo "<td>" . $row["Job_Title"] . "</td>";
      echo "<td>" . $row["Opportunity_Type"] . "</td>";
      echo "<td>" . $row["Job_Description"] . "</td>";
      echo "<td>" . $row["Min_GPA"] . "</td>";
      echo "<td>" . $row["Min_Year"] . "</td>";
      echo "<td>" . $row["Required_Major"] . "</td>";
      echo "<td>" . $row["Location"] . "</td>";
      echo "<td>" . $row["Work_Sponsorship"] . "</td>";
      echo "<td>" . $row["Skill"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "No result found";
  }

  echo "</table>";
?>

<?php
mysqli_close($data_base);
?>

<p><a href = "student_jobfinder.php" class = "button1">Back to Job Finder table</a><a href = "student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
