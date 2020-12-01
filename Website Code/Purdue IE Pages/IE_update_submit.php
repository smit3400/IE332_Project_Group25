<?php
session_start();

if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
}

if ($_POST["email"] == "") {
	header("Location: IE_main.php");
}

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
?>

<!DOCTYPE html>
<html>

<!-- calling in css external file-->

<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="advisorForm.css" rel="stylesheet" type="text/css" />
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
	<h1>Welcome <?php echo $_POST["company"]; ?></h1>
	<p>Your email address is: <?php echo $_POST["email"]; ?></p>
	<?php
	// pulling values from update form
	$email = $_POST["email"];
	$pass = $_POST["password"];
	$first = $_POST["firstname"];
	$last = $_POST["lastname"];

	
	//updating Purdue_IE advisor table 

	$sql = "UPDATE Purdue_IE SET Email = '" . $email . "' ,Password = '" . $pass . "', Fname = '" . $first . "', Lname = '" . $last . "' WHERE Email = '" . $_SESSION["email"] . "'";

	if (mysqli_query($data_base,$sql)) {
	    echo "<p>Account updated succesfully!</p>";
	    header("Location: IE_main.php");
		// keeping session variable alive
	    $_SESSION["email"] = $_POST["email"];
	} else {
	    echo "Something is wrong";
	}

	mysqli_close($data_base);

	?>
	<p><a href = "IE_main.php" class = "button1" >Main Page</a></p>


</body>
</html>
