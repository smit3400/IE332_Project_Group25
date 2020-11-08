<html>

<?php

//Connecting to database
$servername = "mydb.itap.purdue.edu";
$username = "g1116905";
$password = "iegroup25";
$dbname = "g1116905";

$data_base = mysqli_connect($servername, $username, $password, $dbname);

if(!$data_base){
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected Successfully!";

$sql = "SELECT * FROM Student WHERE Email = '$Email'"
$result = mysqli_query($data_base,$sql);
if (mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result)){
		echo .$row["Fname"]. .$row["Lname"]. "Student Profile"<br>
	}
}else{
	echo "Student not found";
}

mysqli_close($data_base);
?>

</html>
