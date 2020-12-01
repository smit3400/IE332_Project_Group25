<?php
session_start();
include("new_connection.php");

//does not allow back arrow to be used after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
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

<h1>Student Profile Update</h1>
<p>Please enter all relevant information you would like to update.</p>

<?php
//pulling student data from database
$query = "SELECT * FROM Student WHERE Email = '" .$_SESSION["stud_email"]. "'";
$result = mysqli_query($data_base,$query);

if (mysqli_num_rows($result) > 0) {
?>

<form action = "update.php" method="post">
	
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
	<!-- allows student to add new information in-->
	<p><strong>Email Address: </strong><input type = "email" name = "Email" value = "<?php echo $row["Email"]; ?>" Required></p>
	<p><strong>Password: </strong><input type = "password" name = "Password" value = "<?php echo $row["Password"]; ?>" Required></p>
	<p><strong>First Name: </strong><input type = "text" name = "Fname" value = "<?php echo $row["Fname"]; ?>" Required></p>
	<p><strong>Last Name: </strong><input type = "text" name = "Lname" value = "<?php echo $row["Lname"]; ?>" Required></p>
	<p><strong>Phone Number (area code first): </strong><input type = "number" name = "Phone_Number" value = "<?php echo $row["Phone_Number"]; ?>" Required></p>
	<p><strong>Major:</strong>
	<select type = "text" name="Major">
		<option <?php if ($row["Major"] == "FYE") {echo "selected";} ?>>FYE</option>
		<option <?php if ($row["Major"] == "IE") {echo "selected";} ?>>IE</option>
	</select></p>
	<p><strong>Location Preference:</strong>
	<select type = "text" name = "Location" value = "<?php echo $row["Location"]; ?>">
		<option <?php if ($row["Location"] == "Northeast") {echo "selected";} ?>>Northeast</option>
		<option <?php if ($row["Location"] == "South") {echo "selected";} ?>>South</option>
		<option <?php if ($row["Location"] == "Midwest") {echo "selected";} ?>>Midwest</option>
		<option <?php if ($row["Location"] == "West") {echo "selected";} ?>>West</option>
	</select></p>
	<p><strong>GPA: </strong><input type="text" name = "GPA" placeholder="Enter GPA" value = "<?php echo $row["GPA"]; ?>" Required></p>
	<p><strong>Technical Skills (no commas, e.g. python CAD java): </strong><input type = "text" name = "Experience" value = "<?php echo $row["Experience"]; ?>" Required></p>
	<p><strong>Courses (only relevant to IE and/or FYE, no commas, e.g. IE230 IE343 IE270): </strong><input type="text" name = "Courses" value = "<?php echo $row["Courses"]; ?>" Required></p>
	<p><strong>Year (1, 2, 3, etc.): </strong><input type="text" name = "Year" value = "<?php echo $row["Year"]; ?>" Required></p>
	<p><strong>Oportunity Type:</strong>
	<select type = "text" name = "Opportunity_Type" value = "<?php echo $row["Opportunity Type"]; ?>">
		<option <?php if ($row["Opportunity_Type"] == "Internship") {echo "selected";} ?>>Internship</option>
		<option <?php if ($row["Opportunity_Type"] == "Co-Op") {echo "selected";} ?>>Co-Op</option>
		<option <?php if ($row["Opportunity_Type"] == "Full Time") {echo "selected";} ?>>Full Time</option>
	</select></p>
	<p><strong>Willing to relocate?</strong>
	<select type = "text" name = "Relocation" value = "<?php echo $row["Relocation"]; ?>">
		<option <?php if ($row["Relocation"] == "Yes") {echo "selected";} ?>>Yes</option>
		<option <?php if ($row["Relocation"] == "No") {echo "selected";} ?>>No</option>
	</select></p>
	<p><strong>Will you now or in the future require visa sponsorship for employment?</strong>
	<select type = "text" name = "Work_Sponsorship" value = "<?php echo $row["Work_Sponsorship"]; ?>">
		<option <?php if ($row["Work_Sponsorship"] == "Yes") {echo "selected";} ?>>Yes</option>
		<option <?php if ($row["Work_Sponsorship"] == "No") {echo "selected";} ?>>No</option>
	</select></p>
	<p><input type="submit" class = "button1" value="Update Account" /></p>
</form>

<?php
	}
}
mysqli_close($data_base);
?>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</body>
</html>
