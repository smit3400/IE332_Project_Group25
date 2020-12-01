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
	<h1>Company Information</h1>
<div class="comp">

<?php
//pulling opportunity from the jobfinder table
$company_name = $_GET["company"];

//selecting all of the profile information about that company
$sql = "SELECT * FROM Employer WHERE Company_Name = '$company_name'";
$result = mysqli_query($data_base,$sql);

//displaying opportunity in table
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
      echo "<p><b>Company Name: </b>" . $row['Company_Name'] . "</p>";
      echo "<p><b>Description: </b>" . $row["Description"] . "</p>";
      echo "<p><b>Phone Number: </b>" . $row["Phone_Number"] . "</p>";
      echo "<p><b>Industry: </b>" . $row["Industry"] . "</p>";
    }
  } else {
    echo "No result found";
  }
?>
</div>

<div class="opp">
<h2><p>Job Postings</p></h2>

<table>
<?php
//selecting all info about specific opportunity
$sql = "SELECT O.* FROM Opportunities O, Employer E WHERE E.Company_Name = '$company_name' AND O.Email = E.Email";
$result = mysqli_query($data_base,$sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table class = 'center' border = '1'>
  <tr>
  <th>Job Title</th>
  <th>Job Description</th>
  <th>Opportunity Type</th>
  <th>Min GPA</th>
  <th>Min Year</th>
  <th>Required Major</th>
  <th>Location</th>
  <th>Work Sponsorship</th>
  <th>Skill</th>
  </tr>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['Job_Title'] . "</td>";
    echo "<td>" . $row['Job_Description'] . "</td>";
    echo "<td>" . $row['Opportunity_Type'] . "</td>";
    echo "<td>" . $row['Min_GPA'] . "</td>";
    echo "<td>" . $row['Min_Year'] . "</td>";
    echo "<td>" . $row['Required_Major'] . "</td>";
    echo "<td>" . $row['Location'] . "</td>";
    echo "<td>" . $row['Work_Sponsorship'] . "</td>";
    echo "<td>" . $row['Skill'] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<p>No result found</p>";
}

?>
</table>
</div>

<div class="rating">
<h2><p>Ratings</p></h2>
<p><a href="student_company_ratings_form.php?company=<?php echo $company_name; ?>" class = "button1">Rate this company</a></p>

<h3><p>Overall Ratings</p></h3>

<table class = "center" border="1">

<?php
//selecting ratings for specific company
$sql = "SELECT C.* FROM Company_Rating C, Employer E WHERE C.Employer_Email = E.Email AND E.Company_Name = '$company_name'";
$result = mysqli_query($data_base,$sql);

if (mysqli_num_rows($result) > 0) {

$sql = "SELECT AVG(Overall_Rating), AVG(Management_Rating), AVG(Culture_Rating), AVG(Diversity_Rating) FROM Company_Rating C, Employer E WHERE C.Employer_Email = E.Email AND E.Company_Name = '$company_name'";
$result = mysqli_query($data_base,$sql);

  echo "<tr>
  <th>Overall Experience Rating</th>
  <th>Management Rating</th>
  <th>Culture Rating</th>
  <th>Diversity Rating</th>
  </tr>";
while ($row = mysqli_fetch_array($result)){
  echo "<tr>
  <td>" . round($row["AVG(Overall_Rating)"],1) . "</td>
  <td>" . round($row["AVG(Management_Rating)"],1) . "</td>
  <td>" . round($row["AVG(Culture_Rating)"],1) . "</td>
  <td>" . round($row["AVG(Diversity_Rating)"],1) . "</td>
  </tr>";
}
} else {
  echo "<p>No ratings for this company at the moment.</p>";
}

?>
</table>

<h3><p>Individual Ratings</p></h3>

<?php

//selecting individual ratings of company from specific student
$sql = "SELECT C.*, S.Fname, S.Lname FROM Company_Rating C, Employer E, Student S WHERE S.Email = C.Student_Email AND C.Employer_Email = E.Email AND E.Company_Name = '$company_name'";
$result = mysqli_query($data_base,$sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
      echo "<table class = 'center' border='1'>
      <tr>
      <th>Student Name</th>
      <th>Company Relationship</th>
      <th>Overall Experience Rating</th>
      <th>Management Rating</th>
      <th>Culture Rating</th>
      <th>Diversity Rating</th>
      </tr>";
      echo "<tr>
      <td>" . $row["Fname"] . " " . $row["Lname"] ."</td>
      <td>" . $row["Company_Relationship"] . "</td>
      <td>" . $row["Overall_Rating"] . "</td>
      <td>" . $row["Management_Rating"] . "</td>
      <td>" . $row["Culture_Rating"] . "</td>
      <td>" . $row["Diversity_Rating"] . "</td>
      </tr>
      <tr>
      <td colspan='7'>" . $row["Review"] . "</td>
      </tr>
      </table>
      </br>";
  }
} else {
  echo "<p>No reviews for this company at the moment.</p>";
}
?>

</div>

<?php
mysqli_close($data_base);
?>
<p><a href = "student_jobfinder.php" class = "button1">Back to Job Finder table</a><a href = "student_companies.php" class = "button1">Back to Company Ratings table</a><a href = "student_main.php" class = "button1">Main Page</a></p>
</body>
</html>
