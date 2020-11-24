<?php
session_start();

//Connecting to database
$servername = "mydb.itap.purdue.edu";
$username = "g1116905";
$password = "iegroup25";
$dbname = "g1116905";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{
	echo "Connected Successfully!" . "<br>";
}

//Pulling info from sql
$sql = "SELECT * FROM Employer WHERE Email='" . $_SESSION["email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
    printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
    /* free result set */
    while ($row=mysqli_fetch_row($result))
    {
    	$employer_email = $row[0];
	    $employer_name = $row[2];
	    $employer_phone =  $row[3];
	    $employer_description =  $row[4];
	    $employer_industry =  $row[5];
    }
	  // Free result set
	  //mysqli_free_result($result);
}
printf ("Employer Name:<br>%s <br><br>", $employer_name);
printf ("Phone Number:<br>%s <br><br>", $employer_phone);
printf ("Email:<br>%s <br><br>", $employer_email);
printf ("Description:<br>%s <br><br>", $employer_description);
printf ("Industry:<br>%s <br><br>", $employer_industry);
?>

<!DOCTYPE html>
<html>
<body>

<p><a href = "employer_main.php">Main Page</a></p>
</body>
</html>