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
$sql = "SELECT * FROM Purdue_IE WHERE Email='" . $_SESSION["email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
    printf("Select returned %d rows. <br><br>", mysqli_num_rows($result));
    /* free result set */
    while ($row=mysqli_fetch_row($result))
    {
    	$IE_email = $row[0];
	    $IE_fname = $row[2];
	    $IE_lname =  $row[3];
    }
	  // Free result set
	  //mysqli_free_result($result);
}
printf ("IE Email:<br>%s <br><br>", $IE_email);
printf ("First Name:<br>%s <br><br>", $IE_fname);
printf ("Last Name:<br>%s <br><br>", $IE_lname);
?>

<!DOCTYPE html>
<html>
<body>

<p><a href = "IE_main.php">Main Page</a></p>
</body>
</html>