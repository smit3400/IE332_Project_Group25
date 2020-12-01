<?php
session_start();

if ($_SESSION["emp_log"] == 0) {
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

	<!-- Employer page links -->
	<h1>Employer Main Page</h1>
	<p><a href = "employer_profile.php" class = "button1">Profile Page</a></p>
	<p><a href = "employer_opportunities.php" class = "button1">Your Job Postings and Best Candidates</a></p>
	<p><a href = "employer_opportunities_form.php" class = "button1">Post New Job Postings</a></p>
	<p><a href = "employer_student_finder.php" class = "button1">Student Finder</a></p>
	<p><a href = "employer_logout.php" class = "button1">Logout</a></p>
	<br>
	<p><i>Thank you for using IE Connect!</i></p>
</body>
</html>
