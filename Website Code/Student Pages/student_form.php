<!DOCTYPE html>
<html>
<body>

<h1>Student Profile Setup</h1>
<p>Welcome! Please enter all relevant information to create your student profile page.</p>

</body>

<?php
include "new_connection.php"; // use database connection

if (isset($_POST['submit'])) {
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];
	$Fname = $_POST['Fname'];
	$Lname = $_POST['Lname'];
	$Phone_Number = $_POST['Phone_Number'];
	$Major = $_POST['Major'];
	$Location = $_POST['Location'];
	$GPA = $_POST['GPA'];
	$Experience = $_POST['Experience'];
	$Courses = $_POST['Courses'];
	$Year = $_POST['Year'];
	$Opportunity_Type = $_POST['Opportunity_Type'];
	$Relocation = $_POST['Relocation'];
	$Work_Sponsorship = $_POST['Work_Sponsorship'];

	$insert = mysqli_query($data_base, "INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship) VALUES ('$Email', '$Password', '$Fname', '$Lname', '$Phone_Number', '$Major', '$Location', '$GPA', '$Experience', '$Courses', '$Year', '$Opportunity_Type', '$Relocation', '$Work_Sponsorship')");

	if(!$insert){
		echo mysqli_error();
	}
	else{
		echo "Records added successfully!";
	}
}
mysqli_close($data_base); //close connection
?>

<form method="POST">
	
	Email Address: <input type = "email" name = "Email" placeholder = "Enter email address" Required>
	<br/>
	<br/>
	Password: <input type = "password" name = "Password" placeholder = "Enter password" Required>
	<br/>
	<br/>
	First Name: <input type = "text" name = "Fname" placeholder = "Enter first name" Required>
	<br/>
	<br/>
	Last Name: <input type = "text" name = "Lname" placeholder = "Enter last name" Required>
	<br/>
	<br/>
	Phone Number (area code first): <input type = "tel" pattern = "[0-9]{3}[0-9]{3}[0-9]{4}" placeholder = "1234567890" Required>
	<br/>
	<br/>
	Major:
	<select type = "text" name="Major">
		<option>FYE</option>
		<option>IE</option>
	</select>
	<br/>
	<br/>
	Location Preference: 
	<select type = "text" name = "Location">
		<option>Northeast</option>
		<option>South</option>
		<option>Midwest</option>
		<option>West</option>
	</select>
	<br/>
	<br/>
	GPA: <input type="text" name = "GPA" placeholder="Enter GPA" Required>
	<br/>
	<br/>
	Technical Skills (no commas, e.g. python CAD java): <input type = "text" name = "Experience" placeholder="Enter technical skills" Required>
	<br/>
	<br/>
	Courses (only relevant to IE and/or FYE, no commas, e.g. IE230 IE343 IE270): <input type="text" name = "Courses" placeholder="Enter courses" Required>
	<div>&nbsp;
	<br/>
	<br/>
	Year (1,2,3, etc.): <input type="text" name = "Year" placeholder="Enter year" Required>
	<br/>
	<br/>
	Oportunity Type:
	<select type = "text" name = "Opportunity_Type">
		<option>Internship</option>
		<option>Co-op</option>
		<option>Full Time</option>
	</select>
	<br/>
	<br/>
	Willing to relocate?
	<select type = "text" name = "Relocation">
		<option>Yes</option>
		<option>No</option>
	</select>
	<br/>
	<br/>
	Will you now or in the future require visa sponsorship for employment?
	<select type = "text" name = "Work_Sponsorship">
		<option>Yes</option>
		<option>No</option>
	</select> 
	<br/>
	<br/>
	<input type="submit" value="Create Account" />
</form>
</html>
