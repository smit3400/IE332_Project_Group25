<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
	<h1>Opporunity Setup</h1>
	<p>Welcome! Please enter all relevant information to create your opportunity</p>
	<form action="employer_opportunities_form_submit.php" method="get">
	Job Title: <input type="text" name="job_title"><br>
	Job Description: <input type="text" name="job_description"><br>
	Opporunity Type:  
	<select name = "opportunity_type">
	  <option value="Internship">Internship</option>
	  <option value="Co-op">Co-op</option>
	  <option value="Full Time">Full Time</option>
	</select><br>
	Min GPA: <input type="number" name="min_gpa"><br>
	Min Year: <input type="number" name="min_year"><br>
	Major:  
	<select name = "major">
	  <option value="FYE">FYE</option>
	  <option value="IE">IE</option>
	</select><br>
	Location:  
	<select name = "location">
	  <option value="West">West</option>
	  <option value="Midwest">Midwest</option>
	  <option value="South">South</option>
	  <option value="Northeast">Northeast</option>
	</select><br>
	Work Sponsorship:  
	<select name = "work_sponsorship">
	  <option value="Yes">Yes</option>
	  <option value="No">No</option>
	</select><br>
	Desired Skill:  
	<select name = "skill">
	  <option value="Statistics">Statistics</option>
	  <option value="Programming">Programming</option>
	  <option value="Technical Design">Technical Design</option>
	</select><br>
	<input type="submit">
</form>
</body>  
</html>
