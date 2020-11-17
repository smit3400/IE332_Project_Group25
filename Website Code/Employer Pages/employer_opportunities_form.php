<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<h1>Job Posting Setup</h1>
<p>Welcome! Please enter all relevant information to create your job posting.</p>
<section><form action="employer_opportunities_form_submit.php" method="get">Job Title: <input name="job_title" type="text" /></form></section>
<section><br /> Job Description: <input name="job_description" type="text" /></section>
<section><br /> Opportunity Type:<select name="opportunity_type">
<option value="Internship">Internship</option>
<option value="Co-op">Co-op</option>
<option value="Full Time">Full Time</option>
</select></section>
<section><br /> Min GPA: <input name="min_gpa" type="number" /></section>
<section><br /> Min Year: <input name="min_year" type="number" /></section>
<section><br /> Major:<select name="major">
<option value="FYE">FYE</option>
<option value="IE">IE</option>
</select></section>
<section><br /> Location:<select name="location">
<option value="West">West</option>
<option value="Midwest">Midwest</option>
<option value="South">South</option>
<option value="Northeast">Northeast</option>
</select></section>
<section><br /> Work Sponsorship:<select name="work_sponsorship">
<option value="Yes">Yes</option>
<option value="No">No</option>
</select></section>
<section><br /> Desired Skill:<select name="skill">
<option value="Statistics">Statistics</option>
<option value="Programming">Programming</option>
<option value="Technical Design">Technical Design</option>
</select></section>
<section><br /> <input type="submit" /></section>
</form>
</body>  
</html>
