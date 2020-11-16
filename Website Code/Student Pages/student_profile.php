<!DOCTYPE html>
<html>
<body>

<?php
session_start();

$servername = "mydb.itap.purdue.edu";
$username = "g1116905";
$password = "iegroup25";
$dbname = "g1116905";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stud_email = $_GET['Email'];
$stud_password = $_GET['Password'];

$sql = "SELECT * FROM Student WHERE Email = '$stud_email' AND Password = '$stud_password'";
if ($result = mysqli_query($data_base,$sql)) {

    while ($row=mysqli_fetch_row($result))
    {
		printf ("<br>%s %s <br><br>", $row[2], $row[3]);
		printf ("Contact Information: <br> %s <br> %s <br><br>", $row[0], $row[4]);
		printf ("Major: <br> %s <br><br>", $row[5]);
		printf ("GPA: <br> %s <br><br>", $row[7]);
		printf ("Technical Skills: <br> %s <br><br>", $row[8]);
		printf ("Coursework: <br> %s <br><br>", $row[9]);
		printf ("Year in school: <br> %s <br><br>", $row[10]); 
		printf ("Seeking %s opportunity <br><br>", $row[11]);
		printf ("Willing to relocate? <br> %s <br><br>", $row[12]);
		printf ("Location preference: <br> %s <br><br>", $row[6]);
		printf ("Visa sponsorship? (yes/no) <br> %s <br><br>", $row[13]);
		
    }

}

mysqli_close($data_base);
?>

</body>
</html>
