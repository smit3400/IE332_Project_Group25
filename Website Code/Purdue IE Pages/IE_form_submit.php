<!DOCTYPE html>
<html>
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
	
	<h1>Welcome <?php echo $_POST["fname"]; ?></h1>
	<p>Your email address is: <?php echo $_POST["email"]; ?></p>
	<?php

	if ($_POST["email"] == "") {
		header("Location:  IE_login.php");
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
	}else
	
	//Getting values from IE_form to insert into Purdue_IE table

	$advisoremail = $_POST["email"];
	$advisorpass = $_POST["password"];
	$afirst = $_POST["fname"];
	$alast = $_POST["lname"];

	$sql = "INSERT INTO Purdue_IE (Email, Password, Fname, Lname)
	VALUES('" . $advisoremail . "', '" . $advisorpass . "', '" . $afirst . "', '" . $alast . "')";

	//checking if query worked

	if (mysqli_query($data_base, $sql)) {
	  echo "<p>Please login below to see your account!</p>";
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($data_base);
	}

	mysqli_close($data_base);

	?>
	<p><a href = "IE_login.php" class = "button1">Login Page</a></p>
</body>
</html>
