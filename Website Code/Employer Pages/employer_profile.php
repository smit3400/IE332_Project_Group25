<?php
session_start();

if ($_SESSION["emp_log"] == 0) {
	header("Location:  employer_login.php");
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

//Pulling info from sql
$sql = "SELECT * FROM Employer WHERE Email='" . $_SESSION["email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {

    //Creating variables from SQL data
    while ($row=mysqli_fetch_row($result))
    {
    	$employer_email = $row[0];
	    $employer_name = $row[2];
	    $employer_phone =  $row[3];
	    $employer_description =  $row[4];
	    $employer_industry =  $row[5];
    }
}

mysqli_close($data_base);
?>

<!DOCTYPE html>
<html>
<!-- CSS connection-->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="employerForm.css" rel="stylesheet" type="text/css" />
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
	
	<h1>Employer Profile</h1>

  <!-- Employer Profile Output -->
	<?php
	printf ("<p><b>Company Name:</b> %s </p>", $employer_name);
	printf ("<p><b>Phone Number:</b> %s </p>", $employer_phone);
	printf ("<p><b>Email Address:</b> %s </p>", $employer_email);
	printf ("<p><b>Company Description:</b> %s </p>", $employer_description);
	printf ("<p><b>Industry:</b> %s </p>", $employer_industry);
	?>

	<p><a href = "employer_update.php" class = "button1">Update Profile</a></p>
	<p><a href = "employer_main.php" class = "button1">Main Page</a></p>
</body>
</html>
