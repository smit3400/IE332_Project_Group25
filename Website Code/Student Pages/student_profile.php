<?php
session_start();

//does not allow student to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
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
$sql = "SELECT * FROM Student WHERE Email='" . $_SESSION["stud_email"] . "'";
if ($result = mysqli_query($data_base,$sql)) {
    /* free result set */
    while ($row=mysqli_fetch_row($result))
    {
    	$student_fname = $row[2];
		$student_lname = $row[3];
		$student_email = $row[0];
	    $student_phone =  $row[4];
	    $student_major =  $row[5];
		$student_locpref = $row[6];
	    $student_GPA =  $row[7];
		$student_techskills =  $row[8];
		$student_courses =  $row[9];
		$student_year =  $row[10];
		$student_opptype =  $row[11];
		$student_relocation =  $row[12];
		$student_visa = $row[13];
    }
	  // Free result set
	  //mysqli_free_result($result);
}

$filename = "studentPlot".rand(1,50);

shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchPlotStudents.R $student_email $filename");

mysqli_close($data_base);
?>


<!DOCTYPE html>
<html>
<!-- importing css from external file-->
<head>
	<title>IE Connect</title>
    <link rel="icon" type="image/ico" href="https://web.ics.purdue.edu/~g1116905/main/ie.ico"/>
    <link href="studentForm.css" rel="stylesheet" type="text/css" />
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
<h1>Student Profile</h1>
	
<?php
//printing each variable pulled from database (see query in lines 28-40)
	printf ("<p><b>%s %s</b></p>",$student_fname,$student_lname);
	printf ("<p><b>Email:</b> %s </p> <p><b>Phone Number</b>: %s </p>", $student_email,$student_phone);
	printf ("<p><b>Major:</b> %s </p>", $student_major);
	printf ("<p><b>GPA:</b> %s </p>", $student_GPA);
	printf ("<p><b>Technical Skills:</b> %s </p>", $student_techskills);
	printf ("<p><b>Coursework:</b> %s </p>", $student_courses);
	printf ("<p><b>Year in School:</b> %s </p>", $student_year); 
	printf ("<p>Seeking <b>%s</b> Opportunity </p>", $student_opptype);
	printf ("<p><b>Willing to Relocate?</b> %s </p>", $student_relocation);
	printf ("<p><b>Location Preference:</b> %s </p>", $student_locpref);
	printf ("<p><b>Visa Sponsorship Needed?</b> %s </p>", $student_visa);
?>

<br>
<p>
	<b>Statistics:<br><br></b>
	<img src="https://web.ics.purdue.edu/~g1116905/main/Project_R/plots/<?php echo $filename;?>.png" />
</p>

<p><a href = "student_update.php" class = "button1">Update Profile</a></p>
<p><a href="student_main.php" class = "button1">Main Page</a></p>

</div>
</body>
</html>
