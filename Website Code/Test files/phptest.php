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
	echo "Connected Successfully!";
}

$sql = "SELECT Fname FROM Student";
if ($result = mysqli_query($data_base,$sql)) {
    printf("Select returned %d rows.\n", mysqli_num_rows($result));
    /* free result set */
    mysqli_free_result($result);
}
mysqli_close($data_base);

?>

</body>
</html>
