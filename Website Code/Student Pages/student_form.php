<!DOCTYPE html>
<html>
<body>

<h1>Student Profile Setup</h1>
<p>Welcome! Please enter all relevant information to create your student profile page.</p>


<form action = "welcome.php" method="post">
	
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
	Phone Number (area code first): <input type = "number" name = "Phone_Number" placeholder = "1234567890" Required>
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
	<br/>
	<br/>
	Year (1,2,3, etc.): <input type="text" name = "Year" placeholder="Enter year" Required>
	<br/>
	<br/>
	Oportunity Type:
	<select type = "text" name = "Opportunity_Type">
		<option>internship</option>
		<option>co-op</option>
		<option>full Time</option>
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

</body>
</html>
