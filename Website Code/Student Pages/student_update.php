<?php
session_start();
include("new_connection.php");
?>

<!DOCTYPE html>
<html>
<body>

<h1>Student Profile Update</h1>
<p>Please enter all relevant information you would like to update.</p>

<?php
$query = "SELECT * FROM Student WHERE Email = '" .$_SESSION["stud_email"]. "'";
$result = mysqli_query($data_base,$query);

if (mysqli_num_rows($result) > 0) {
?>

<form action = "update.php" method="post">
	
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
	Email Address: <input type = "email" name = "Email" value = "<?php echo $row["Email"]; ?>" Required>
	<br/>
	<br/>
	Password: <input type = "password" name = "Password" value = "<?php echo $row["Password"]; ?>" Required>
	<br/>
	<br/>
	First Name: <input type = "text" name = "Fname" value = "<?php echo $row["Fname"]; ?>" Required>
	<br/>
	<br/>
	Last Name: <input type = "text" name = "Lname" value = "<?php echo $row["Lname"]; ?>" Required>
	<br/>
	<br/>
	Phone Number (area code first): <input type = "number" name = "Phone_Number" value = "<?php echo $row["Phone_Number"]; ?>" Required>
	<br/>
	<br/>
	Major:
	<select type = "text" name="Major">
		<option <?php if ($row["Major"] == "FYE") {echo "selected";} ?>>FYE</option>
		<option <?php if ($row["Major"] == "IE") {echo "selected";} ?>>IE</option>
	</select>
	<br/>
	<br/>
	Location Preference: 
	<select type = "text" name = "Location" value = "<?php echo $row["Location"]; ?>">
		<option <?php if ($row["Location"] == "Northeast") {echo "selected";} ?>>Northeast</option>
		<option <?php if ($row["Location"] == "South") {echo "selected";} ?>>South</option>
		<option <?php if ($row["Location"] == "Midwest") {echo "selected";} ?>>Midwest</option>
		<option <?php if ($row["Location"] == "West") {echo "selected";} ?>>West</option>
	</select>
	<br/>
	<br/>
	GPA: <input type="text" name = "GPA" placeholder="Enter GPA" value = "<?php echo $row["GPA"]; ?>" Required>
	<br/>
	<br/>
	Technical Skills (no commas, e.g. python CAD java): <input type = "text" name = "Experience" value = "<?php echo $row["Experience"]; ?>" Required>
	<br/>
	<br/>
	Courses (only relevant to IE and/or FYE, no commas, e.g. IE230 IE343 IE270): <input type="text" name = "Courses" value = "<?php echo $row["Courses"]; ?>" Required>
	<br/>
	<br/>
	Year (1,2,3, etc.): <input type="text" name = "Year" value = "<?php echo $row["Year"]; ?>" Required>
	<br/>
	<br/>
	Oportunity Type:
	<select type = "text" name = "Opportunity_Type" value = "<?php echo $row["Opportunity Type"]; ?>">
		<option <?php if ($row["Opportunity_Type"] == "Internship") {echo "selected";} ?>>Internship</option>
		<option <?php if ($row["Opportunity_Type"] == "Co-Op") {echo "selected";} ?>>Co-Op</option>
		<option <?php if ($row["Opportunity_Type"] == "Full Time") {echo "selected";} ?>>Full Time</option>
	</select>
	<br/>
	<br/>
	Willing to relocate?
	<select type = "text" name = "Relocation" value = "<?php echo $row["Relocation"]; ?>">
		<option <?php if ($row["Relocation"] == "Yes") {echo "selected";} ?>>Yes</option>
		<option <?php if ($row["Relocation"] == "No") {echo "selected";} ?>>No</option>
	</select>
	<br/>
	<br/>
	Will you now or in the future require visa sponsorship for employment?
	<select type = "text" name = "Work_Sponsorship" value = "<?php echo $row["Work_Sponsorship"]; ?>">
		<option <?php if ($row["Work_Sponsorship"] == "Yes") {echo "selected";} ?>>Yes</option>
		<option <?php if ($row["Work_Sponsorship"] == "No") {echo "selected";} ?>>No</option>
	</select> 
	<br/>
	<br/>
	<input type="submit" value="Update Account" />
</form>

<?php
    }
}

mysqli_close($data_base);
?>

</body>
</html>