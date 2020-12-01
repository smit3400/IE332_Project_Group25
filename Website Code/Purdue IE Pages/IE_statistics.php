<?php
session_start();
include("new_connection.php");

if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
}

$email = $_SESSION["email"];

$filename = "studentPlot".rand(1,50);

shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchPlotStudents.R $email $filename");

$filename2 = "employerPlot".rand(1,50);

shell_exec("Rscript /home/campus/g1116905/www/main/Project_R/matchPlotsEmployers.R $filename2");
?>

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
	<h1>IE Statistics</h1>
  <h3><p>Employer Statistics</p></h3>
  <p><img src="https://web.ics.purdue.edu/~g1116905/main/Project_R/plots/<?php echo $filename2;?>.png" /></p>
  <h3><p>Student Statistics</p></h3>
  <p><img src="https://web.ics.purdue.edu/~g1116905/main/Project_R/plots/<?php echo $filename;?>.png" /></p>
	
	<!-- calling in student and employer graphs -->

  <p><a href="IE_main.php" class = "button1">Main Page</a></p>	
</body>
</html>
