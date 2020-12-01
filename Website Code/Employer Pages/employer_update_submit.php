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
}

if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
}

if ($_POST["email"] == "") {
	header("Location:  employer_main.php");
}

?>

<!DOCTYPE html>
<html>
<!-- CSS Connection -->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employercss/employerForm.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- Website header -->
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

    <!-- Personalized Header -->
	<h1>Welcome <?php echo $_POST["company"]; ?></h1>
	<p>Your email address is: <?php echo $_POST["email"]; ?></p>
	<?php

	//Pulling variables from form
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$company = $_POST["company"];
	$phone = $_POST["phone"];
	$description = $_POST["description"];
	$industry = $_POST["industry"];

	//Updating Employer table
	$sql = "UPDATE Employer SET Email = '" . $email . "' ,Password = '" . $pass . "', Company_Name = '" . $company . "', Phone_Number = '" . $phone . "', Description = '" . $description . "', Industry = '" . $industry . "' WHERE Email = '" . $_SESSION["email"] . "'";

	//Verifying update and changing session email
	if (mysqli_query($data_base,$sql)) {
	    echo "<p>Account updated succesfully!</p>";
	    header("Location: employer_main.php");

	    $_SESSION["email"] = $_POST["email"];
	} else {
	    echo "Something is wrong";
	}

	//Closing connection
	mysqli_close($data_base);

	?>
	<p><a href = "employer_main.php" class = "button1" >Main Page</a></p>


</body>
</html>
