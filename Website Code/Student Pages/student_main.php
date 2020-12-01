<?php
session_start();
//does not allow student to use back arrow after logging out
if ($_SESSION["log"] == 0) {
	header("Location:  student_login.php");
}

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
	
	<!-- buttons to navigate student pages-->
	<h1>Student Main Page</h1>
    <div id = "sideR">
	<p><a href = "student_profile.php" class = "button1">Profile Page</a></p>
	<p><a href = "student_companies.php" class = "button1">Company Ratings</a></p>
	<p><a href = "student_jobfinder.php" class = "button1">Job Finder</a></p>
	<p><a href = "student_logout.php" class = "button1">Logout</a></p>
	<br>
	<p><i>Thank you for using IE Connect!</i></p>

</body>
</html>
