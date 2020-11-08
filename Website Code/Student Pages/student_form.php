<!DOCTYPE html>
<html>
<body>

<h1>Student Profile Setup</h1>
<p>Welcome! Please enter all relevant information to create your student profile page.</p>

</body>

<form method="post" action="#">
	<label for="img">Select profile image:</label>
	<input type="file" id="img" name="img" accept="image/*">
	<div>&nbsp;
	
	<div class="form-group"><label for="Email">Email Address</label> <input id="Email" class="form-control" type="email" placeholder="Enter email" aria-describedby="Email" />
	<div>&nbsp;
	
	<div class="form-group"><label for="Password">Password</label> <input id="Password" class="form-control" type="password" placeholder="Enter password" aria-describedby="Password" />
	<div>&nbsp;
	
	<div class="form-group"><label for="Fname">First Name</label> <input id="Fname" class="form-control" type="text" placeholder="Enter first name" aria-describedby="Fname" />
	<div>&nbsp;
  
	<div class="form-group"><label for="Lname">Last Name</label> <input id="Lname" class="form-control" type="text" placeholder="Enter last name" aria-describedby="Lname" />
	<div>&nbsp;

	<div class="form-group"><label for="Phone_Number">Phone Number (area code first) </label> <input id="Phone_Number" class="form-control" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" />
	<div>&nbsp;
  
	<div class="form-group"><label for="Major">Major</label>
		<select id="Major" class="form-control">
		<option>FYE</option>
		<option>IE</option>
		</select>
	<div>&nbsp;
  
	<div class="form-group"><label for="Location">Location Preference </label>
	<select id="Location" class="form-control">
		<option>Northeast</option>
		<option>South</option>
		<option>Midwest</option>
		<option>West</option>
	</select>
	<div>&nbsp;
  
	<div class="form-group"><label for="GPA">GPA </label> <input id="GPA" class="form-control" type="text" placeholder="Enter GPA" />
	<div>&nbsp;
  
	<div class="form-group"><label for="Experience">Technical Skills (no commas, e.g. python CAD java)</label> <input id="Experience" class="form-control" type="text" placeholder="Enter experience" />
	<div>&nbsp;
  
	<div class="form-group"><label for="Courses">Courses (only relevant to IE and/or FYE, no commas, e.g. IE230 IE343 IE270)</label> <input id="Courses" class="form-control" type="text" placeholder="Enter courses" />
	<div>&nbsp;
  
	<div class="form-group"><label for="Year">Year (1,2,3, etc.)</label> <input id="Year" class="form-control" type="text" placeholder="Enter year" />
	<div>&nbsp;  

	<div class="form-group"><label for="Opportunity_Type">Oportunity Type </label>
	<select id="Opportunity_Type" class="form-control">
		<option>Internship</option>
		<option>Co-op</option>
		<option>Full Time</option>
	</select>
	<div>&nbsp;

	<div class="form-group"><label for="Relocation">Willing to relocate? </label>
	<select id="Relocation" class="form-control">
		<option>Yes</option>
		<option>No</option>
	</select>
	<div>&nbsp;

	<div class="form-group"><label for="Work_Sponsorship">Will you now or in the future require visa sponsorship for employment? </label>
	<select id="Work_Sponsorship" class="form-control">
		<option>Yes</option>
		<option>No</option>
	</select> 
	<div>&nbsp;

	<input type="submit" value="Create Account" />

</form>

<?php
session_start();
include 'new_connection.php';
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
$query = "INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship) VALUES ('".$Email."', '".$Password."', '".$Fname."', '".$Lname."', '".$Phone_Number."', '".$Major."', '".$Location."', '".$GPA."', '".$Experience."', '".$Courses."', '".$Year."', '".$Opportunity_Type."', '".$Relocation."', '".$Work_Sponsorship."')";
$result = mysqli_query($data_base,$query)or die ('Error in updating Database');
}

?>

</html>
