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
	
	<h1>Create a Job Posting</h1>
	<p>Welcome! Please enter all relevant information to create your job posting.</p>
	
	<!-- Opportunities Form -->
	<form action="employer_opportunities_form_submit.php" method="get">
	<p><strong>Job Title: </strong><input type="text" name="job_title" placeholder = "Enter job title"></p>
	<p><strong>Job Description: </strong><input type="text" name="job_description" placeholder = "Enter job description"></p>
	<p><strong>Job Type:</strong>  
	<select name = "opportunity_type">
	  <option value="Internship">Internship</option>
	  <option value="Co-op">Co-op</option>
	  <option value="Full Time">Full Time</option>
	</select></p>
	<p><strong>Minimum GPA: </strong><input type="text" name="min_gpa" placeholder = "Enter minimum GPA"></p>
	<p><strong>Minimum Year in School: </strong><input type="number" name="min_year" placeholder = "Enter minimum year"></p>
	<p><strong>Major:</strong>
	<select name = "major">
	  <option value="FYE">FYE</option>
	  <option value="IE">IE</option>
	</select></p>
	<p><strong>Location:</strong> 
	<select name = "location">
	  <option value="West">West</option>
	  <option value="Midwest">Midwest</option>
	  <option value="South">South</option>
	  <option value="Northeast">Northeast</option>
	</select></p>
	<p><strong>Work Sponsorship: Available</strong>  
	<select name = "work_sponsorship">
	  <option value="Yes">Yes</option>
	  <option value="No">No</option>
	</select></p>
	<p><strong>Desired Skill:</strong>  
	<select name = "skill">
	  <option value="Statistics">Statistics</option>
	  <option value="Programming">Programming</option>
	  <option value="Technical Design">Technical Design</option>
	</select></p>
	<p><input type="submit" class = "button1" value = "Submit Posting"></p>
	</form>
	<p><a href="employer_main.php" class = "button1">Main Page</a></p>
</body>  
</html>
