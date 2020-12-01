<?php
session_start();

if ($_SESSION["ad_log"] == 0) {
	header("Location: IE_login.php");
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
	<h1>Sending Surveys</h1>
	<p>Click on the button to send student or employer survey:</p>
	
	<!-- links to pages to send surveys -->
	
	<p><a href="IE_send_student_survey.php" class = "button1">Send Student Survey</a></p>
	<p><a href="IE_send_employer_survey.php" class = "button1">Send Employer Survey</a></p>
	<p><a href="IE_main.php" class = "button1">Main Page</a></p>
</body>
</html>
