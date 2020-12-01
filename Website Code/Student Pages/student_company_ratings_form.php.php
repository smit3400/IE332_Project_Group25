<?php 
session_start();
//including database connection
include("new_connection.php");

//does not allow student to use back button after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}

$message = "";

//selecting the email that goes with company that student wants to rate
$sql = "SELECT Email FROM Employer WHERE Company_Name = '" . $_GET["company"] . "'";
$result = mysqli_query($data_base,$sql);

while ($row = mysqli_fetch_array($result)) {
    $comp_email = $row["Email"];
}

//pulling ratings values from form
$stud_email = $_SESSION["stud_email"];
$relationship = $_POST["relationship"];
$review = $_POST["review"];
$experience = $_POST["experience"];
$management = $_POST["management"];
$culture = $_POST["culture"];
$diversity = $_POST["diversity"];

$sql = "INSERT INTO Company_Rating( Student_Email, Employer_Email, Company_Relationship, Review, Overall_Rating, Management_Rating, Culture_Rating, Diversity_Rating ) VALUES('$stud_email', '$comp_email', '$relationship', '$review', $experience, $management, $culture, $diversity)";
$result = mysqli_query($data_base,$sql);

if ($result > 0) {
    $message = "<p>The rating and review has been succesfully submitted!</p>
    <p><a href='student_companies.php' class = 'button1'>Go back</a></p>";
}
?>

<!DOCTYPE html>
<html>

<!-- importing css from external file-->
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
<h1>Rate The Company</h1>
<p>Hello! Please enter all relevant information to rate this company.</p>

<!-- ratings form for student to fill out-->

<form action="" method="post">

<p><strong>Company Relationship: </strong><select name="relationship">
<option value="Intern">Intern</option>
<option value="Employed">Employed</option>
</select></p>

<p><strong>Overall Job Experience: </strong><select name="experience">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select></p>

<p><strong>Management: </strong><select name="management">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select></p>

<p><strong>Company Culture: </strong><select name="culture">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select></p>

<p><strong>Diversity: </strong><select name="diversity">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select></p>

<p><strong>Review text:<br>
<textarea name="review"></textarea></p>
<p><input type="submit" class = "button1" value = "Submit rating"></p>
</form>
<!--message for submission-->
<div class="message"><?php if($message!="") { echo $message; } ?></div>

<?php
mysqli_close($data_base);
?>

<p><a href="student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
