<?php
session_start();

if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
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
$sql = "SELECT * FROM Purdue_IE WHERE Email='" . $_SESSION["email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
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
?>

<!DOCTYPE html>
<html>

<!-- calling in css external file -->

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
	
	<h1>IE Advisor Profile</h1>



	<?php
	
	//printing information for profile page from DB
	printf ("<p><b>IE Email:</b> %s </p>", $IE_email);
	printf ("<p><b>First Name:</b> %s </p>", $IE_fname);
	printf ("<p><b>Last Name:</b> %s </p>", $IE_lname);
	?>

<p><a href = "IE_update.php" class = "button1">Update Profile</a></p>
<p><a href="IE_main.php" class = "button1">Main Page</a></p>
</body>
</html>
