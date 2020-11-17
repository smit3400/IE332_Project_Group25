<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
	printf ("<br>%s %s <br><br>", $_SESSION["fname"], $_SESSION["lname"]);
	printf ("Contact Information: <br> %s <br> %s <br><br>", $_SESSION["email"], $_SESSION["number"]);
	printf ("Major: <br> %s <br><br>", $_SESSION["major"]);
	printf ("GPA: <br> %s <br><br>", $_SESSION["gpa"]);
	printf ("Technical Skills: <br> %s <br><br>", $_SESSION["skills"]);
	printf ("Coursework: <br> %s <br><br>", $_SESSION["courses"]);
	printf ("Year in school: <br> %s <br><br>", $_SESSION["year"]); 
	printf ("Seeking %s opportunity <br><br>", $_SESSION["oppor"]);
	printf ("Willing to relocate? <br> %s <br><br>", $_SESSION["relocate"]);
	printf ("Location preference: <br> %s <br><br>", $_SESSION["location"]);
	printf ("Visa sponsorship? (yes/no) <br> %s <br><br>", $_SESSION["visa"]);
	printf ($_SESSION["gpa"]);
?>

</body>
</html>
