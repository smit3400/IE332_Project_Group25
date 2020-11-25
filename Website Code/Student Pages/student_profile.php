<?php
session_start();
include("new_connection.php");
?>

<!DOCTYPE html>
<html>
<body>

<?php

$sql = "SELECT * FROM Student WHERE Email='" . $_SESSION["stud_email"] . "'";
$result = mysqli_query($data_base,$sql);

while ($row = mysqli_fetch_array($result)) {
	printf ("<br>%s %s <br><br>", $row["Fname"], $row["Lname"]);
	printf ("Contact Information: <br> %s <br> %s <br><br>", $row["Email"], $row["Phone_Number"]);
	printf ("Major: <br> %s <br><br>", $row["Major"]);
	printf ("GPA: <br> %s <br><br>", $row["GPA"]);
	printf ("Technical Skills: <br> %s <br><br>", $row["Experience"]);
	printf ("Coursework: <br> %s <br><br>", $row["Courses"]);
	printf ("Year in school: <br> %s <br><br>", $row["Year"]); 
	printf ("Seeking %s opportunity <br><br>", $row["Opportunity_Type"]);
	printf ("Willing to relocate? <br> %s <br><br>", $row["Relocation"]);
	printf ("Location preference: <br> %s <br><br>", $row["Location"]);
	printf ("Visa sponsorship? (yes/no) <br> %s <br><br>", $row["Work_Sponsorship"]);
}
?>

<p>
<a href = "student_update.php">Update Profile</a>
</p>

</body>
</html>
