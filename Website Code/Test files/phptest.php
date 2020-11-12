<!DOCTYPE html>
<html>
<body>
	<h1>
		Html text is being displayed
	</h1>

<?php
echo "Php text is being displayed" . "<br>";
// Prints the day
echo date("l") . "<br>";

echo "database connection testing" . "<br>" . "<br>";
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

$sql = "SELECT * FROM Student";
if ($result = mysqli_query($data_base,$sql)) {
    printf("Select returned %d rows. <br>", mysqli_num_rows($result));
    /* free result set */
    while ($row=mysqli_fetch_row($result))
    {
	    printf ("%s %s %s <br>", $row[0], $row[1], $row[2]);
    }
	  // Free result set
	  //mysqli_free_result($result);
}
echo "<br>" . "Inserting Data Test". "<br>" . "<br>";

$advisoremail = 'advisor2@purdue.edu';

$sql = "INSERT INTO Purdue_IE (Email, Password, Fname, Lname)
VALUES('" . $advisoremail . "', 'advisorpass', 'afirst', 'alast')";

if (mysqli_query($data_base, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($data_base);
?>

</body>
</html>
